<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Proatec;
use Modules\Admin\Http\Requests\ProatecStoreFormRequest;
use Modules\Admin\Imports\ProatecImport;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class ProatecController extends Controller
{
    /**
     * @var Proatec
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
     * ProatecController constructor.
     * @param  Proatec  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Proatec $model,
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
        $titlePage = 'Gerenciar Proatec';

        $data = Proatec::orderBy('name', 'asc')->paginate(10);

        return view('admin::proatecs.index', compact('data', 'titlePage'));
    }

    public function import()
    {
        $import = Excel::import(new ProatecImport(), request()->file('select_file'));

        if ($import) {
            Alert::success('Sucesso!', 'Registros importados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Error!', 'Não foi possível importar os registros!');
            return redirect()->back();
        }
    }

    public function store(ProatecStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataProatec($classFormRequest);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyDataProatec($id);
    }
}
