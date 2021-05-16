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
        </div>
    </div>
    @include('admin::years._forms.create')
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
                                <th scope="col">TIPOS DE ENSINO</th>
                                <th scope="col" style="width: 10.0rem">Gerenciar</th>
                                <th scope="col" style="width: 1.0rem">Excluír</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($years as $year)
                                <tr>
                                    <td class="text-truncate text-center">{{$year->code}}</td>
                                    <td class="text-truncate">{{$year->title}}</td>
                                    <td class="text-truncate">
                                        @forelse($year->stages as $stage)
                                            <span>{{$stage->title}}</span><br>
                                        @empty
                                            Nenhum registro relacionado
                                        @endforelse
                                    </td>
                                    <td>
                                        <a href="{{route('admins.stages.index', $year->url)}}"
                                           class="btn btn-sm btn-block btn-secondary">
                                            Tipos de Ensino
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal"
                                           data-target="#{{ 'modal_' . $year->id }}">
                                                <span style="cursor: pointer">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin::years._modals.destroy', ['year' => $year])
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="container d-print-none text-center">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="d-flex justify-content-start">
                                        @if(isset($years))
                                            {!! $years->appends(Request::all())->links() !!}
                                        @else
                                            {!! $years->links() !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




