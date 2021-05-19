<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Coordination\Entities\Serie;
use Modules\Coordination\Entities\Stage;
use Modules\Coordination\Entities\Year;
use Modules\Coordination\Services\GetUrl;

class SerieController extends Controller
{
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
     * @param  Year  $year
     * @param  Stage  $stage
     * @param  GetUrl  $url
     */
    public function __construct(Year $year, Stage $stage, GetUrl $url)
    {
        $this->url = $url;
        $this->year = $year;
        $this->stage = $stage;
    }

    public function index($year, $stage)
    {
        $titlePage = 'Gerenciar Séries do Tipo de Ensino: '. $stage;

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $series = $stage->series->where('year_id', $year->id)->where('stage_id', $stage->id);

        return view('coordination::series.index', compact('titlePage', 'series', 'year', 'stage'));
    }
}
