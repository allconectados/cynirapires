<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Coordination\Entities\Discipline;
use Modules\Coordination\Entities\Room;
use Modules\Coordination\Entities\Serie;
use Modules\Coordination\Entities\Stage;
use Modules\Coordination\Entities\Year;
use Modules\Coordination\Services\EditService;
use Modules\Coordination\Services\GetUrl;

class RoomController extends Controller
{
    /**
     * @var Year
     */
    private $year;
    /**
     * @var Stage
     */
    private $stage;
    /**
     * @var Serie
     */
    private $serie;
    /**
     * @var GetUrl
     */
    private $url;
    /**
     * @var Room
     */
    private $model;
    /**
     * @var EditService
     */
    private $edit;

    /**
     * RoomController constructor.
     * @param  Room  $model
     * @param  Year  $year
     * @param  Stage  $stage
     * @param  Serie  $serie
     * @param  GetUrl  $url
     * @param  EditService  $edit
     */
    public function __construct(Room $model,Year $year, Stage $stage,Serie $serie, GetUrl $url, EditService $edit)
    {
        $this->stage = $stage;
        $this->url = $url;
        $this->year = $year;
        $this->serie = $serie;
        $this->model = $model;
        $this->edit = $edit;
    }

    public function index($year, $stage, $serie)
    {
        $titlePage = 'Gerenciar Turmas';

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $rooms = $serie->rooms->where('year_id', $year->id)->where('stage_id', $stage->id)->where('serie_id',
            $serie->id);

        return view('coordination::rooms.index', compact('titlePage', 'year', 'stage', 'serie', 'rooms'));
    }

    public function edit($year, $stage, $serie, $id)
    {
        $titlePage = 'Editar Turmas';

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->edit->editData($this->model, $id);

        $disciplines = Discipline::select('year_id','stage_id','serie_id','id','title', 'teacher', 'room_id')
            ->where('year_id', '=', $year->id)
            ->where('stage_id', '=', $stage->id)
            ->where('serie_id', '=', $serie->id)
            ->where('room_id', '=', $room->id)
            ->get();

        $teachers = DB::table('teachers')->select('name')
            ->orderBy('name', 'asc')->get();

        return view('coordination::rooms.edit',
            compact('titlePage','year', 'stage', 'serie', 'room', 'disciplines', 'teachers'
            ));
    }
}
