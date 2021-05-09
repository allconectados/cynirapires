<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Administration;
use Modules\Admin\Http\Requests\AdministrationStoreFormRequest;
use Modules\Admin\Imports\AdministrationImport;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class AdministrationController extends Controller
{
    /**
     * @var Administration
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
     * AdministrationController constructor.
     * @param  Administration  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Administration $model,
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

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $titlePage = 'Gerenciar Administração';

        $data = Administration::orderBy('name', 'asc')->paginate(10);

        return view('admin::administrations.index', compact('data', 'titlePage'));
    }

    public function import()
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

    public function store(AdministrationStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataAdministration($classFormRequest);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyDataAdministration($id);
    }
}
