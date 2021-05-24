<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Coordination\Entities\Student;
use Modules\Coordination\Http\Requests\StudentUpdateFormRequest;
use Modules\Coordination\Imports\StudentImport;
use Modules\Coordination\Services\DestroyService;
use Modules\Coordination\Services\EditService;
use Modules\Coordination\Services\FilterService;
use Modules\Coordination\Services\StoreService;
use Modules\Coordination\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    private $orderBy = 'name';
    private $column = 'name';

    private $direction = 'asc';
    /**
     * @var Student
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
     * @var FilterService
     */
    private $filter;

    public function __construct(
        Student $model,
        StoreService $store,
        EditService $edit,
        UpdateService $update,
        DestroyService $destroy,
        FilterService $filter
    ) {
        $this->model = $model;
        $this->store = $store;
        $this->edit = $edit;
        $this->update = $update;
        $this->destroy = $destroy;
        $this->filter = $filter;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $titlePage = 'Gerenciar Estudantes';

        $data = DB::table('students')
            ->orderBy('room', 'asc')
            ->orderByRaw('(room - number) desc')
            ->orderBy('number', 'asc')
            ->paginate(100);

        $roomStudents = DB::table('students')->orderBy('room', 'asc')
            ->pluck('room', 'room');

        return view('coordination::students.index', compact('titlePage', 'data', 'roomStudents'));
    }

    public function import()
    {
        $import = Excel::import(new StudentImport(), request()->file('select_file_student'));

        if ($import) {
            Alert::success('Sucesso!', 'Registros importados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Error!', 'Não foi possível importar os registros!');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('coordination::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('coordination::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $student = $this->edit->editData($this->model, $id);

        $titlePage = 'Editar Estudante: '. $student->name;

        $rooms = DB::table('rooms')
            ->select('id', 'title')
            ->orderBy('title', 'asc')
            ->pluck('title', 'title');

        return view('coordination::students.edit', compact('titlePage','student', 'rooms'));
    }


    public function update(StudentUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateDataStudent($classFormRequest, $this->model, $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        return $this->destroy->destroyData($this->model, $id);
    }

    public function destroyAll()
    {
        return $this->destroy->destroyDataAll($this->model);
    }

    public function filterDataStudent($roomStudent)
    {
        $data = $this->filter->filterDataStudent(
            $this->model,
            $roomStudent,
            100
        );

        $rooms = DB::table('rooms')->orderBy('title', 'asc')->pluck('title', 'title');

        $roomStudents = DB::table('students')->orderBy('room', 'asc')
            ->pluck('room', 'room');

        $titlePage = 'Listando registros por sala: '.$roomStudent;

        return view(
            'coordination::students.index',
            compact(
                'titlePage','data',
                'rooms',
                'roomStudents',
                'rooms',
            )
        );
    }
    public function filterDataForm(Request $request)
    {
        $data = $this->filter->filterDataForm(
            $this->model,
            $this->column,
            $this->orderBy,
            $this->direction,
            );

        $search = $request->input('search');

        $titlePage = 'Listando registros por nome: ' . $search;

        $rooms = DB::table('rooms')->orderBy('title', 'asc')->pluck('title', 'title');

        $roomStudents = DB::table('students')->orderBy('room', 'asc')
            ->pluck('room', 'room');

        return view(
            'coordination::students..index',
            compact('data', 'titlePage', 'rooms', 'roomStudents')
        );
    }
}
