@extends('proatec::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.administrations.index')}}">
                        Administração
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.coordinations.index')}}">
                        Coordenação
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.proatecs.index')}}">
                        Proatec
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.secretaries.index')}}">
                        Secretaria
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.teachers.index')}}">
                        Professores
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.years.index')}}">
                        Ano
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.stages.index')}}">
                        Tipo de Ensino
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.rooms.index')}}">
                        Turmas
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.disciplines.index')}}">
                        Disciplinas
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
