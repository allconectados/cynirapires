@extends('teacher::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.teachers.dashboard')}}">
                        Painel
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <div class="form-group">
                    <a class="btn btn-secondary btn-sm btn-block"
                       href="{{route('modules.teachers.disciplines.index', auth()->user()->email)}}">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    @forelse($rooms as $room)
        <a href="" class="btn btn-primary btn-sm">{{$discipline->title}} / {{$room->title}}</a>
    @empty

    @endforelse
@endsection
