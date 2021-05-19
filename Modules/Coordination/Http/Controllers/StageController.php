<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Coordination\Entities\Stage;
use Modules\Coordination\Entities\Year;
use Modules\Coordination\Services\GetUrl;

class StageController extends Controller
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
     * StageController constructor.
     * @param  Year  $year
     * @param  GetUrl  $url
     */
    public function __construct(Year $year, GetUrl $url)
    {
        $this->url = $url;
        $this->year = $year;
    }

    public function index($year)
    {
        $titlePage = 'Gerenciar Tipo de Ensino';

        $year = $this->url->urlData($this->year, $year);

        $stages = $year->stages->where('year_id', $year->id);

        return view('coordination::stages.index', compact('titlePage', 'stages', 'year'));
    }
}
