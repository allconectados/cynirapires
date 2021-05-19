<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Discipline;
use Modules\Teacher\Entities\NotaQuintoConceito;
use Modules\Teacher\Entities\Room;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;
use RealRashid\SweetAlert\Facades\Alert;

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

        $studentsNote = DB::table('notas_quinto_conceitos')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('teacher', '=', auth()->user()->name)
            ->where('discipline', '=', $discipline->title)
            ->where('room', '=', $room->title)
            ->get();

        if ($studentsNote->isNotEmpty()) {
            $titlePage = 'NOTAS DO 5º BIMESTRE: '.$discipline->title.' / '.$room->title;
            $studentsNote = DB::table('notas_quinto_conceitos')
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
            $titlePage = 'NOTAS DO 5º CONCEITO: '.$discipline->title.' / '.$room->title;
            $students = DB::table('students')
                ->where('status', '=', 'Ativo')
                ->where('room', '=', $room->title)
                ->get();


            return view('teacher::notas.create-notas-quinto-conceito',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'discipline', 'students'));
        }
    }


    public function update(Request $request, $id)
    {
        $student = NotaQuintoConceito::find($id);

        $student->nota_primeiro_bimestre = $this->request->nota_primeiro_bimestre;
        $student->nota_segundo_bimestre = $this->request->nota_segundo_bimestre;
        $student->nota_terceiro_bimestre = $this->request->nota_terceiro_bimestre;
        $student->nota_quarto_bimestre = $this->request->nota_quarto_bimestre;

        $student->faltas_primeiro_bimestre = $this->request->faltas_primeiro_bimestre;
        $student->faltas_segundo_bimestre = $this->request->faltas_segundo_bimestre;
        $student->faltas_terceiro_bimestre = $this->request->faltas_terceiro_bimestre;
        $student->faltas_quarto_bimestre = $this->request->faltas_quarto_bimestre;

        $student->nota_quinto_conceito = $this->request->nota_quinto_conceito;
        $student->total_de_notas = $this->request->total_de_notas;
        $student->total_de_faltas = $this->request->total_de_faltas;

        foreach ($this->request->id as $item => $value) {
            $dataUpdate = [
                'nota_quinto_conceito' => $request->nota_quinto_conceito[$item],
                'total_de_notas' => $request->nota_quinto_conceito[$item],
                'total_de_faltas' => $request->faltas_primeiro_bimestre[$item]
                    + $request->faltas_segundo_bimestre[$item] + $request->faltas_terceiro_bimestre[$item]
                    + $request->faltas_quarto_bimestre[$item],
            ];

//            dd($dataUpdate);
            $updateQuintoConceito = NotaQuintoConceito::where('id', $request->id[$item])->update($dataUpdate);

        }
        if ($updateQuintoConceito) {
            Alert::success('Sucesso!', 'Registros criados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Erro!', 'Não foi possível criar os registros!');
            return redirect()->back();
        }

    }

}
