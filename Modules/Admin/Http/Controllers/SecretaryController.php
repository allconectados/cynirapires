<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Secretary;
use Modules\Admin\Http\Requests\SecretaryStoreFormRequest;
use Modules\Admin\Imports\SecretaryImport;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class SecretaryController extends Controller
{

    /**
     * @var Secretary
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
     * SecretaryController constructor.
     * @param  Secretary  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(Secretary $model,StoreService $store, EditService $edit, UpdateService $update, DestroyService $destroy)
    {
        $this->model = $model;
        $this->store = $store;
        $this->edit = $edit;
        $this->update = $update;
        $this->destroy = $destroy;
    }

    function index()
    {
        $titlePage = 'Gerenciar Secretaria';

        $data = Secretary::orderBy('name', 'asc')->paginate(10);

        return view('admin::secretaries.index', compact('data', 'titlePage'));
    }

    public function import()
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

    public function store(SecretaryStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataSecretary($classFormRequest);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyDataSecretary($id);
    }
}
