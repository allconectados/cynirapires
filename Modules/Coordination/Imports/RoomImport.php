<?php

namespace Modules\Coordination\Imports;

use Illuminate\Http\Request;
use Modules\Coordination\Entities\Room;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;

class RoomImport implements ToModel
{
    /**
     * @param  array  $item
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $item)
    {
        if (Room::where('title', '=', $item[0])->count() > 0) {
            // Se existir será atualizado na tabela administrations
            DB::table('rooms')->where('title', '=', $item[0])
                ->where('stage_id', '=', Request::capture()->input('stage_id'))
                ->update(
                [
                    'title' => $item[0],
                ]
            );
        } else {
            Room::create([
                'code' => uniqid(),
                'stage_id' => Request::capture()->input('stage_id'),
                'title' => $item[0],

            ]);
        }
    }
}
