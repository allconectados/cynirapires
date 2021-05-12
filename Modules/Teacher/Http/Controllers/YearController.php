<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\ListDataService;

class YearController extends Controller
{
    private $orderBy = 'title';

    private $direction = 'desc';
    /**
     * @var Year
     */
    private $model;
    /**
     * @var ListData
     */
    private $list;

    public function __construct(Year $model, ListDataService $list)
    {
        $this->model = $model;
        $this->list = $list;
    }

    public function index()
    {
        $titlePage = 'Gerenciar ano letivo';

        $years = $this->list->listData($this->model, $this->orderBy,$this->direction);

        return view('teacher::years.index', compact('titlePage','years'));
    }

}