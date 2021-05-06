<?php

namespace Modules\Proatec\Imports;

use Modules\Proatec\Entities\Coordination;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class CoordinationImport implements ToModel
{
    /**
    * @param array $item
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $item)
    {
        if (Coordination::where('email', '=', $item[1])->count() > 0) {
            // Se existir será atualizado na tabela coordinations
            DB::table('coordinations')->where('email', '=', $item[1])->update(
                [
                    'name' => nameCase($item[0]),
                    'email' => $item[1],
                ]
            );
        }else{
            Coordination::create([
                'code' => uniqid(),
                'name' => nameCase($item[0]),
                'email' => $item[1],

            ]);
        }
    }
}
