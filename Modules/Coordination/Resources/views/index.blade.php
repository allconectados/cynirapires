@extends('coordination::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <span>
                    Para iniciar os registros de um novo ano letivo, clique no botão GERENCIAR ANO LETIVO ao lado.
                </span>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <div class="form-group">
                    <span>
                        <a href="{{route('coordinations.years.index')}}" class="btn btn-sm btn-default btn-block">
                            Gerenciar ano letivo
                        </a>
                    </span>
                </div>

            </div>
        </div>
    </div>


@endsection
