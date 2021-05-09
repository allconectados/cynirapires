<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Discipline;
use Modules\Admin\Entities\Room;
use Modules\Admin\Entities\Serie;
use Modules\Admin\Entities\Stage;
use Modules\Admin\Entities\Year;
use Modules\Admin\Http\Requests\DisciplineStoreFormRequest;
use Modules\Admin\Http\Requests\DisciplineUpdateFormRequest;
use Modules\Admin\Imports\DisciplineImport;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\GetUrl;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class DisciplineController extends Controller
{
    /**
     * @var Discipline
     */
    private $model;
    /**
     * @var StoreService
     */
    private $store;
    /**
     * @var EditService
     */
    private $edit;
    /**
     * @var UpdateService
     */
    private $update;
    /**
     * @var DestroyService
     */
    private $destroy;
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
     * @var Room
     */
    private $room;
    /**
     * @var GetUrl
     */
    private $url;

    /**
     * DisciplineController constructor.
     * @param  Discipline  $model
     * @param  Year  $year
     * @param  Stage  $stage
     * @param  Serie  $serie
     * @param  Room  $room
     * @param  GetUrl  $url
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Discipline $model,
        Year $year,
        Stage $stage,
        Serie $serie,
        Room $room,
        GetUrl $url,
        StoreService $store,
        EditService $edit,
        UpdateService $update,
        DestroyService $destroy
    ) {
        $this->model = $model;
        $this->store = $store;
        $this->edit = $edit;
        $this->update = $update;
        $this->destroy = $destroy;
        $this->year = $year;
        $this->stage = $stage;
        $this->serie = $serie;
        $this->room = $room;
        $this->url = $url;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($year, $stage, $serie, $room)
    {
        $titlePage = 'Gerenciar Disciplinas';

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->url->urlData($this->room, $room);

        $disciplines = $room->disciplines
            ->where('year_id', $year->id)
            ->where('stage_id', $stage->id)
            ->where('serie_id', $serie->id)
            ->where('room_id', $room->id);

        return view('admin::disciplines.index', compact('titlePage','year', 'stage', 'serie', 'room', 'disciplines'));
    }

    public function import()
    {
        $import = Excel::import(new DisciplineImport(), request()->file('select_file_discipline'));

        if ($import) {
            Alert::success('Sucesso!', 'Registros importados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Error!', 'Não foi possível importar os registros!');
            return redirect()->back();
        }
    }

    public function store(DisciplineStoreFormRequest $classFormRequest)
    {
        $title = request()->input('title');
        $year_id = request()->input('year_id');
        $stage_id = request()->input('stage_id');
        $serie_id = request()->input('serie_id');
        $room_id = request()->input('room_id');

        $discipline = DB::table('disciplines')
            ->select('title', 'year_id', 'stage_id', 'serie_id', 'room_id')
            ->where('year_id', '=', $year_id)
            ->where('stage_id', '=', $stage_id)
            ->where('serie_id', '=', $serie_id)
            ->where('room_id', '=', $room_id)
            ->where('title', '=', $title)
            ->first();

        if (isset($discipline) && $discipline->year_id == request()->input('year_id')
            && $discipline->stage_id == request()->input('stage_id')
            && $discipline->serie_id == request()->input('serie_id')
            && $discipline->room_id == request()->input('room_id')
            && $discipline->title == request()->input('title')) {
            alert()->warning('Atenão', 'Você já adicionou esta disciplina');
            return redirect()->back();
        } else {
            return $this->store->storeData($classFormRequest, $this->model);

        }
    }

    public function edit($id)
    {
        $item = $this->edit->editDataDiscipline($id);

        $titlePage = 'Editar: '. $item->title;

        $teachers = DB::table('teachers')->select('id', 'name')
            ->orderBy('name', 'asc')
            ->get();

        return view('admin::disciplines.edit', compact('titlePage', 'item', 'teachers'));
    }

    public function update(DisciplineUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateDataDiscipline($classFormRequest, $id);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyData($this->model, $id);
    }
}
