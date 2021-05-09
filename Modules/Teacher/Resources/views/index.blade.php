@extends('teacher::layouts.master')

@section('content')
    <h1>Hello World</h1>

            <a href="{{route('modules.teachers.disciplines.index', $teacher->email)}}" class="btn btn-primary btn-sm">Disciplinas</a>

@endsection
