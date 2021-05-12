<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;

class PeriodController extends Controller
{
    private $orderBy = 'title';

    private $direction = 'desc';
    /**
     * @var GetUrl
     */
    private $url;
    /**
     * @var Year
     */
    private $year;
    /**
     * @var Stage
     */
    private $stage;
    /**
     * @var Serie
     */
    private $serie;

    public function __construct(GetUrl $url, Year $year, Stage $stage, Serie $serie)
    {
        $this->url = $url;
        $this->year = $year;
        $this->stage = $stage;
        $this->serie = $serie;
    }

    public function index($year, $stage, $serie)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $periods = $serie->periods;

        $period = DB::table('periods')->select('id')->pluck('id');

        $titlePage = 'Lista dos períodos do: '.$serie->title.' '.$stage->title.' '.$year->title;

        return view('teacher::periods.index', compact('titlePage', 'year', 'stage', 'serie', 'periods', 'period'));
    }

    public function rooms()
    {
        dd('Room periods');
    }

}