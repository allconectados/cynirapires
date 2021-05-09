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
                <div class="col-md-8 offset-md-2">Para criar o período desejado selecione a data inicial e a data final
                    do bimestre
                </div>
            </div>
        </div>
    </div>

    @include('admin::periods._forms.create')


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
                                <button type="button" class="btn btn-sm btn-block btn-warning" data-toggle="modal"
                                        data-target="#{{ 'modal_edit' . $period->id }}">
                                    Editar
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg col-xl">
                            <div class="form-group">
                                <a class="btn btn-danger btn-sm btn-block" data-toggle="modal"
                                   data-target="#{{ 'modal_destroy' . $period->id }}">
                                    Excluír
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg col-xl">
                            <div class="form-group">
                                <a href=""
                                   class="btn btn-sm btn-block btn-info">
                                    Planos
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('admin::periods._modals.edit', ['period' => $period])
                @include('admin::periods._modals.destroy', ['period' => $period])
            @empty

            @endforelse
        </div>
    </div>
@endsection




