<?php

namespace Modules\Proatec\Imports;

use Modules\Proatec\Entities\Student;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentImport implements ToModel
{
    /**
    * @param array $item
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $item)
    {
        if (Student::where('email', '=', $item[1])->count() > 0) {
            // Se existir será atualizado na tabela students
            DB::table('students')->where('email', '=', $item[1])->update(
                [
                    'name' => nameCase($item[0]),
                    'email' => $item[1],
                ]
            );
        }else{
            Student::create([
                'code' => uniqid(),
                'name' => nameCase($item[0]),
                'email' => $item[1],

            ]);
        }
    }
}
