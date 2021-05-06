@extends('teacher::layouts.master')

@section('content')
    <h1>Hello World</h1>

    @forelse($teacher as $item)
        @forelse($item->rooms as $room)
            <span class="btn btn-primary">{{$room->title}}</span>
        @empty

        @endforelse
    @empty

    @endforelse
@endsection
