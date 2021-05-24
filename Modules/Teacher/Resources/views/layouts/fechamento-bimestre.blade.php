<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Module Coordenação</title>

    {{-- Laravel Mix - CSS File --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-backend.css') }}" rel="stylesheet">
    <link href="{{ asset('css/title.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-controls.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sticky-footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet">

</head>
<body style="margin-bottom: 0px !important;">

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

{{-- Laravel Mix - JS File --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
@stack('scripts')
@include('sweetalert::alert')
<script>
    $('body').show();
    $('.version').text(NProgress.version);
    NProgress.start();

    let interval = setInterval(function () {
        NProgress.inc();
    }, 1000);

    $(window).on('load', function () {
        clearInterval(interval);
        NProgress.done();
    });
    $(window).on('unload', function () {
        NProgress.start();
    });
    window.addEventListener('beforeunload', function (event) {
        NProgress.start();
    });
</script>
</body>
</html>
