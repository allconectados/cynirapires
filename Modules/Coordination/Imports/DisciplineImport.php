<?php

namespace Modules\Coordination\Imports;


use Modules\Coordination\Entities\Discipline;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class DisciplineImport implements ToModel
{
    /**
    * @param array $discipline
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $discipline)
    {
        // Verifica na tabela disciplines se existe um email igual ao da tabela do excel
        if (Discipline::where('year_id', '=', request('year_id'))
                ->where('stage_id', '=', request('stage_id'))
                ->where('serie_id', '=', request('serie_id'))
                ->where('room_id', '=', request('room_id'))
                ->where('title', '=', $discipline[0])->count() > 0) {
            // Se existir será atualizado na tabela disciplines
            DB::table('disciplines')->where('title', '=', $discipline[0])->update(
                [
                    'title' => nameCase($discipline[0]),
                ]
            );
        } else {
            // Se não exitir será criado um novo registro na tabela disciplines
            Discipline::create(
                [
                    'year_id' => request('year_id'),
                    'stage_id' => request('stage_id'),
                    'serie_id' => request('serie_id'),
                    'room_id' => request('room_id'),
                    'title' => nameCase($discipline[0]),
                ]
            );
        }
    }
}
