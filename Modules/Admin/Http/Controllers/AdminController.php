<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Http\Requests\AdminStoreFormRequest;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\StoreService;

class AdminController extends Controller
{
    private $model;
    private $store;
    private $edit;
    private $destroy;

    public function __construct(Admin $model, StoreService $store, EditService $edit, DestroyService $destroy)
    {
        $this->model = $model;
        $this->store = $store;
        $this->edit = $edit;
        $this->destroy = $destroy;
    }

    public function index()
    {
        $titlePage = 'Olá, '.auth()->user()->name;

        return view('admin::index', compact('titlePage'));
    }

    public function create()
    {
        $titlePage = 'Gerenciar Admins';

        $data = Admin::orderBy('created_at', 'asc')->paginate(10);

        return view('admin::create', compact('titlePage', 'data'));
    }

    public function store(AdminStoreFormRequest $classFormRequest)
    {
        return $this->store->storeDataAdmin($classFormRequest);
    }

    public function show($id)
    {
        return view('admin::show');
    }

    public function edit($id)
    {
        return view('admin::edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        return $this->destroy->destroyDataAdmin($id);
    }
}
