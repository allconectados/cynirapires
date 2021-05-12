<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;

class StageController extends Controller
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

    public function __construct(GetUrl $url, Year $year)
    {
        $this->url = $url;
        $this->year = $year;
    }

    public function index($year)
    {
        $year = $this->url->urlData($this->year, $year);

        $titlePage = 'Lista dos estágios do ano de: '.$year->title;

        $stages = $year->stages->where('year_id', '=', $year->id);

        return view('teacher::stages.index', compact('titlePage','year', 'stages'));
    }

}