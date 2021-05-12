<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Discipline;
use Modules\Teacher\Entities\Period;
use Modules\Teacher\Entities\Room;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Teacher;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;

class RoomController extends Controller
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
    /**
     * @var Discipline
     */
    private $discipline;
    /**
     * @var Period
     */
    private $period;
    /**
     * @var Room
     */
    private $room;

    public function __construct(GetUrl $url, Year $year, Stage $stage, Serie $serie, Period $period, Room $room, Discipline $discipline)
    {
        $this->url = $url;
        $this->year = $year;
        $this->stage = $stage;
        $this->serie = $serie;
        $this->discipline = $discipline;
        $this->period = $period;
        $this->room = $room;
    }

    public function index($year, $stage, $serie, $period)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $period = $this->url->urlData($this->period, $period);

        $titlePage = 'TARGETAS DO: '.$period->title;

        // Recupera o email do usuário autenticado
        $teacher = auth()->user()->email;

        // Recupera o id e email da tabela teachers e compara com o email do usuário autenticado
        $emailTeacher = DB::table('teachers')->select('id','email')->where('email', '=', $teacher)->first();

        $disciplines = $this->discipline->with([ 'year', 'stage', 'serie', 'room','teacher'])
            ->where('teacher_id', '=', $emailTeacher->id)
            ->where('year_id', '=', $year->id)
            ->where('stage_id', '=', $stage->id)
            ->where('serie_id', '=', $serie->id)
            ->orderBy('title', 'asc')
            ->orderBy('stage_id', 'asc')
            ->orderBy('serie_id', 'asc')
//            ->orderBy('room_id', 'asc')
            ->get();

        return view('teacher::rooms.index', compact('titlePage','year', 'stage', 'serie', 'period', 'disciplines'));
    }

    public function show($year, $stage, $serie, $period, $room, $discipline)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $period = $this->url->urlData($this->period, $period);

        $room = $this->url->urlData($this->room, $room);

        $discipline = $this->url->urlData($this->discipline, $discipline);

        $titlePage = 'TARGETAS DO: '.$period->title;

        $students = DB::table('students')
            ->where('status', '=', 'Ativo')
            ->where('room', '=', $room->title)->get();

        return view('teacher::rooms.show', compact('titlePage','year', 'stage', 'serie', 'period', 'room', 'discipline', 'students'));
    }

}