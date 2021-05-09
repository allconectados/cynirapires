<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Stage;
use Modules\Admin\Entities\Year;
use Modules\Admin\Http\Requests\StageStoreFormRequest;
use Modules\Admin\Http\Requests\StageUpdateFormRequest;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\GetUrl;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

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
     * @var Year
     */
    private $year;
    /**
     * @var GetUrl
     */
    private $url;

    /**
     * StageController constructor.
     * @param  Stage  $model
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Stage $model,
        Year $year,
        GetUrl $url,
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
        $this->year = $year;
        $this->url = $url;
    }

    public function index($year)
    {
        $titlePage = 'Gerenciar Tipo de Ensino';

        $year = $this->url->urlData($this->year, $year);

        $data = Stage::paginate(10);

        return view('admin::stages.index', compact('titlePage', 'data', 'year'));
    }

    public function store(StageStoreFormRequest $classFormRequest)
    {
        $title = request()->input('title');
        $year_id = request()->input('year_id');

        $stage = DB::table('stages')
            ->select('title', 'year_id')
            ->where('year_id', '=', $year_id)
            ->where('title', '=', $title)
            ->first();

        if (isset($stage) && $stage->year_id == request()->input('year_id') && $stage->title == request()->input('title')) {
            alert()->warning('Atenão', 'Você já adicionou este Tipo de Ensino');
            return redirect()->back();
        } else {
            return $this->store->store($classFormRequest, $this->model);

        }
    }

    public function destroy($id)
    {
        // Retorna o serie_id e compara com o id do serie
        $serie_id = DB::table('series')->where('stage_id', '=', $id)->first();

        if ($serie_id) {
            alert()->warning('Atenão', 'Não foi possível excluír o registro, existem dados relacionado!');
            return redirect()->back();
        } else {
            return $this->destroy->destroyData($this->model, $id);
        }
    }
}
