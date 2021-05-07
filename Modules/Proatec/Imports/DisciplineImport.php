<?php

namespace Modules\Proatec\Imports;


use Modules\Proatec\Entities\Discipline;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class DisciplineImport implements ToModel
{
    /**
    * @param array $item
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $item)
    {
        if (Discipline::where('title', '=', $item[0])->count() > 0) {
            // Se existir será atualizado na tabela teachers
            DB::table('disciplines')->where('title', '=', $item[0])->update(
                [
                    'title' => titleCase($item[0]),
                ]
            );
        } else {
            Discipline::create([
                'code' => uniqid(),
                'title' => titleCase($item[0]),

            ]);
        }
    }
}
