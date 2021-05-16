@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('admins.admins.index')}}">
                        Painel
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <div class="form-group">
                    <a class="btn btn-secondary btn-sm btn-block" href="{{route('admins.series.index', [$year->url, $stage->url])}}">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h6 class="title line-on-right">Lista das salas: {{$serie->title}} / {{$stage->title}} / {{$year->title}}</h6>
    </div>
{{--    <div class="container">--}}
{{--        <h5 class="with-line left">Importar turmas</h5>--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">--}}
{{--                @include('admin::rooms._forms.import')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <span>OBS.: Caso necessite de um outro nome de sala, utilize o formulário ao lado,
                    o nome da sala deve seguir um padrão, exemplo: 1ºRH, tudo maiúsculo e sem espaço.</span> <br>
                <span class="text-info">
                        Agora vamos criar as salas, selecione abaixo as salas desejadas. Em seguida, clique no botão
                    Editar da tabela abaixo.
                    </span>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="form-group">
                    @include('admin::rooms._forms.create')
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @forelse($rooms as $room)
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 border-bottom p-3">
                    <div class="form-group">
                        <span class="btn btn-sm btn-block btn-default" style="cursor: initial">{{$room->title}}</span>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <a href="{{route('admins.rooms.edit', [$year->url,$stage->url,$serie->url,$room->id])}}"
                                   class="btn btn-sm btn-block btn-warning">
                                    Gerenciar
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <a href="{{route('admins.rooms.students', [$year->url,$stage->url,$serie->url,$room->url])}}"
                                   class="btn btn-sm btn-block btn-info">
                                    Alunos
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                            <div class="form-group">
                                <a class="btn btn-sm btn-block btn-danger" data-toggle="modal"
                                   data-target="#{{ 'modal_room' . $room->id }}">
                                                Excluír
                                </a>
                            </div>
                        </div>
                        @include('admin::rooms._modals.destroy', ['room' => $room])
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
@endsection




