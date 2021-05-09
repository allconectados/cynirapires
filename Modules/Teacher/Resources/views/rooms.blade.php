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
        </div>
    </div>
    @forelse($disciplines as $discipline)
        @forelse($discipline->rooms as $room)
            <a href="" class="btn btn-primary btn-sm">{{$room->title}}</a>
        @empty

        @endforelse
    @empty

    @endforelse
@endsection
