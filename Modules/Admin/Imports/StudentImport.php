<?php

namespace Modules\Admin\Imports;

use Modules\Admin\Entities\Student;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class StudentImport implements ToModel
{
    use Importable;

    /**
     * @param  array  $item
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $item)
    {
        $ra = '000'.$item[2];
        $email = '0'.$ra.$item[3].'sp@al.educacao.sp.gov.br';

        // Obtem o nome do arquivo sem a extensão
        $file = basename(request()->file('select_file_student')->getClientOriginalName(),
            '.'.request()->file('select_file_student')->getClientOriginalExtension());

        // Verifica na tabela students se existe um email igual ao da tabela do excel
        if (Student::where('email', '=', $email)->count() > 0) {
            // Se existir será atualizado na tabela students
            DB::table('students')
                ->where('email', '=', $email)
                ->where('room', '=', $file)
                ->update(
                    [
                        'number' => $item[0],
                        'room' => $file,
                        'name' => nameCase($item[1]),
                        'ra' => $ra,
                        'ra_digit' => $item[3],
                        'date_of_birth' => $this->transformDate($item[4]),
                        'email' => $email,
                    ]
                );
        } else {
            // Se não exitir será criado um novo registro na tabela students
            Student::create(
                [
                    'number' => $item[0],
                    'room' => $file,
                    'name' => nameCase($item[1]),
                    'ra' => $ra,
                    'ra_digit' => $item[3],
                    'date_of_birth' => $this->transformDate($item[4]),
                    'email' => $email,
                    'status' => titleCase($item[5]),
                ]
            );
        }
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
