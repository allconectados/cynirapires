<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Serie;
use Modules\Admin\Entities\Stage;
use Modules\Admin\Entities\Year;
use Modules\Admin\Http\Requests\SerieStoreFormRequest;
use Modules\Admin\Http\Requests\BimestreUpdateFormRequest;
use Modules\Admin\Services\DestroyService;
use Modules\Admin\Services\EditService;
use Modules\Admin\Services\GetUrl;
use Modules\Admin\Services\StoreService;
use Modules\Admin\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class SerieController extends Controller
{
    /**
     * @var Serie
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
     * SerieController constructor.
     * @param  Serie  $model
     * @param  Year  $year
     * @param  Stage  $stage
     * @param  GetUrl  $url
     * @param  StoreService  $store
     * @param  EditService  $edit
     * @param  UpdateService  $update
     * @param  DestroyService  $destroy
     */
    public function __construct(Serie $model,Year $year,Stage $stage, GetUrl $url,
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
        $this->year = $year;
        $this->url = $url;
        $this->stage = $stage;
    }

    public function index($year, $stage)
    {
        $titlePage = 'Gerenciar Séries do Tipo de Ensino: '. $stage;

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $series = $stage->series->where('year_id', $year->id)->where('stage_id', $stage->id);

        return view('admin::series.index', compact('titlePage', 'series', 'year', 'stage'));
    }

    public function store(SerieStoreFormRequest $classFormRequest)
    {
        $title = request()->input('title');
        $year_id = request()->input('year_id');
        $stage_id = request()->input('stage_id');

        $serie = DB::table('series')
            ->select('title', 'year_id', 'stage_id')
            ->where('year_id', '=', $year_id)
            ->where('stage_id', '=', $stage_id)
            ->where('title', '=', $title)
            ->first();

        if (isset($serie) && $serie->year_id == request()->input('year_id') && $serie->stage_id == request()->input('stage_id') && $serie->title == request()->input('title')) {
            alert()->warning('Atenão', 'Você já adicionou esta série/ano');
            return redirect()->back();
        } else {
            return $this->store->storeData($classFormRequest, $this->model);

        }
    }

    public function show($year, $stage, $serie)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->model, $serie);

        $periods = $serie->periods;

        return view('admin::series.show', compact('year', 'stage', 'serie', 'periods'));
    }

    public function destroy($id)
    {
        // Retorna o serie_id e compara com o id do serie
        $room_id = DB::table('rooms')->where('serie_id', '=', $id)->first();
        $period_id = DB::table('periods')->where('serie_id', '=', $id)->first();

        if ($room_id || $period_id) {
            alert()->warning('Atenão', 'Não foi possível excluír o registro, existem dados relacionado!');
            return redirect()->back();
        } else {
            return $this->destroy->destroyData($this->model, $id);
        }
    }
}
