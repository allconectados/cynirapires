<?php

namespace Modules\Coordination\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ConselhoPrimeiroBimestreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $titlePage = 'Olá, '.auth()->user()->name.'!';

        return view('coordination::index', compact('titlePage'));
    }

    public function conselho()
    {
        $titlePage = 'Controller do Conselho';


        return view('coordination::conselho.index', compact('titlePage'));
    }

    public function conselhoPrimeiroBimestre(Request $request)
    {
        $titlePage = 'Controller do Conselho do Primeiro Bimestre';

        $years = DB::table('years')->select('title')->get();
        $stages = DB::table('stages')->select('title')->get();
        $series = DB::table('series')->select('title')->get();
        $rooms = DB::table('rooms')->select('title')->get();
        $students = DB::table('students')->select('name')->get();

        return view(
            'coordination::conselho.conselho-primeiro-bimestre',
            compact('titlePage', 'years', 'stages', 'series', 'rooms', 'students')
        );
    }

    public function filterConselhoPrimeiroBimestre(Request $request)
    {
        $titlePage = 'Controller do Conselho do Primeiro Bimestre';

        $selectYear = $request->get('selectYear');
        $selectStage = $request->get('selectStage');
        $selectSerie = $request->get('selectSerie');
        $selectRoom = $request->get('selectRoom');


        $data = DB::table('notas_primeiro_bimestres')
            ->where('ano', 'like', $selectYear)
            ->where('stage', '=', $selectStage)
            ->where('serie', '=', $selectSerie)
            ->where('room', '=', $selectRoom)
            ->orderBy('name', 'asc')
            ->get();

        dd($data);

        return view(
            'coordination::conselho.conselho-primeiro-bimestre', compact('titlePage', 'data')
        );

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('coordination::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param  int  $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('coordination::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('coordination::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request  $request
     * @param  int  $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
