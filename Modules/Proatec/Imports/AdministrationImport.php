<?php

namespace Modules\Proatec\Imports;

use Modules\Proatec\Entities\Administration;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class AdministrationImport implements ToModel
{
    /**
     * @param  array  $item
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $item)
    {
        if (Administration::where('email', '=', $item[1])->count() > 0) {
            // Se existir será atualizado na tabela administrations
            DB::table('administrations')->where('email', '=', $item[1])->update(
                [
                    'name' => nameCase($item[0]),
                    'email' => $item[1],
                ]
            );
        } else {
            Administration::create([
                'code' => uniqid(),
                'name' => nameCase($item[0]),
                'email' => $item[1],

            ]);
        }
    }
}
