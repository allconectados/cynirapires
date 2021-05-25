<?php


namespace Modules\Teacher\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Teacher\Entities\NotaConselho;
use Modules\Teacher\Entities\Discipline;
use Modules\Teacher\Entities\Room;
use Modules\Teacher\Entities\Serie;
use Modules\Teacher\Entities\Stage;
use Modules\Teacher\Entities\Year;
use Modules\Teacher\Services\GetUrl;
use RealRashid\SweetAlert\Facades\Alert;

class NotasController extends Controller
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

        $titlePage = 'NOTAS DO 1º BIMESTRE: ' . $discipline->title . ' / ' . $room->title;

        $dadosBimestres = DB::table('notas_conselhos')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('room', '=', $room->title)
            ->where('discipline', '=', $discipline->title)
            ->where('status', '=', 'Ativo')
            ->get();

        $statusBimestres = DB::table('status_bimestres')->first();

        return view('teacher::notas.index',
            compact('titlePage', 'year', 'stage', 'serie', 'room', 'discipline', 'dadosBimestres', 'statusBimestres'));
    }


    public function update(Request $request, $id)
    {
        $notasConselho = NotaConselho::find($id);

        $notasConselho->code = $this->request->code;
        $notasConselho->ano = $this->request->ano;
        $notasConselho->stage = $this->request->stage;
        $notasConselho->serie = $this->request->serie;
        $notasConselho->room = $this->request->room;
        $notasConselho->discipline = $this->request->discipline;
        $notasConselho->number = $this->request->number;
        $notasConselho->name = $this->request->name;
        $notasConselho->teacher = $this->request->teacher;
        $notasConselho->nota_conselho_primeiro_bimestre = $this->request->nota_conselho_primeiro_bimestre;
        $notasConselho->nota_conselho_segundo_bimestre = $this->request->nota_conselho_segundo_bimestre;
        $notasConselho->nota_conselho_terceiro_bimestre = $this->request->nota_conselho_terceiro_bimestre;
        $notasConselho->nota_conselho_quarto_bimestre = $this->request->nota_conselho_quarto_bimestre;
        $notasConselho->nota_conselho_quinto_conceito = $this->request->nota_conselho_quinto_conceito;

        $notasConselho->faltas_conselho_primeiro_bimestre = $this->request->faltas_conselho_primeiro_bimestre;
        $notasConselho->faltas_conselho_segundo_bimestre = $this->request->faltas_conselho_segundo_bimestre;
        $notasConselho->faltas_conselho_terceiro_bimestre = $this->request->faltas_conselho_terceiro_bimestre;
        $notasConselho->faltas_conselho_quarto_bimestre = $this->request->faltas_conselho_quarto_bimestre;

        $notasConselho->faltas_conselho_total_bimestres = $this->request->faltas_conselho_total_bimestres;
        $notasConselho->faltas_conselho_compensadas = $this->request->faltas_conselho_compensadas;
        $notasConselho->faltas_conselho_total = $this->request->faltas_conselho_total;

        $notasConselho->nota_conselho_aulas_previstas_primeiro_bimestre = $this->request->nota_conselho_aulas_previstas_primeiro_bimestre;
        $notasConselho->nota_conselho_aulas_previstas_segundo_bimestre = $this->request->nota_conselho_aulas_previstas_segundo_bimestre;
        $notasConselho->nota_conselho_aulas_previstas_terceiro_bimestre = $this->request->nota_conselho_aulas_previstas_terceiro_bimestre;
        $notasConselho->nota_conselho_aulas_previstas_quarto_bimestre = $this->request->nota_conselho_aulas_previstas_quarto_bimestre;

        $notasConselho->nota_conselho_aulas_dadas_primeiro_bimestre = $this->request->nota_conselho_aulas_dadas_primeiro_bimestre;
        $notasConselho->nota_conselho_aulas_dadas_segundo_bimestre = $this->request->nota_conselho_aulas_dadas_segundo_bimestre;
        $notasConselho->nota_conselho_aulas_dadas_terceiro_bimestre = $this->request->nota_conselho_aulas_dadas_terceiro_bimestre;
        $notasConselho->nota_conselho_aulas_dadas_quarto_bimestre = $this->request->nota_conselho_aulas_dadas_quarto_bimestre;
        $notasConselho->nota_conselho_aulas_dadas_primeiro_bimestre_request = $request->input('nota_conselho_aulas_dadas_primeiro_bimestre_request');

        dd($notasConselho);





        foreach ($this->request->id as $item => $value) {
//            dd($this->request->nota_conselho_aulas_previstas_primeiro_bimestre[$item]);
            $dataUpdate = [
                'discipline' => $request->discipline[$item],
                'teacher' => $request->teacher[$item],
                'nota_conselho_primeiro_bimestre' => $request->nota_conselho_primeiro_bimestre[$item],
                'nota_conselho_segundo_bimestre' => $request->nota_conselho_segundo_bimestre[$item],
                'nota_conselho_terceiro_bimestre' => $request->nota_conselho_terceiro_bimestre[$item],
                'nota_conselho_quarto_bimestre' => $request->nota_conselho_quarto_bimestre[$item],
                'nota_conselho_quinto_conceito' => $request->nota_conselho_quinto_conceito[$item],

                'faltas_conselho_primeiro_bimestre' => $request->faltas_conselho_primeiro_bimestre[$item],
                'faltas_conselho_segundo_bimestre' => $request->faltas_conselho_segundo_bimestre[$item],
                'faltas_conselho_terceiro_bimestre' => $request->faltas_conselho_terceiro_bimestre[$item],
                'faltas_conselho_quarto_bimestre' => $request->faltas_conselho_quarto_bimestre[$item],

                'faltas_conselho_total_bimestres' => $request->faltas_conselho_primeiro_bimestre[$item]
                    + $request->faltas_conselho_segundo_bimestre[$item]
                    + $request->faltas_conselho_terceiro_bimestre[$item]
                    + $request->faltas_conselho_quarto_bimestre[$item],

                'faltas_conselho_compensadas' => $request->faltas_conselho_compensadas[$item],


                'nota_conselho_aulas_previstas_primeiro_bimestre' => $request->nota_conselho_aulas_previstas_primeiro_bimestre[$item],
                'nota_conselho_aulas_previstas_segundo_bimestre' => $request->nota_conselho_aulas_previstas_segundo_bimestre[$item],
                'nota_conselho_aulas_previstas_terceiro_bimestre' => $request->nota_conselho_aulas_previstas_terceiro_bimestre[$item],
                'nota_conselho_aulas_previstas_quarto_bimestre' => $request->nota_conselho_aulas_previstas_quarto_bimestre[$item],

                'nota_conselho_aulas_dadas_primeiro_bimestre' => $request->nota_conselho_aulas_dadas_primeiro_bimestre[$item],
                'nota_conselho_aulas_dadas_segundo_bimestre' => $request->nota_conselho_aulas_dadas_segundo_bimestre[$item],
                'nota_conselho_aulas_dadas_terceiro_bimestre' => $request->nota_conselho_aulas_dadas_terceiro_bimestre[$item],
                'nota_conselho_aulas_dadas_quarto_bimestre' => $request->nota_conselho_aulas_dadas_quarto_bimestre[$item],

                'faltas_conselho_total' => $request->faltas_conselho_primeiro_bimestre[$item]
                    + $request->faltas_conselho_segundo_bimestre[$item]
                    + $request->faltas_conselho_terceiro_bimestre[$item]
                    + $request->faltas_conselho_quarto_bimestre[$item] - $request->faltas_conselho_compensadas[$item],


                'faltas_conselho_porcentagem_aulas_dadas' => 100 -
                    ($request->faltas_conselho_primeiro_bimestre[$item] + $request->faltas_conselho_segundo_bimestre[$item]
                        + $request->faltas_conselho_terceiro_bimestre[$item] + $request->faltas_conselho_quarto_bimestre[$item])
                    / ($request->nota_conselho_aulas_dadas_primeiro_bimestre[$item] + $request->nota_conselho_aulas_dadas_segundo_bimestre[$item]
                        + $request->nota_conselho_aulas_dadas_terceiro_bimestre[$item] + $request->nota_conselho_aulas_dadas_quarto_bimestre[$item]) * 100,
            ];

            $updateNotasConselho = NotaConselho::where('id', $request->id[$item])->update($dataUpdate);

        }
        if ($updateNotasConselho) {
            Alert::success('Sucesso!', 'Registros atualizados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Erro!', 'Não foi possível atualizar os registros!');
            return redirect()->back();
        }

    }
}
