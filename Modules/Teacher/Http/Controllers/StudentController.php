<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Discipline;
use Modules\Teacher\Entities\Period;
use Modules\Teacher\Entities\Room;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;

class StudentController extends Controller
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
     * @var Room
     */
    private $room;
    /**
     * @var Period
     */
    private $period;

    public function __construct(
        GetUrl $url,
        Year $year,
        Stage $stage,
        Serie $serie,
        Period $period,
        Discipline $discipline,
        Room $room
    ) {
        $this->url = $url;
        $this->year = $year;
        $this->stage = $stage;
        $this->serie = $serie;
        $this->discipline = $discipline;
        $this->room = $room;
        $this->period = $period;
    }

    public function index($year, $stage, $serie, $period, $room)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $period = $this->url->urlData($this->period, $period);

        $room = $this->url->urlData($this->room, $room);

        // Recupera o email do usuário autenticado
        $teacher = auth()->user()->email;

        // Recupera o id e email da tabela teachers e compara com o email do usuário autenticado
        $emailTeacher = DB::table('teachers')->select('id', 'email')->where('email', '=', $teacher)->first();


        $value = DB::table('disciplines')
           ->where('year_id', '=', $year->id)
           ->where('stage_id', '=', $stage->id)
           ->where('serie_id', '=', $serie->id)
           ->where('room_id', '=', $room->id)
            ->where('teacher_id', '=', $emailTeacher->id)
           ->get();

        dd($value->title);

        $discipline = DB::table('disciplines')->where('title', '=', $value)->first();

        dd($discipline->title);


        $titlePage = 'Lista da turma: '.$room->title;

        $students = DB::table('students')
            ->where('status', '=', 'Ativo')
            ->where('room', '=', $room->title)->get();


        return view('teacher::students.index',
            compact('titlePage', 'year', 'stage', 'serie', 'period', 'room', 'students', 'discipline'));
    }

}