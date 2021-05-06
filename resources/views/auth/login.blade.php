@extends('layouts.login')

@section('content')
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h6 class="font-weight-bold text-danger"> <span>LEIA AS INSTRUÇÕES ANTES DE FAZER LOGIN.</span></h6>
                    <h6 class="font-weight-bold"> <span>CASO VOCÊ SEJA PROFESSOR OU PROFESSORA, UTILIZE SEU EMAIL
                        INSTITUCIONAL.</span></h6>
                    <h6 class="font-weight-bold"> <span>CASO VOCÊ SEJA ESTUDANTE, UTILIZE SEU EMAIL INSTITUCIONAL.</span></h6>
                    <h6 class="font-weight-bold"> <span>CASO VOCÊ SEJA ESTUDANTE E NÃO TENHA A SENHA DO SEU EMAIL
                        INSTITUCIONAL, UTILIZE QUALQUER EMAIL GMAIL.</span></h6>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <a href="{{route('social.login', ['provider' => 'google'])}}"
                               class="btn btn-info btn-block">
                                {{ __('CLIQUE AQUI PARA FAZER LOGIN') }}
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group">
                            <a href="{{url('/')}}"
                               class="btn btn-default btn-block">
                                {{ __('SAIR') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
