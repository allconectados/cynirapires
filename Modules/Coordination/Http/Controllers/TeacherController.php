<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Coordination\Entities\Teacher;
use Modules\Coordination\Http\Requests\TeacherStoreFormRequest;
use Modules\Coordination\Http\Requests\TeacherUpdateFormRequest;
use Modules\Coordination\Imports\TeacherImport;
use Modules\Coordination\Services\DestroyService;
use Modules\Coordination\Services\EditService;
use Modules\Coordination\Services\StoreService;
use Modules\Coordination\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class TeacherController extends Controller
{
    /**
     * @var Teacher
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
     * TeacherController constructor.
     * @param  Teacher  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Teacher $model,
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
    }

    public function index()
    {
        $titlePage = 'Gerenciar Professores';

        $data = Teacher::orderBy('name', 'asc')->paginate(50);

        return view('coordination::teachers.index', compact('titlePage', 'data'));
    }

    public function import()
    {
        $import = Excel::import(new TeacherImport(), request()->file('select_file'));

        if ($import) {
            Alert::success('Sucesso!', 'Registros importados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Error!', 'Não foi possível importar os registros!');
            return redirect()->back();
        }
    }

    public function store(TeacherStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataTeacher($classFormRequest);
    }

    public function edit($id)
    {
        $item = $this->edit->editDataTeacher($id);

        $disciplineTeacher = $item->disciplines;

        $disciplines = DB::table('disciplines')->orderBy('title', 'asc')
            ->get();

        $titlePage = 'Editar: '.$item->name;

        return view('coordination::teachers.edit', compact('item', 'titlePage', 'disciplines', 'disciplineTeacher'));
    }

    public function discipline($id, $discipline)
    {
        $item = $this->edit->editDataTeacher($id);

        $titlePage = 'Editar: '.$item->name.' - '.$discipline;

        $rooms = DB::table('rooms')
            ->orderBy('year_id', 'asc')
            ->orderBy('stage_id', 'asc')
            ->orderBy('title', 'asc')
            ->get();

        return view('coordination::teachers.disciplines', compact('item', 'titlePage', 'rooms'));
    }

    public function update(TeacherUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateDataTeacher($classFormRequest, $id);
    }

    public function updateRoom(TeacherUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateDataTeacherRoom($classFormRequest, $id);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyDataTeacher($id);
    }
}
