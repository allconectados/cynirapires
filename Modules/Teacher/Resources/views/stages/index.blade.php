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
                    <a href="{{route('teachers.years.index', $year->url)}}"
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
                    <div class="col-md-6 offset-md-3">CLIQUE NO TIPO DE ENSINO QUE DESEJA ALTERAR</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse($stages as $stage)
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border-bottom p-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <a href="{{route('teachers.series.index', [$year->url, $stage->url])}}"
                                   class="btn btn-sm btn-block btn-default">
                                    {{$stage->title}}
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
