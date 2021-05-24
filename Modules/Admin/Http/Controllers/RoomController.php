<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Discipline;
use Modules\Admin\Entities\Room;
use Modules\Admin\Entities\Serie;
use Modules\Admin\Entities\Stage;
use Modules\Admin\Entities\Subject;
use Modules\Admin\Entities\Teacher;
use Modules\Admin\Entities\Year;
use Modules\Admin\Http\Requests\RoomStoreFormRequest;
use Modules\Admin\Http\Requests\RoomUpdateFormRequest;
use Modules\Admin\Imports\RoomImport;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\GetUrl;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class RoomController extends Controller
{
    /**
     * @var Room
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
     * @var Request
     */
    private $request;
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
     * RoomController constructor.
     * @param  Request  $request
     * @param  Room  $model
     * @param  Year  $year
     * @param  Stage  $stage
     * @param  Serie  $serie
     * @param  GetUrl  $url
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Request $request,
        Room $model,
        Year $year,
        Stage $stage,
        Serie $serie,
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
        $this->request = $request;
        $this->year = $year;
        $this->stage = $stage;
        $this->serie = $serie;
        $this->url = $url;
    }

    public function index($year, $stage, $serie)
    {
        $titlePage = 'Gerenciar Turmas';

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $rooms = $serie->rooms->where('year_id', $year->id)->where('stage_id', $stage->id)->where('serie_id', $serie->id);

        return view('admin::rooms.index', compact('titlePage','year', 'stage', 'serie', 'rooms'));
    }

    public function import()
    {
        $stage = $this->request->input('stage_id');

        if ($stage != null){

            if(request()->file('select_file') != null){
                $import = Excel::import(new RoomImport(), request()->file('select_file'));
                if ($import) {
                    Alert::success('Sucesso!', 'Registros importados com sucesso!');
                    return redirect()->back();
                } else {
                    Alert::error('Error!', 'Não foi possível importar os registros!');
                    return redirect()->back();
                }
            }else{
                Alert::warning('Atenção!', 'Selecione um arquivo!');
                return redirect()->back();
            }


        }else{
            Alert::warning('Atenção!', 'Selecione o Tipo de Ensino!');
            return redirect()->back();
        }


    }

    public function store(RoomStoreFormRequest $classFormRequest)
    {
        $title = request()->input('title');
        $year_id = request()->input('year_id');
        $stage_id = request()->input('stage_id');
        $serie_id = request()->input('serie_id');

        $room = DB::table('rooms')
            ->select('title', 'year_id', 'stage_id', 'serie_id')
            ->where('year_id', '=', $year_id)
            ->where('stage_id', '=', $stage_id)
            ->where('serie_id', '=', $serie_id)
            ->where('title', '=', $title)
            ->first();

        if (isset($room) && $room->year_id == request()->input('year_id')
            && $room->stage_id == request()->input('stage_id')
            && $room->serie_id == request()->input('serie_id')
            && $room->title == request()->input('title')) {
            alert()->warning('Atenão', 'Você já adicionou esta sala');
            return redirect()->back();
        } else {
            return $this->store->storeData($classFormRequest, $this->model);

        }
    }

    public function edit($year, $stage, $serie, $id)
    {
        $titlePage = 'Editar Turmas AQUI';

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->edit->editData($this->model, $id);

        $disciplines = Discipline::select('id','title', 'teacher', 'room_id')
            ->where('year_id', '=', $year->id)
            ->where('stage_id', '=', $stage->id)
            ->where('serie_id', '=', $serie->id)
            ->where('room_id', '=', $room->id)
            ->get();

        $teachers = DB::table('teachers')->select('name')->orderBy('name', 'asc')->get();

        return view('admin::rooms.edit',
            compact('titlePage','year', 'stage', 'serie', 'room', 'disciplines','teachers'
            ));
    }

    public function students($year, $stage, $serie, $room)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->url->urlData($this->model, $room);

        $titlePage = 'Editar Turmas';

        $students = DB::table('students')->where('room', '=', $room->title)
            ->orderBy('room', 'asc')
            ->orderByRaw('(room - number) desc')
            ->orderBy('number', 'asc')
            ->get();

        return view('admin::rooms.students',
            compact('titlePage','year', 'stage', 'serie', 'room', 'students'
            ));
    }

    public function destroy($id)
    {
        // Retorna o room_id e compara com o id do room
        $discipline_id = DB::table('disciplines')->where('room_id', '=', $id)->first();
        $aluno_id = DB::table('students')->where('room', '=', $id)->first();

        if ($discipline_id || $aluno_id) {
            alert()->warning('Atenão', 'Não foi possível excluír o registro, existem registros relacionados!');
            return redirect()->back();
        } else {
            return $this->destroy->destroyData($this->model, $id);
        }
    }
}
