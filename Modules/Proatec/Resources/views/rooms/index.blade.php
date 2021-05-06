@extends('proatec::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.proatecs.dashboard')}}">
                        Painel
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @if($years->count() > 0 && $stages->count() > 0)
                    @include('proatec::rooms._forms.create')
                @else
                    <span class="alert alert-warning">Não existe nenhum Tipo de Ensino relacionado!</span>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                    <div class="table-responsive table-bordered table-hover">
                        <table class="table table-sm table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col" style="width: 7.0rem">Código</th>
                                <th scope="col" style="width: 3.0rem">Ano</th>
                                <th scope="col" style="width: 24.0rem">Tipo de Ensino</th>
                                <th scope="col">Título</th>
                                <th scope="col" style="width: 1.0rem">Editar</th>
                                <th scope="col" style="width: 1.0rem">Excluír</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td class="text-truncate text-center">{{$item->code}}</td>
                                    <td class="text-truncate text-center">{{$item->year->title}}</td>
                                    <td class="text-truncate">{{$item->stage->title}}</td>
                                    <td class="text-truncate">{{$item->title}}</td>
                                    <td class="text-center" style="width: 1.0rem">
                                        <a href="{{route('modules.rooms.edit', $item->id)}}"
                                           class="btn btn-warning btn-sm">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                    </td>
                                    <form action="{{route('modules.rooms.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <td class="text-center" style="width: 1.0rem">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="container-fluid">
                            <div class="d-flex">
                                <div class="mx-auto">
                                    @include('proatec::partials._index_paginate')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




