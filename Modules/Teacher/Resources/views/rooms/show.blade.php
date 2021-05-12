@extends('teacher::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <a href="{{route('modules.teachers.dashboard')}}"
                       class="btn btn-sm btn-block btn-primary">
                        Painel
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <a href="{{route('teachers.rooms.index', [$year->url, $stage->url, $serie->url, $period->url])}}"
                       class="btn btn-sm btn-block btn-secondary">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
                <div class="text-center">ANO</div>
                <p class="text-center bg-secondary text-white">{{$year->title}}</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="text-center">PROFESSOR</div>
                <p class="text-center bg-secondary text-white">{{auth()->user()->name}}</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                <div class="text-center">DISCIPLINA</div>
                <p class="text-center bg-secondary text-white">{{$discipline->title}}</p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2">
                <div class="text-center">SÉRIE</div>
                <p class="text-center bg-secondary text-white">{{$serie->title}}</p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                <div class="text-center">TURMA</div>
                <p class="text-center bg-secondary text-white">{{$room->title}}</p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2">
                <div class="text-center">BIMESTRE</div>
                <p class="text-center bg-secondary text-white">{{$period->title}}</p>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center" style="width: 20px">Nº</th>
                        <th scope="col">Nome</th>
                        <th class="text-center" style="width: 10px">1ºB</th>
                        <th class="text-center" style="width: 10px">Falta</th>
                        <th class="text-center" style="width: 10px">2ºB</th>
                        <th class="text-center" style="width: 10px">Falta</th>
                        <th class="text-center" style="width: 10px">3ºB</th>
                        <th class="text-center" style="width: 10px">Falta</th>
                        <th class="text-center" style="width: 10px">4ºB</th>
                        <th class="text-center" style="width: 10px">Falta</th>
                        <th class="text-center" style="width: 10px">Total Notas</th>
                        <th class="text-center" style="width: 10px">Nota Part.</th>
                        <th class="text-center" style="width: 20px">Comp. Faltas</th>
                        <th class="text-center" style="width: 20px">Total Faltas</th>

                    </tr>
                    </thead>
                    <tbody style="font-size: 90% !important;">
                    @foreach($students->sortBy('number') as $student)
                        <tr>
                            <td class="text-truncate text-center">
                                <input type="hidden" name="student_number" value="{{$student->number}}">
                                {{$student->number}}
                            </td>
                            <td class="text-truncate">
                                <input type="hidden" name="student_name" value="{{$student->name}}">
                                {{$student->name}}
                            </td>

                            <td class="text-truncate">
                                <input type="text" style="max-width: 2rem" name="bimestre_um_nota" value="{{old('bimestre_um_nota')}}">
                            </td>
                            <td class="text-truncate">
                                <input type="text" style="max-width: 2rem" name="bimestre_um_falta" value="{{old('bimestre_um_falta')}}">
                            </td>

                            <td class="text-truncate">
                                <input type="text" style="max-width: 2rem" name="bimestre_dois_nota" value="{{old('bimestre_dois_nota')}}">
                            </td>
                            <td class="text-truncate">
                                <input type="text" style="max-width: 2rem" name="bimestre_dois_falta" value="{{old('bimestre_dois_falta')}}">
                            </td>

                            <td class="text-truncate">
                                <input type="text" style="max-width: 2rem" name="bimestre_tres_nota" value="{{old('bimestre_tres_nota')}}">
                            </td>
                            <td class="text-truncate">
                                <input type="text" style="max-width: 2rem" name="bimestre_tres_falta" value="{{old('bimestre_tres_falta')}}">
                            </td>

                            <td class="text-truncate">
                                <input type="text" style="max-width: 2rem" name="bimestre_quatro_nota" value="{{old('bimestre_quatro_nota')}}">
                            </td>
                            <td class="text-truncate">
                                <input type="text" style="max-width: 2rem" name="bimestre_quatro_falta" value="{{old('bimestre_quatro_falta')}}">
                            </td>

                            <td class="text-truncate">
                                <input type="text" style="max-width: 3rem" name="bimestre_total" value="{{old('bimestre_total')}}">
                            </td>

                            <td class="text-truncate">
                                <input type="text" style="max-width: 3rem" name="bimestre_total" value="{{old('bimestre_total')}}">
                            </td>

                            <td class="text-truncate">
                                <input type="text" style="max-width: 3rem" name="total_notas" value="{{old('total_notas')}}">
                            </td>

                            <td class="text-truncate">
                                <input type="text" style="max-width: 3rem" name="faltas_compensadas" value="{{old('faltas_compensadas')}}">
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
