<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module Estudantes</title>

    {{-- Laravel Mix - CSS File --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-backend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/title.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-controls.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
                <span class="navbar-brand">
                    E. E. CYNIRA PIRES
                </span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @auth
                    <li class="nav-item">
                        <a class="nav-link">{{ Auth::user()->email }}</a>
                    </li>
                @endauth


            </ul>
        </div>
    </div>
</nav>

<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg col-xl">
            <h5 class="with-line left">{{$titlePage}}</h5>
        </div>
    </div>
    <hr>
</div>
<div class="container">
    {{--EXIBE MENSAGENS DE ERRO--}}
    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </div>
    @endif
    @yield('content')
</div>

<footer class="footer">
    <div class="container">
        <div class="float-right">
            <a class="btn btn-danger btn-sm" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</footer>


{{-- Laravel Mix - JS File --}}
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
@include('sweetalert::alert')
</body>
</html>
