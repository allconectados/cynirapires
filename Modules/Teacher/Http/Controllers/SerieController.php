<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Room;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;

class SerieController extends Controller
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

    public function __construct(GetUrl $url, Year $year, Stage $stage)
    {
        $this->url = $url;
        $this->year = $year;
        $this->stage = $stage;
    }

    public function index($year, $stage)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $series = $stage->series;

        $titlePage = 'Lista das séries do Ensino: '.$stage->title;

        return view('teacher::series.index', compact('titlePage','year', 'stage', 'series'));
    }

}