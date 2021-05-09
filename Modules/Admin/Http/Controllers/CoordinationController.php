<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Coordination;
use Modules\Admin\Http\Requests\CoordinationStoreFormRequest;
use Modules\Admin\Imports\CoordinationImport;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class CoordinationController extends Controller
{
    /**
     * @var Coordination
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
     * CoordinationController constructor.
     * @param  Coordination  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Coordination $model,
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

    function index()
    {
        $titlePage = 'Gerenciar Coordenação';

        $data = Coordination::orderBy('name', 'asc')->paginate(10);

        return view('admin::coordinations.index', compact('data', 'titlePage'));
    }

    public function import()
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

    public function store(CoordinationStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataCoordination($classFormRequest);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyDataCoordination($id);
    }
}
