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
                    <a href="{{route('teachers.series.index', [$year->url, $stage->url])}}"
                       class="btn btn-sm btn-block btn-secondary">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border-bottom p-3 text-center font-weight-bold">
                <div class="form-group">
                    <div class="col-md-6 offset-md-3 text-uppercase">Olá, {{auth()->user()->name}} - CLIQUE NA TURMA E DISCIPLINA</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col" style="width: 6rem">Disciplinas</th>
                        <th scope="col" style="width: 3rem">Turmas</th>
                        <th scope="col" style="width: 6rem">Fechamento</th>
                    </tr>
                    </thead>
                    @forelse($disciplines as $discipline)
                        <tbody>
                        <tr>
                            <td class="text-truncate">{{$discipline->title}}</td>
                            <td class="text-truncate text-center">{{$discipline->room->title}}</td>
                            <td class="text-truncate text-center">
                                <a href="{{route('teacher.notas.bimestres.index',
                                [$year->url, $stage->url, $serie->url, $discipline->room->url, $discipline->url])}}">
                                    Fechamento dos bimestres
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    @empty

                    @endforelse
                </table>
            </div>
{{--            @forelse($disciplines as $discipline)--}}
{{--                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 border-bottom p-3">--}}
{{--                    <div class="form-group">--}}
{{--                        <a href="{{route('teacher.disciplines.notes', [$year->url, $stage->url, $serie->url, $discipline->room->url, $discipline->url])}}"--}}
{{--                           class="btn btn-sm btn-block btn-secondary">--}}
{{--                            {{$discipline->title}} / {{$discipline->room->title}}--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @empty--}}

{{--            @endforelse--}}
        </div>
    </div>
@endsection
