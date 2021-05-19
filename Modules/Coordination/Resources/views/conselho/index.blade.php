@extends('coordination::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <a href="{{route('coordinations.conselho.primeiro.bimestre')}}" class="btn btn-info btn-sm btn-block">
                    Conselho Primeiro Bimestre
                </a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <a href="{{route('coordinations.conselho.primeiro.bimestre')}}" class="btn btn-info btn-sm btn-block">
                    Conselho Segundo Bimestre
                </a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <a href="{{route('coordinations.conselho.primeiro.bimestre')}}" class="btn btn-info btn-sm btn-block">
                    Conselho Terceiro Bimestre
                </a>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                <a href="{{route('coordinations.conselho.primeiro.bimestre')}}" class="btn btn-info btn-sm btn-block">
                    Conselho Quarto Bimestre
                </a>
            </div>

        </div>
    </div>
@endsection