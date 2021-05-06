<?php

namespace Modules\Proatec\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Proatec\Entities\Year;
use Modules\Proatec\Http\Requests\YearStoreFormRequest;
use Modules\Proatec\Http\Requests\YearUpdateFormRequest;
use Modules\Proatec\Services\DestroyService;
use Modules\Proatec\Services\EditService;
use Modules\Proatec\Services\StoreService;
use Modules\Proatec\Services\UpdateService;

class YearController extends Controller
{
    /**
     * @var Year
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
     * YearController constructor.
     * @param  Year  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(Year $model,
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
        $titlePage = 'Administrar Ano';

        $data = Year::paginate(10);

        return view('proatec::years.index', compact('titlePage', 'data'));
    }

    public function store(YearStoreFormRequest $classFormRequest)
    {
        return $this->store->storeData($classFormRequest, $this->model);
    }

    public function edit($id)
    {
        $item = $this->edit->editData($this->model, $id);

        $titlePage = 'Editar: '.$item->title;

        return view('proatec::years.edit', compact('titlePage', 'item'));
    }

    public function update(YearUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateData($classFormRequest, $this->model, $id);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyData($this->model, $id);
    }
}
