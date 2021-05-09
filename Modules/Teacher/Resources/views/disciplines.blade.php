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
                <a href="{{route('modules.teachers.disciplines.edit', [auth()->user()->email, $discipline->id])}}" class="btn btn-primary btn-sm">{{$discipline->title}}</a>
            @empty

            @endforelse
@endsection
