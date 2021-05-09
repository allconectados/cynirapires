<?php

namespace Modules\Admin\Imports;

use Modules\Admin\Entities\Proatec;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class ProatecImport implements ToModel
{
    /**
     * @param  array  $item
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $item)
    {
        if (Proatec::where('email', '=', $item[2])->count() > 0) {
            // Se existir será atualizado na tabela proatecs
            DB::table('proatecs')->where('email', '=', $item[2])->update(
                [
                    'name' => nameCase($item[0]),
                    'cargo' => nameCase($item[1]),
                    'email' => $item[2],
                ]
            );
        } else {
            Proatec::create([
                'code' => uniqid(),
                'name' => nameCase($item[0]),
                'cargo' => nameCase($item[1]),
                'email' => $item[2],

            ]);
        }
    }
}
