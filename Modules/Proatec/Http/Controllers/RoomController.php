<?php

namespace Modules\Proatec\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Proatec\Entities\Room;
use Modules\Proatec\Http\Requests\RoomStoreFormRequest;
use Modules\Proatec\Http\Requests\RoomUpdateFormRequest;
use Modules\Proatec\Services\DestroyService;
use Modules\Proatec\Services\EditService;
use Modules\Proatec\Services\StoreService;
use Modules\Proatec\Services\UpdateService;

class RoomController extends Controller
{
    /**
     * @var Room
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
     * RoomController constructor.
     * @param  Room  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Room $model,
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
        $titlePage = 'Administrar Turma';

        $data = Room::orderBy('year_id', 'desc')->orderBy('stage_id', 'asc')->orderBy('title', 'asc')->paginate(30);

        $years = DB::table('years')->select('id', 'title')->pluck('title', 'id');

        $stages = DB::table('stages')->select('id', 'title')->pluck('title', 'id');

        return view('proatec::rooms.index', compact('titlePage', 'data', 'years', 'stages'));
    }

    public function store(RoomStoreFormRequest $classFormRequest)
    {
        return $this->store->storeData($classFormRequest, $this->model);
    }

    public function edit($id)
    {
        $item = $this->edit->editData($this->model, $id);

        $years = DB::table('years')->select('id', 'title')->pluck('title', 'id');

        $stages = DB::table('stages')->select('id', 'title')->pluck('title', 'id');

        $teachers = DB::table('teachers')->select('id', 'name')->orderBy('name', 'asc')->get();

        $titlePage = 'Editar: '.$item->title;

        return view('proatec::rooms.edit', compact('titlePage', 'item', 'years', 'stages', 'teachers'));
    }

    public function update(RoomUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateDataRoom($classFormRequest, $id);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyData($this->model, $id);
    }
}
