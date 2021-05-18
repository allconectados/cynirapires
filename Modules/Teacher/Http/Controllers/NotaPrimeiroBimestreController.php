<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\Discipline;
use Modules\Teacher\Entities\NotaPrimeiroBimestre;
use Modules\Teacher\Entities\NotaQuintoConceito;
use Modules\Teacher\Entities\Room;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;
use RealRashid\SweetAlert\Facades\Alert;

class NotaPrimeiroBimestreController extends Controller
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

        $studentsNote = DB::table('notas_primeiro_bimestres')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('teacher', '=', auth()->user()->name)
            ->where('discipline', '=', $discipline->title)
            ->where('room', '=', $room->title)
            ->get();

        if ($studentsNote->isNotEmpty()) {
            $titlePage = 'NOTAS DO 1º BIMESTRE: '.$discipline->title.' / '.$room->title;
            $studentsNote = DB::table('notas_primeiro_bimestres')
                ->where('ano', '=', $year->title)
                ->where('stage', '=', $stage->title)
                ->where('serie', '=', $serie->title)
                ->where('teacher', '=', auth()->user()->name)
                ->where('discipline', '=', $discipline->title)
                ->where('room', '=', $room->title)
                ->get();
            return view('teacher::notas.edit-notas-primeiro-bimestre',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'discipline', 'studentsNote'));
        } else {
            $titlePage = 'NOTAS DO 1º BIMESTRE: '.$discipline->title.' / '.$room->title;
            $students = DB::table('students')
                ->where('status', '=', 'Ativo')
                ->where('room', '=', $room->title)
                ->get();

            return view('teacher::notas.create-notas-primeiro-bimestre',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'discipline', 'students'));
        }
    }

    public function store()
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
        $falta = $this->request->falta;
        $faltas_compensadas = $this->request->faltas_compensadas;

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
                'nota_final' => $nota[$i] + $nota_participation[$i],
                'falta' => $falta[$i],
                'faltas_compensadas' => $faltas_compensadas[$i],
                'total_de_faltas' => $falta[$i] - $faltas_compensadas[$i],
            ];
            $create = NotaPrimeiroBimestre::create($datasave);

            if ($create) {
                $saveQuintoConceito = [
                    'ano' => $ano[$i],
                    'stage' => $stage[$i],
                    'serie' => $serie[$i],
                    'teacher' => $teacher[$i],
                    'discipline' => $discipline[$i],
                    'room' => $room[$i],
                    'number' => $number[$i],
                    'name' => $name[$i],
                    'nota_primeiro_bimestre' => $nota[$i] + $nota_participation[$i],
                    'faltas_primeiro_bimestre' => $falta[$i] - $faltas_compensadas[$i],
                ];

                $store = NotaQuintoConceito::create($saveQuintoConceito);
            }

        }
        if ($store) {
            Alert::success('Sucesso!', 'Registros criados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Erro!', 'Não foi possível criar os registros!');
            return redirect()->back();
        }

    }

    public function update(Request $request, $id)
    {
        $student = NotaPrimeiroBimestre::find($id);

        $student->nota = $request->nota;
        $student->nota_participation = $request->nota_participation;
        $student->falta = $request->falta;
        $student->faltas_compensadas = $request->faltas_compensadas;

        if (count($request->id) > 0) {
            foreach ($request->id as $item => $value) {
                $data = array(
                    'nota' => $request->nota[$item],
                    'nota_participation' => $request->nota_participation[$item],
                    'nota_final' => $request->nota[$item] + $request->nota_participation[$item],
                    'falta' => $request->falta[$item],
                    'faltas_compensadas' => $request->faltas_compensadas[$item],
                    'total_de_faltas' => $request->falta[$item] - $request->faltas_compensadas[$item],
                );
                $save = NotaPrimeiroBimestre::where('id', $request->id[$item])->first();
                $updateBimestre = $save->update($data);

                if ($updateBimestre){
                    $dataQuintoConceito = array(
                        'nota_primeiro_bimestre' => $request->nota[$item] + $request->nota_participation[$item],
                        'faltas_primeiro_bimestre' => $request->falta[$item] - $request->faltas_compensadas[$item],
                    );

                    $UpdateQuintoConceito = NotaQuintoConceito::where('ano', $request->ano[$item])->where('stage', $request->stage[$item])
                        ->where('serie', $request->serie[$item])->where('teacher', $request->teacher[$item])
                        ->where('discipline', $request->discipline[$item])->where('room', $request->room[$item])
                        ->where('number', $request->number[$item])->where('name', $request->name[$item])
                        ->first();
                    $update = $UpdateQuintoConceito->update($dataQuintoConceito);

                    if ($update) {
                        Alert::success('Sucesso!', 'Registros atualizados com sucesso!');
                        return redirect()->back();
                    } else {
                        Alert::error('Erro!', 'Não foi possível atualizar os registros!');
                        return redirect()->back();
                    }
                }

            }




        }


    }
}