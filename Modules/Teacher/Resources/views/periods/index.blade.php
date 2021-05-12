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
                    <a href="{{route('teachers.series.index', [$year->url, $stage->url, $serie->url])}}"
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
                    <div class="col-md-6 offset-md-3">CLIQUE NO BOTÃO TARGETAS REFERENTE AO BIMESTRE QUE DESEJA ALTERAR</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse($periods as $period)
                <div class="col-sm-12 col-md-12 col-lg col-xl border p-3">
                    <div class="text-center">
                        <span>{{\Carbon\Carbon::parse($period->date_initial)->format('d/m')}} à {{\Carbon\Carbon::parse($period->date_final)->format('d/m')}}</span>
                    </div>
                    <div class="form-group">
                        <span class="btn btn-sm btn-block btn-default" style="cursor: initial">{{$period->title}}</span>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg col-xl">
                            <div class="form-group">
                                <a href="{{route('teachers.rooms.index', [$year->url, $stage->url, $serie->url, $period->url])}}"
                                   class="btn btn-sm btn-block btn-warning">
                                    TARGETAS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
@endsection
