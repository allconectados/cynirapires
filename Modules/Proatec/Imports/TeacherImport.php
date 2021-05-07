<?php

namespace Modules\Proatec\Imports;

use Modules\Proatec\Entities\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class TeacherImport implements ToModel
{
    /**
    * @param array $item
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $item)
    {
        if (Teacher::where('email', '=', $item[2])->count() > 0) {
            // Se existir será atualizado na tabela teachers
            DB::table('teachers')->where('email', '=', $item[2])->update(
                [
                    'name' => nameCase($item[0]),
                    'cargo' => nameCase($item[1]),
                    'email' => $item[2],
                ]
            );
        }else{
            Teacher::create([
                'code' => uniqid(),
                'name' => nameCase($item[0]),
                'cargo' => nameCase($item[1]),
                'email' => $item[2],

            ]);
        }
    }
}
