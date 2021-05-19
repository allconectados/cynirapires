<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Coordination\Entities\NotaQuintoConceito;
use Modules\Coordination\Entities\Room;
use Modules\Coordination\Entities\Serie;
use Modules\Coordination\Entities\Stage;
use Modules\Coordination\Entities\Year;
use Modules\Coordination\Services\GetUrl;
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

    public function __construct(Year $year, Stage $stage, Serie $serie, Room $room, GetUrl $url, Request $request)
    {
        $this->room = $room;
        $this->year = $year;
        $this->stage = $stage;
        $this->serie = $serie;
        $this->url = $url;
        $this->request = $request;
    }

    public function store()
    {
        $code = $this->request->code;
        $ano = $this->request->ano;
        $stage = $this->request->stage;
        $serie = $this->request->serie;
        $room = $this->request->room;
        $number = $this->request->number;
        $name = $this->request->name;

        for ($i = 0; $i < count($ano); $i++) {
            $datasave = [
                'code' => $code[$i],
                'ano' => $ano[$i],
                'stage' => $stage[$i],
                'serie' => $serie[$i],
                'room' => $room[$i],
                'number' => $number[$i],
                'name' => $name[$i],
            ];
            $create = NotaQuintoConceito::create($datasave);
        }
        if ($create) {
            Alert::success('Sucesso!', 'Registros criados com sucesso!');
            return redirect()->back();
        } else {
            Alert::error('Erro!', 'Não foi possível criar os registros!');
            return redirect()->back();
        }

    }

    public function conselho($year, $stage, $serie, $room)
    {
        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->url->urlData($this->room, $room);

        $studentsNote = DB::table('notas_quinto_conceitos')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('room', '=', $room->title)
            ->get();

        if ($studentsNote->isNotEmpty()) {
            $titlePage = 'NOTAS DO CONSELHO: ' . ' / ' . $room->title;
            $studentsNote = DB::table('notas_quinto_conceitos')
                ->where('ano', '=', $year->title)
                ->where('stage', '=', $stage->title)
                ->where('serie', '=', $serie->title)
                ->where('room', '=', $room->title)
                ->get();
            return view(
                'coordination::rooms.conselho',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'studentsNote')
            );
        } else {
            $titlePage = 'NOTAS DO CONSELHO: ' . ' / ' . $room->title;
            $students = DB::table('students')
                ->where('status', '=', 'Ativo')
                ->where('room', '=', $room->title)
                ->get();
            return view(
                'coordination::rooms.conselho',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'students'));
        }


    }

    public function filterConselho(Request $request, $year, $stage, $serie, $room)
    {
        $selectStudent = $request->input('selectStudent');

        $year = $this->url->urlData($this->year, $year);

        $stage = $this->url->urlData($this->stage, $stage);

        $serie = $this->url->urlData($this->serie, $serie);

        $room = $this->url->urlData($this->room, $room);

        $studentsNote = DB::table('notas_quinto_conceitos')
            ->where('ano', '=', $year->title)
            ->where('stage', '=', $stage->title)
            ->where('serie', '=', $serie->title)
            ->where('room', '=', $room->title)
            ->get();

            return view(
                'coordination::rooms.conselho',
                compact('titlePage', 'year', 'stage', 'serie', 'room', 'studentsNote'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
