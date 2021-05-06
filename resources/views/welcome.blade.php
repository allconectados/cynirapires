<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Cynira</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

</head>
<body>


<div class="container pt-8 mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <span>SEJA BEM-VINDO AO SISTEMA DE INFORMAÇÕES DA<br>ESCOLA ESTADUAL CYNIRA PIRES DOS SANTOS. </span>
        </div>

    </div>
</div>
<div class="container pt-8 mt-5 text-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <img src="{{ asset('images/logo-home.png') }}" style="width: 50%"/>
        </div>
    </div>
</div>
<div class="container pt-8 mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <a href="{{route('login')}}"
               class="btn btn-info btn-block">
                {{ __('Entrar') }}
            </a>
        </div>
    </div>
</div>

@include('sweetalert::alert')
</body>
</html>
