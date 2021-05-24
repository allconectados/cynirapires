<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Coordination\Entities\FaltasConselhoStudent;
use Modules\Coordination\Entities\NotaConselho;
use Modules\Coordination\Entities\Room;
use Modules\Coordination\Entities\Serie;
use Modules\Coordination\Entities\Stage;
use Modules\Coordination\Entities\StatusBimestre;
use Modules\Coordination\Entities\Year;
use Modules\Coordination\Services\GetUrl;
use Modules\Coordination\Services\UpdateService;
use RealRashid\SweetAlert\Facades\Alert;

class ConselhoController extends Controller
{
    /**
     * @var Room
     */
    private $room;
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
     * @var GetUrl
     */
    private $url;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var UpdateService
     */
    private $update;

    public function __construct(
        Year $year,
        Stage $stage,
        Serie $serie,
        Room $room,
        GetUrl $url,
        Request $request,
        UpdateService $update
    ) {
        $this->room = $room;
        $this->year = $year;
        $this->stage = $stage;
        $this->serie = $serie;
        $this->url = $url;
        $this->request = $request;
        $this->update = $update;
    }

    public function index($year, $stage, $serie, $room)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->url->urlData($this->room, $room);

        $titlePage = 'Conselho: '.$room->title.' / '.$serie->title.' / '.$stage->title.' / '.$year->title;

        $listStudentsSelects = DB::table('students')->select('id', 'room', 'number', 'name', 'status')
            ->where('room', '=', $room->title)
            ->where('status', '=', 'Ativo')
            ->get();

        $disciplines = DB::table('disciplines')
            ->where('year_id', '=', $year->id)
            ->where('stage_id', '=', $stage->id)
            ->where('serie_id', '=', $serie->id)
            ->where('room_id', '=', $room->id)
            ->orderBy('title', 'asc')
            ->get();


        return view(
            'coordination::rooms.conselho.index',
            compact('titlePage', 'year', 'stage', 'serie', 'room', 'disciplines', 'listStudentsSelects')
        );
    }

    public function statusBimestreUpdate(Request $request, $id)
    {
        $dataForm = $request->all();

        $data = StatusBimestre::find($id);

        $update = $data->update($dataForm);

        if ($update) {
            Alert::success('Sucesso!', 'Bimestre bloqueado com sucesso!');
            return redirect()->back();
        } else {
            Alert::success('Sucesso!', 'Não foi possível bloquear o bimestre com sucesso!');
            return redirect()->back();
        }
    }


    public function filterStudent(Request $request, $year, $stage, $serie, $room)
    {
        $selectStudent = $request->input('selectStudent');

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->url->urlData($this->room, $room);

        $listStudentsSelects = DB::table('students')->select('id', 'room', 'number', 'name', 'status')
            ->where('room', '=', $room->title)
            ->where('status', '=', 'Ativo')
            ->get();

        $disciplines = DB::table('disciplines')
            ->where('year_id', '=', $year->id)
            ->where('stage_id', '=', $stage->id)
            ->where('serie_id', '=', $serie->id)
            ->where('room_id', '=', $room->id)
            ->orderBy('title', 'asc')
            ->get();

        $notasConselhos = DB::table('notas_conselhos')
//            ->select('ano','stage','serie','room','discipline','number','name', 'nota', 'total_de_faltas')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('room', '=', $room->title)
            ->where('name', 'like', $selectStudent)
            ->get();

        $statusBimestres = DB::table('status_bimestres')->first();

        $faltasConselhoStudents = DB::table('faltas_conselho_students')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('room', '=', $room->title)
            ->where('name', '=', $selectStudent)
            ->first();



        $titlePage = 'Conselho do: '.$room->title.' / '.$serie->title.' / '.$stage->title.' / '.$year->title;

        return view(
            'coordination::rooms.conselho.index',
            compact('titlePage', 'year', 'stage', 'serie', 'room', 'disciplines', 'listStudentsSelects',
                'notasConselhos', 'selectStudent', 'faltasConselhoStudents', 'statusBimestres'));

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

        foreach ($this->request->id as $item => $value) {
            $dataUpdate = [
                'discipline' => $request->discipline[$item],
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

                'faltas_conselho_total' => $request->faltas_conselho_primeiro_bimestre[$item]
                    + $request->faltas_conselho_segundo_bimestre[$item]
                    + $request->faltas_conselho_terceiro_bimestre[$item]
                    + $request->faltas_conselho_quarto_bimestre[$item] - $request->faltas_conselho_compensadas[$item],

            ];
            $updateNotasConselho = NotaConselho::where('id', $request->id[$item])->update($dataUpdate);
            if (FaltasConselhoStudent::where('ano', $request->ano[$item])->where('stage', $request->stage[$item])
                    ->where('serie', $request->serie[$item])->where('room', $request->room[$item])
                    ->where('number', $request->number[$item])->where('name', $request->name[$item])->count() > 0) {
                DB::table('faltas_conselho_students')->where('ano', $request->ano[$item])
                    ->where('stage', $request->stage[$item])->where('serie', $request->serie[$item])
                    ->where('room', $request->room[$item])->where('number', $request->number[$item])
                    ->where('name', $request->name[$item])->update(
                        [
                            'code' => $request->code[$item],
                            'ano' => $request->ano[$item],
                            'stage' => $request->stage[$item],
                            'serie' => $request->serie[$item],
                            'room' => $request->room[$item],
                            'number' => $request->number[$item],
                            'name' => $request->name[$item],
                            'total_falta_primeiro_bimestre' => array_sum($request->faltas_conselho_primeiro_bimestre),
                            'total_falta_segundo_bimestre' => array_sum($request->faltas_conselho_segundo_bimestre),
                            'total_falta_terceiro_bimestre' => array_sum($request->faltas_conselho_terceiro_bimestre),
                            'total_falta_quarto_bimestre' => array_sum($request->faltas_conselho_quarto_bimestre),
                            'total_falta_bimestres' => array_sum($request->faltas_conselho_primeiro_bimestre)
                                + array_sum($request->faltas_conselho_segundo_bimestre)
                                + array_sum($request->faltas_conselho_terceiro_bimestre)
                                + array_sum($request->faltas_conselho_quarto_bimestre),
                            'total_falta_compensadas_ano' => array_sum($request->faltas_conselho_compensadas),
                            'total_falta_ano' => array_sum($request->faltas_conselho_primeiro_bimestre)
                                + array_sum($request->faltas_conselho_segundo_bimestre)
                                + array_sum($request->faltas_conselho_terceiro_bimestre)
                                + array_sum($request->faltas_conselho_quarto_bimestre) - array_sum($request->faltas_conselho_compensadas),
                        ]
                    );
            } else {
                FaltasConselhoStudent::create([
                    'code' => $request->code[$item],
                    'ano' => $request->ano[$item],
                    'stage' => $request->stage[$item],
                    'serie' => $request->serie[$item],
                    'room' => $request->room[$item],
                    'number' => $request->number[$item],
                    'name' => $request->name[$item],
                    'total_falta_primeiro_bimestre' => array_sum($notasConselho->faltas_conselho_primeiro_bimestre),
                    'total_falta_segundo_bimestre' => array_sum($notasConselho->faltas_conselho_segundo_bimestre),
                    'total_falta_terceiro_bimestre' => array_sum($notasConselho->faltas_conselho_terceiro_bimestre),
                    'total_falta_quarto_bimestre' => array_sum($notasConselho->faltas_conselho_quarto_bimestre),
                    'total_falta_bimestres' => array_sum($request->faltas_conselho_primeiro_bimestre)
                        + array_sum($request->faltas_conselho_segundo_bimestre)
                        + array_sum($request->faltas_conselho_terceiro_bimestre)
                        + array_sum($request->faltas_conselho_quarto_bimestre),
                    'total_falta_compensadas_ano' => array_sum($notasConselho->faltas_conselho_compensadas),
                    'total_falta_ano' => array_sum($request->faltas_conselho_primeiro_bimestre)
                        + array_sum($request->faltas_conselho_segundo_bimestre)
                        + array_sum($request->faltas_conselho_terceiro_bimestre)
                        + array_sum($request->faltas_conselho_quarto_bimestre) - array_sum($request->faltas_conselho_compensadas),
                ]);
            }
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
