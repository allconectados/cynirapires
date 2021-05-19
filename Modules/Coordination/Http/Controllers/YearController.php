<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Coordination\Entities\Year;

class YearController extends Controller
{
    /**
     * @var Year
     */
    private $year;

    /**
     * YearController constructor.
     * @param  Year  $year
     */
    public function __construct(Year $year)
    {
        $this->year = $year;
    }

    public function index()
    {
        $titlePage = 'Gerenciar Ano';

        $years = Year::paginate(2);

        return view('coordination::years.index', compact('titlePage', 'years'));
    }
}
