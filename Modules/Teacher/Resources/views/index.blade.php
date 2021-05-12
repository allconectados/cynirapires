@extends('teacher::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <p>Para iniciar o gereciamento da salas, clique no botão ao lado GERENCIAR ANO LETIVO</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <a href="{{route('teachers.years.index')}}" class="btn btn-sm btn-block btn-default">
                    Gerenciar ano letivo
                </a>
            </div>
        </div>
    </div>

@endsection
