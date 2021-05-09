<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Period;
use Modules\Admin\Entities\Serie;
use Modules\Admin\Entities\Stage;
use Modules\Admin\Entities\Year;
use Modules\Admin\Http\Requests\PeriodStoreFormRequest;
use Modules\Admin\Http\Requests\PeriodUpdateFormRequest;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\GetUrl;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class PeriodController extends Controller
{
    /**
     * @var Period
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
     * @var Stage
     */
    private $stage;
    /**
     * @var Serie
     */
    private $serie;

    /**
     * PeriodController constructor.
     * @param  Period  $model
     * @param  Year  $year
     * @param  Stage  $stage
     * @param  Serie  $serie
     * @param  GetUrl  $url
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(
        Period $model,
        Year $year,
        Stage $stage,
        Serie $serie,
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
        $this->stage = $stage;
        $this->serie = $serie;
    }

    public function index($year, $stage, $serie)
    {
        $titlePage = 'Gerenciar Períodos';

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $periods = $serie->periods;

        $period = DB::table('periods')->select('id')->pluck('id');

        return view('admin::periods.index', compact('titlePage', 'year', 'stage', 'serie', 'periods', 'period'));
    }

    public function store(PeriodStoreFormRequest $classFormRequest)
    {
        $title = request()->input('title');
        $year_id = request()->input('year_id');
        $stage_id = request()->input('stage_id');
        $serie_id = request()->input('serie_id');

        $period = DB::table('periods')
            ->select('title', 'year_id', 'stage_id', 'serie_id')
            ->where('year_id', '=', $year_id)
            ->where('stage_id', '=', $stage_id)
            ->where('serie_id', '=', $serie_id)
            ->where('title', '=', $title)
            ->first();

        if (isset($period) && $period->year_id == request()->input('year_id')
            && $period->stage_id == request()->input('stage_id')
            && $period->serie_id == request()->input('serie_id')
            && $period->title == request()->input('title')) {
            alert()->warning('Atenão', 'Você já adicionou este período');
            return redirect()->back();
        } else {
            return $this->store->storeData($classFormRequest, $this->model);

        }
    }

    public function update(PeriodUpdateFormRequest $classFormRequest, $id)
    {
        return $this->update->updateData($classFormRequest, $this->model, $id);
    }

    public function destroy($id)
    {
        return $this->destroy->destroyData($this->model, $id);
    }
}
