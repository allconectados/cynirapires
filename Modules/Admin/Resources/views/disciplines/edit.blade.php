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
                    <a class="btn btn-secondary btn-sm btn-block" href="{{route('admins.disciplines.index')}}">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @include('admin::disciplines._forms.edit')
    </div>
@endsection



