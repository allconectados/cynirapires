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
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @include('admin::disciplines._forms.import')
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                @include('admin::disciplines._forms.create')
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
                                <th scope="col">Título</th>
                                <th scope="col" style="width: 1.0rem">Editar</th>
                                <th scope="col" style="width: 1.0rem">Excluír</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td class="text-truncate text-center">{{$item->code}}</td>
                                    <td class="text-truncate">{{$item->title}}</td>
                                    <td class="text-center" style="width: 1.0rem">
                                        <a href="{{route('admins.disciplines.edit', $item->id)}}"
                                           class="btn btn-warning btn-sm">
                                            <i class="fas fa-pen-square"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" data-toggle="modal"
                                           data-target="#{{ 'modal_' . $item->id }}">
                                                <span style="cursor: pointer">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                        </a>
                                    </td>
                                </tr>
                                @include('admin::disciplines._modals.destroy', ['item' => $item])
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="container-fluid">
                            <div class="d-flex">
                                <div class="mx-auto">
                                    @include('admin::partials._index_paginate')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection




