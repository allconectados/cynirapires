<?php

namespace Modules\Proatec\Http\Controllers;



use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Proatec\Entities\Administration;
use Modules\Proatec\Entities\Coordination;
use Modules\Proatec\Entities\Proatec;
use Modules\Proatec\Entities\Secretary;
use Modules\Proatec\Entities\Teacher;
use Modules\Proatec\Http\Requests\AdministrationStoreFormRequest;
use Modules\Proatec\Http\Requests\AdministrationUpdateFormRequest;
use Modules\Proatec\Http\Requests\CoordinationStoreFormRequest;
use Modules\Proatec\Http\Requests\CoordinationUpdateFormRequest;
use Modules\Proatec\Http\Requests\ProatecStoreFormRequest;
use Modules\Proatec\Http\Requests\SecretaryStoreFormRequest;
use Modules\Proatec\Http\Requests\TeacherStoreFormRequest;
use Modules\Proatec\Http\Requests\TeacherUpdateFormRequest;
use Modules\Proatec\Imports\AdministrationImport;
use Modules\Proatec\Imports\CoordinationImport;
use Modules\Proatec\Imports\SecretaryImport;
use Modules\Proatec\Imports\TeacherImport;
use Modules\Proatec\Services\DestroyService;
use Modules\Proatec\Services\EditService;
use Modules\Proatec\Services\StoreService;
use Modules\Proatec\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class ProatecController extends Controller
{
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

    public function __construct(StoreService $store, EditService $edit, UpdateService $update, DestroyService $destroy)
    {
        $this->middleware('auth');
        $this->store = $store;
        $this->edit = $edit;
        $this->update = $update;
        $this->destroy = $destroy;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $titlePage = 'Olá, '.auth()->user()->name.'!';

        return view('proatec::index', compact('titlePage'));
    }

    // ADMINISTRAR GESTÃO /////////////////////////////////////////////////////////////////////////////////
    function indexAdministration()
    {
        $titlePage = 'Administrar Gestão';

        $data = Administration::orderBy('name', 'asc')->paginate(10);

        return view('proatec::administrations.index', compact('data', 'titlePage'));
    }

    public function importAdministration()
    {
        $import = Excel::import(new AdministrationImport(), request()->file('select_file'));

        if ($import) {
            Alert::success('Sucesso!', 'Registros importados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Error!', 'Não foi possível importar os registros!');
            return redirect()->back();
        }
    }

    public function storeAdministration(AdministrationStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataAdministration($classFormRequest);
    }

    public function destroyAdministration($id)
    {
        return $this->destroy->destroyDataAdministration($id);
    }

    // ADMINISTRAR COORDENAÇÃO /////////////////////////////////////////////////////////////////////////////////
    function indexCoordination()
    {
        $titlePage = 'Administrar Coordenação';

        $data = Coordination::orderBy('name', 'asc')->paginate(10);

        return view('proatec::coordinations.index', compact('data', 'titlePage'));
    }

    public function importCoordination()
    {
        $import = Excel::import(new CoordinationImport(), request()->file('select_file'));

        if ($import) {
            Alert::success('Sucesso!', 'Registros importados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Error!', 'Não foi possível importar os registros!');
            return redirect()->back();
        }
    }

    public function storeCoordination(CoordinationStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataCoordination($classFormRequest);
    }

    public function destroyCoordination($id)
    {
        return $this->destroy->destroyDataCoordination($id);
    }

    // ADMINISTRAR PROATEC /////////////////////////////////////////////////////////////////////////////////
    function indexProatec()
    {
        $titlePage = 'Administrar Proatec';

        $data = Proatec::orderBy('name', 'asc')->paginate(10);

        return view('proatec::proatecs.index', compact('data', 'titlePage'));
    }

    public function storeProatec(ProatecStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataProatec($classFormRequest);
    }

    public function destroyProatec($id)
    {
        return $this->destroy->destroyDataProatec($id);
    }

    // ADMINISTRAR SECRETARIA /////////////////////////////////////////////////////////////////////////////////
    function indexSecretary()
    {
        $titlePage = 'Administrar Secretaria';

        $data = Secretary::orderBy('name', 'asc')->paginate(10);

        return view('proatec::secretaries.index', compact('data', 'titlePage'));
    }

    public function importSecretary()
    {
        $import = Excel::import(new SecretaryImport(), request()->file('select_file'));

        if ($import) {
            Alert::success('Sucesso!', 'Registros importados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Error!', 'Não foi possível importar os registros!');
            return redirect()->back();
        }
    }

    public function storeSecretary(SecretaryStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataSecretary($classFormRequest);
    }

    public function destroySecretary($id)
    {
        return $this->destroy->destroyDataSecretary($id);
    }

    // ADMINISTRAR PROFESSORES /////////////////////////////////////////////////////////////////////////////////
    function indexTeacher()
    {
        $titlePage = 'Administrar Professores';

        $data = Teacher::orderBy('name', 'asc')->paginate(10);

        return view('proatec::teachers.index', compact('data', 'titlePage'));
    }

    public function importTeacher()
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

    public function storeTeacher(TeacherStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataTeacher($classFormRequest);
    }

    public function editTeacher($id)
    {
        $item = $this->edit->editDataTeacher($id);

        $titlePage = 'Editar: '.$item->name;

        return view('proatec::teachers.edit', compact('item', 'titlePage'));
    }

    public function updateTeacher(TeacherUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateDataTeacher($classFormRequest, $id);
    }

    public function destroyTeacher($id)
    {
        return $this->destroy->destroyDataTeacher($id);
    }
}
