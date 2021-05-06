<?php

namespace Modules\Proatec\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Proatec\Entities\Stage;
use Modules\Proatec\Http\Requests\StageStoreFormRequest;
use Modules\Proatec\Http\Requests\StageUpdateFormRequest;
use Modules\Proatec\Services\DestroyService;
use Modules\Proatec\Services\EditService;
use Modules\Proatec\Services\StoreService;
use Modules\Proatec\Services\UpdateService;

class StageController extends Controller
{
    /**
     * @var Stage
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
     * StageController constructor.
     * @param  Stage  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(Stage $model,
        StoreService $store,
        EditService $edit,
        UpdateService $update,
        DestroyService $destroy)
    {
        $this->model = $model;
        $this->store = $store;
        $this->edit = $edit;
        $this->update = $update;
        $this->destroy = $destroy;
    }

    public function index()
    {
        $titlePage = 'Administrar Tipo de Ensino';

        $data = Stage::paginate(10);

        return view('proatec::stages.index', compact('titlePage', 'data'));
    }

    public function store(StageStoreFormRequest $classFormRequest)
    {
        return $this->store->storeData($classFormRequest, $this->model);
    }

    public function edit($id)
    {
        $item = $this->edit->editData($this->model, $id);

        $titlePage = 'Editar: '.$item->title;

        return view('proatec::stages.edit', compact('titlePage', 'item'));
    }

    public function update(StageUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateData($classFormRequest, $this->model, $id);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyData($this->model, $id);
    }
}
