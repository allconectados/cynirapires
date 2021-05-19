@extends('coordination::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <a href="{{route('modules.coordinations.dashboard')}}"
                       class="btn btn-sm btn-block btn-primary">
                        Painel
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <a href="{{route('coordinations.rooms.index', [$year->url, $stage->url, $serie->url])}}"
                       class="btn btn-sm btn-block btn-secondary">
                        Turmas
                    </a>
                </div>
            </div>
        </div>
    </div>
    @if(isset($studentsNote))
        @include('coordination::rooms._filters.filter-student')
    @else
    @endif

    <div class="container-fluid">
        <form
            action="{{route('coordinations.notas.conselho.store', [$year->url, $stage->url, $serie->url, $room->url])}}"
            method="post">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover target">
                            <thead>
                            <tr>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 8rem">{{$year->title}}
                                    /{{$serie->title}}</th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 3rem">{{$room->title}}</th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                <th class="text-center"
                                    style="background-color: transparent !important;width: 2.8rem"></th>
                                @if(isset($selectStudent))
                                    <th style="background-color: transparent !important;">{{$selectStudent}}</th>
                                @else
                                    <th style="background-color: transparent !important;"></th>
                                @endif

                            </tr>
                            <tr>
                                <th scope="col" class="text-center" style="width: 20px">Nº</th>
                                <th class="text-center" style="width: 2.8rem">1ºB</th>
                                <th class="text-center" style="width: 2.8rem">Faltas</th>
                                <th class="text-center" style="width: 2.8rem">2ºB</th>
                                <th class="text-center" style="width: 2.8rem">Faltas</th>
                                <th class="text-center" style="width: 2.8rem">3ºB</th>
                                <th class="text-center" style="width: 2.8rem">Faltas</th>
                                <th class="text-center" style="width: 2.8rem">4ºB</th>
                                <th class="text-center" style="width: 2.8rem">Faltas</th>
                                <th class="text-center" style="width: 2.8rem">5ºB</th>
                                <th class="text-center" style="width: 2.8rem">Nota</th>
                                <th class="text-center" style="width: 2.8rem">Falta</th>
                                <th scope="col">Nome</th>

                            </tr>
                            </thead>
                            <tbody style="font-size: 90% !important;">
                            @foreach($students->sortBy('number') as $student)
                                <div class="container-fluid" style="display: none">
                                    <div class="row mb-2">
                                        <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
                                            <input name="ano[]" class="form-control form-control-sm"
                                                   value="{{$year->title}}" readonly>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                            <input name="stage[]" class="form-control form-control-sm"
                                                   value="{{$stage->title}}" readonly>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                                            <input name="serie[]" class="form-control form-control-sm"
                                                   value="{{$serie->title}}" readonly>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                                            <input name="room[]" class="form-control form-control-sm"
                                                   value="{{$room->title}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td class="text-truncate text-center">
                                        <input type="text" name="number[]" value="{{$student->number}}">
                                        <span>{{$student->number}}</span>
                                    </td>
                                    <td class="text-truncate">
                                        <input type="hidden" name="name[]" value="{{$student->name}}">
                                        <span class="pl-2">{{$student->name}}</span>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
        </form>
    </div>
@endsection
