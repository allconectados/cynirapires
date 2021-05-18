<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Discipline;
use Modules\Teacher\Entities\NotaQuintoConceito;
use Modules\Teacher\Entities\NotaTerceiroBimestre;
use Modules\Teacher\Entities\Room;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;
use RealRashid\SweetAlert\Facades\Alert;

class NotaTerceiroBimestreController extends Controller
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

        $studentsNote = DB::table('notas_terceiro_bimestres')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('teacher', '=', auth()->user()->name)
            ->where('discipline', '=', $discipline->title)
            ->where('room', '=', $room->title)
            ->get();

        if ($studentsNote->isNotEmpty()) {
            $titlePage = 'NOTAS DO 3º BIMESTRE: '.$discipline->title.' / '.$room->title;
            $studentsNote = DB::table('notas_terceiro_bimestres')
                ->where('ano', '=', $year->title)
                ->where('stage', '=', $stage->title)
                ->where('serie', '=', $serie->title)
                ->where('teacher', '=', auth()->user()->name)
                ->where('discipline', '=', $discipline->title)
                ->where('room', '=', $room->title)
                ->get();
            return view('teacher::notas.edit-notas-terceiro-bimestre',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'discipline', 'studentsNote'));
        } else {
            $titlePage = 'NOTAS DO 3º BIMESTRE: '.$discipline->title.' / '.$room->title;
            $students = DB::table('students')
                ->where('status', '=', 'Ativo')
                ->where('room', '=', $room->title)
                ->get();

            return view('teacher::notas.create-notas-terceiro-bimestre',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'discipline', 'students'));
        }
    }

    public function store()
    {
        $code = $this->request->code;
        $ano = $this->request->ano;
        $stage = $this->request->stage;
        $serie = $this->request->serie;
        $teacher = $this->request->teacher;
        $discipline = $this->request->discipline;
        $room = $this->request->room;
        $number = $this->request->number;
        $name = $this->request->name;
        $nota = $this->request->nota;
        $falta = $this->request->falta;
        $faltas_compensadas = $this->request->faltas_compensadas;

        for ($i = 0; $i < count($ano); $i++) {
            $datasave = [
                'code' => $code[$i],
                'ano' => $ano[$i],
                'stage' => $stage[$i],
                'serie' => $serie[$i],
                'teacher' => $teacher[$i],
                'discipline' => $discipline[$i],
                'room' => $room[$i],
                'number' => $number[$i],
                'name' => $name[$i],
                'nota' => $nota[$i],
                'falta' => $falta[$i],
                'faltas_compensadas' => $faltas_compensadas[$i],
                'total_de_faltas' => $falta[$i] - $faltas_compensadas[$i],
            ];
            $create = NotaTerceiroBimestre::create($datasave);

            if ($create) {

                DB::table('notas_quinto_conceitos')
                    ->where('ano', $this->request->ano[$i])->where('stage', $this->request->stage[$i])
                    ->where('serie', $this->request->serie[$i])->where('teacher', $this->request->teacher[$i])
                    ->where('discipline', $this->request->discipline[$i])->where('room', $this->request->room[$i])
                    ->where('number', $this->request->number[$i])->where('name',
                        $this->request->name[$i])->update(
                        [
                            'nota_terceiro_bimestre' => $this->request->nota[$i],
                            'faltas_terceiro_bimestre' => $this->request->falta[$i] - $this->request->faltas_compensadas[$i],
                        ]
                    );


            }

        }
        if ($create) {
            Alert::success('Sucesso!', 'Registros criados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Erro!', 'Não foi possível criar os registros!');
            return redirect()->back();
        }

    }

    public function update(Request $request, $id)
    {
        $student = NotaTerceiroBimestre::find($id);

        $student->nota = $this->request->nota;
        $student->falta = $this->request->falta;
        $student->faltas_compensadas = $this->request->faltas_compensadas;

        foreach ($this->request->id as $item => $value) {
            $dataUpdate = [
                'nota' => $request->nota[$item],
                'falta' => $request->falta[$item],
                'faltas_compensadas' => $request->faltas_compensadas[$item],
                'total_de_faltas' => $request->falta[$item] - $request->faltas_compensadas[$item],
            ];
            $updateBimestre = NotaTerceiroBimestre::where('id', $request->id[$item])->update($dataUpdate);
            if ($updateBimestre) {

                DB::table('notas_quinto_conceitos')->where('ano', $request->ano[$item])->where('stage',
                    $request->stage[$item])
                    ->where('serie', $request->serie[$item])->where('teacher', $request->teacher[$item])
                    ->where('discipline', $request->discipline[$item])->where('room', $request->room[$item])
                    ->where('number', $request->number[$item])->where('name',
                        $request->name[$item])->update(
                        [
                            'nota_terceiro_bimestre' => $request->nota[$item],
                            'faltas_terceiro_bimestre' => $request->falta[$item] - $request->faltas_compensadas[$item],
                        ]
                    );


            }

        }
        if ($updateBimestre) {
            Alert::success('Sucesso!', 'Registros criados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Erro!', 'Não foi possível criar os registros!');
            return redirect()->back();
        }

    }

}
