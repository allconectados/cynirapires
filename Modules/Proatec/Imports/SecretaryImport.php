<?php

namespace Modules\Proatec\Imports;

use Modules\Proatec\Entities\Secretary;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class SecretaryImport implements ToModel
{
    /**
    * @param array $item
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $item)
    {
        if (Secretary::where('email', '=', $item[2])->count() > 0) {
            // Se existir será atualizado na tabela secretaries
            DB::table('secretaries')->where('email', '=', $item[2])->update(
                [
                    'name' => nameCase($item[0]),
                    'cargo' => nameCase($item[1]),
                    'email' => $item[2],
                ]
            );
        }else{
            Secretary::create([
                'code' => uniqid(),
                'name' => nameCase($item[0]),
                'cargo' => nameCase($item[1]),
                'email' => $item[2],

            ]);
        }
    }
}
