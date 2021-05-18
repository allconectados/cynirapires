<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Discipline;
use Modules\Teacher\Entities\Room;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;

class NotaQuintoConceitoController extends Controller
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

    public function index($year, $stage, $serie, $room, $discipline)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->url->urlData($this->room, $room);

        $discipline = $this->url->urlData($this->discipline, $discipline);

        $studentsNote = DB::table('notas_quinto_conceito')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('teacher', '=', auth()->user()->name)
            ->where('discipline', '=', $discipline->title)
            ->where('room', '=', $room->title)
            ->get();

        $titlePage = 'NOTAS DO 5º BIMESTRE: '.$discipline->title.' / '.$room->title;

        if ($studentsNote->isNotEmpty()) {
            $titlePage = 'NOTAS DO 5º BIMESTRE: '.$discipline->title.' / '.$room->title;
            $studentsNote = DB::table('notas_quinto_conceito')
                ->where('ano', '=', $year->title)
                ->where('stage', '=', $stage->title)
                ->where('serie', '=', $serie->title)
                ->where('teacher', '=', auth()->user()->name)
                ->where('discipline', '=', $discipline->title)
                ->where('room', '=', $room->title)
                ->get();
            return view('teacher::notas.edit-notas-quinto-conceito',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'discipline', 'studentsNote'));
        } else {
            $titlePage = 'NOTAS DO 5º BIMESTRE: '.$discipline->title.' / '.$room->title;
            $students = DB::table('students')
                ->where('status', '=', 'Ativo')
                ->where('room', '=', $room->title)
                ->get();


            return view('teacher::notas.create-notas-quinto-conceito',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'discipline', 'students'));
        }
    }


        public
        function store()
        {
            $ano = $this->request->ano;
            $stage = $this->request->stage;
            $serie = $this->request->serie;
            $teacher = $this->request->teacher;
            $discipline = $this->request->discipline;
            $room = $this->request->room;
            $number = $this->request->number;
            $name = $this->request->name;
            $nota = $this->request->nota;
            $nota_participation = $this->request->nota_participation;
            $nota_final = $this->request->nota_final;
            $falta = $this->request->falta;
            $faltas_compensadas = $this->request->faltas_compensadas;
            $total_de_faltas = $this->request->total_de_faltas;

            for ($i = 0; $i < count($ano); $i++) {
                $datasave = [
                    'ano' => $ano[$i],
                    'stage' => $stage[$i],
                    'serie' => $serie[$i],
                    'teacher' => $teacher[$i],
                    'discipline' => $discipline[$i],
                    'room' => $room[$i],
                    'number' => $number[$i],
                    'name' => $name[$i],
                    'nota' => $nota[$i],
                    'nota_participation' => $nota_participation[$i],
                    'nota_final' => $nota_final[$i],
                    'falta' => $falta[$i],
                    'faltas_compensadas' => $faltas_compensadas[$i],
                    'total_de_faltas' => $total_de_faltas[$i],
                ];
                DB::table('notas_quinto_conceito')->insert($datasave);
            }
            return redirect()->back();

        }

        public
        function update($id)
        {
            $discipline = DB::table('disciplines')->find($id);

            dd($discipline);

            $ano = $discipline->ano;
            $stage = $discipline->stage;
            $serie = $discipline->serie;
            $teacher = $discipline->teacher;
            $discipline = $discipline->discipline;
            $room = $discipline->room;
            $number = $discipline->number;
            $name = $discipline->name;
            $bimestre_one_note = $discipline->bimestre_one_note;
            $bimestre_one_falta = $discipline->bimestre_one_falta;
            $bimestre_two_note = $discipline->bimestre_two_note;
            $bimestre_two_falta = $discipline->bimestre_two_falta;
            $bimestre_tree_note = $discipline->bimestre_tree_note;
            $bimestre_tree_falta = $discipline->bimestre_tree_falta;
            $bimestre_four_note = $discipline->bimestre_four_note;
            $bimestre_four_falta = $discipline->bimestre_four_falta;
            $note_participation = $discipline->note_participation;
            $total_note = $discipline->total_note;
            $faltas_compensadas = $discipline->faltas_compensadas;
            $total_faltas = $discipline->total_faltas;
            $motivo_note_participation = $discipline->motivo_note_participation;

            for ($i = 0; $i < count($ano); $i++) {
                $datasave = [
                    'ano' => $ano[$i],
                    'stage' => $stage[$i],
                    'serie' => $serie[$i],
                    'teacher' => $teacher[$i],
                    'discipline' => $discipline[$i],
                    'room' => $room[$i],
                    'number' => $number[$i],
                    'name' => $name[$i],
                    'bimestre_one_note' => $bimestre_one_note[$i],
                    'bimestre_one_falta' => $bimestre_one_falta[$i],
                    'bimestre_two_note' => $bimestre_two_note[$i],
                    'bimestre_two_falta' => $bimestre_two_falta[$i],
                    'bimestre_tree_note' => $bimestre_tree_note[$i],
                    'bimestre_tree_falta' => $bimestre_tree_falta[$i],
                    'bimestre_four_note' => $bimestre_four_note[$i],
                    'bimestre_four_falta' => $bimestre_four_falta[$i],
                    'note_participation' => $note_participation[$i],
                    'total_note' => $total_note[$i],
                    'faltas_compensadas' => $faltas_compensadas[$i],
                    'total_faltas' => $total_faltas[$i],
                    'motivo_note_participation' => $motivo_note_participation[$i],
                ];
                DB::table('notas_bimestre_regular')->update($datasave);
            }
            return redirect()->back();

        }

    }