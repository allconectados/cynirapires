<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Discipline;
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
     * @var Room
     */
    private $room;
    /**
     * @var Request
     */
    private $request;

    public function __construct(
        GetUrl $url,
        Year $year,
        Stage $stage,
        Serie $serie,
        Room $room,
        Discipline $discipline,
        Request $request
    ) {
        $this->url = $url;
        $this->year = $year;
        $this->stage = $stage;
        $this->serie = $serie;
        $this->discipline = $discipline;
        $this->room = $room;
        $this->request = $request;
    }

    public function index($year, $stage, $serie)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $titlePage = 'TARGETAS DO: '.$serie->title;

        // Recupera o email do usuário autenticado
        $teacher = auth()->user()->email;

        // Recupera o id e email da tabela teachers e compara com o email do usuário autenticado
        $emailTeacher = DB::table('teachers')->select('name', 'email')->where('email', '=', $teacher)->first();

        $disciplines = $this->discipline->with(['year', 'stage', 'serie', 'room', 'teacher'])
            ->where('teacher', '=', $emailTeacher->name)
            ->where('year_id', '=', $year->id)
            ->where('stage_id', '=', $stage->id)
            ->where('serie_id', '=', $serie->id)
            ->orderBy('title', 'asc')
            ->orderBy('stage_id', 'asc')
            ->orderBy('serie_id', 'asc')
            ->orderBy('room_id', 'asc')
//            ->orderBy('room_id', 'asc')
            ->get();

        return view('teacher::rooms.index', compact('titlePage', 'year', 'stage', 'serie', 'disciplines'));
    }
}
