@extends('teacher::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-group">
                    <a href="{{route('modules.teachers.dashboard')}}"
                       class="btn btn-sm btn-block btn-primary">
                        Painel
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border-bottom p-3 text-center font-weight-bold">
                <div class="form-group">
                    <div class="col-md-6 offset-md-3">CLIQUE NO ANO QUE DESEJA ALTERAR</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse($years as $year)
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 border-bottom p-3">
                    <div class="form-group">
                        <a href="{{route('teachers.stages.index', $year->url)}}"
                           class="btn btn-sm btn-block btn-secondary">{{$year->title}}</a>
                    </div>
                </div>

            @empty

            @endforelse
        </div>
    </div>
@endsection
