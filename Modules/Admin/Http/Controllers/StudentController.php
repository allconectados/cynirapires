<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Student;
use Modules\Admin\Http\Requests\StudentUpdateFormRequest;
use Modules\Admin\Imports\StudentImport;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\FilterService;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
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
            ->paginate(15);

        $roomStudents = DB::table('students')->orderBy('room', 'asc')
            ->pluck('room', 'room');

        return view('admin::students.index', compact('titlePage', 'data', 'roomStudents'));
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
        return view('admin::create');
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $student = $this->edit->editData($this->model, $id);

        $rooms = DB::table('rooms')
            ->select('id', 'title')
            ->orderBy('title', 'asc')
            ->pluck('title', 'title');

        return view('admin::students.edit', compact('student', 'rooms'));
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
        $students = $this->filter->filterDataStudent(
            $this->model,
            $roomStudent,
            100
        );

        $rooms = DB::table('rooms')->orderBy('title', 'asc')->pluck('title', 'title');

        $roomStudents = DB::table('students')->orderBy('room', 'asc')
            ->pluck('room', 'room');

        $active = 'Listando registros por sala: '.$roomStudent;

        return view(
            'admins.students.index',
            compact(
                'students',
                'active',
                'rooms',
                'roomStudents',
                'rooms',
            )
        );
    }
    public function filterDataForm()
    {
        $students = $this->filter->filterDataForm(
            $this->model,
            $this->column,
            $this->orderBy,
            $this->direction,
            );

        $search = $this->request->input('search');

        $active = 'Listando registros por nome: ' . $search;

        $rooms = DB::table('rooms')->orderBy('title', 'asc')->pluck('title', 'title');

        $roomStudents = DB::table('students')->orderBy('room', 'asc')
            ->pluck('room', 'room');

        return view(
            'admin::students..index',
            compact('students', 'active', 'rooms', 'roomStudents')
        );
    }
}
