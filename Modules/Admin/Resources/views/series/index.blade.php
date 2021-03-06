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
                    <a class="btn btn-secondary btn-sm btn-block" href="{{route('admins.stages.index', [$year->url])}}">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="col-md-6 offset-md-3">Para adicionar os estágios desejados, clique nos botões abaixo.</div>
            </div>
        </div>
    </div>

    @include('admin::series._forms.create')


    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <div class="table-responsive table-bordered table-hover">
                        <table class="table table-sm table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 7.0rem">Código</th>
                                <th scope="col">Título</th>
                                <th scope="col">Turmas</th>
                                <th scope="col" style="width: 10.0rem">Gerenciar</th>
                                <th scope="col" style="width: 1.0rem">Excluír</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($series as $serie)
                                <tr>
                                    <td class="text-truncate text-center">{{$serie->code}}</td>
                                    <td class="text-truncate">{{$serie->title}}</td>
                                    <td class="text-truncate">
                                        @forelse($serie->rooms as $room)
                                            <span>{{$room->title}}</span> /
                                        @empty
                                            Nenhum registro relacionado
                                        @endforelse
                                    </td>
                                    <td>
                                        <a href="{{route('admins.rooms.index', [$year->url, $stage->url, $serie->url])}}"
                                           class="btn btn-sm btn-block btn-secondary">
                                            Turmas
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal"
                                           data-target="#{{ 'modal_' . $serie->id }}">
                                                <span style="cursor: pointer">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin::series._modals.destroy', ['serie' => $serie])
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




