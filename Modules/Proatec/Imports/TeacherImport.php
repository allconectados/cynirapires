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
        if (Teacher::where('email', '=', $item[1])->count() > 0) {
            // Se existir será atualizado na tabela teachers
            DB::table('teachers')->where('email', '=', $item[1])->update(
                [
                    'name' => nameCase($item[0]),
                    'email' => $item[1],
                ]
            );
        }else{
            Teacher::create([
                'code' => uniqid(),
                'name' => nameCase($item[0]),
                'email' => $item[1],

            ]);
        }
    }
}
