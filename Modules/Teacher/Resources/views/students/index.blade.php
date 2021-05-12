@extends('teacher::layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
                <div class="text-center">ANO</div>
                <p class="border text-center">{{$year->title}}</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="text-center">PROFESSOR</div>
                <p class="border text-center">{{auth()->user()->name}}</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="text-center">DISCIPLINA</div>
                <p class="border text-center">{{$discipline->title}}</p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                <div class="text-center">SÉRIE</div>
                <p class="border text-center">{{$serie->title}}</p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                <div class="text-center">TURMA</div>
                <p class="border text-center">{{$room->title}}</p>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-2 col-xl-2">
                <div class="text-center">BIMESTRE</div>
                <p class="border text-center">{{$period->title}}</p>
            </div>
        </div>
        <div class="row">
            <h5>Lista de alunos do: {{$room->title}} / {{$serie->title}} / {{$stage->title}} /
                {{$year->title}}</h5>
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col" class="text-center" style="width: 30px">Nº</th>
                        <th scope="col">Nome</th>
                        <th scope="col" style="width: 30px">RA</th>
                        <th scope="col" style="width: 10px">DG</th>
                        <th scope="col" class="text-center" style="width: 30px">Nascido</th>
                        <th scope="col" class="text-center" style="width: 30px">Idade</th>
                        <th scope="col">Email</th>
                        <th scope="col" style="width: 120px" class="d-print-none">Status</th>
                        <th scope="col" style="width: 50px" class="d-print-none">Estado</th>
                        <th scope="col" class="text-center d-print-none" style="width: 30px">Adiconado</th>

                    </tr>
                    </thead>
                    <tbody style="font-size: 90% !important;">
                    @foreach($students->sortBy('number') as $student)
                        @if($student->status == 'TRANSFERIDO NÃO OFICIAL' || $student->status == 'TROCA NÃO OFICIAL')
                            <tr class="d-print-none">
                                <td class="text-truncate text-cente text-dangerr">{{$student->number}}</td>
                                <td class="text-truncate text-danger">{{$student->name}}</td>
                                <td class="text-truncate text-danger">{{$student->ra}}</td>
                                <td class="text-truncate text-cente text-danger">{{$student->ra_digit}}</td>
                                <td class="text-truncate text-danger">
                                    {{\Carbon\Carbon::parse($student->date_of_birth)->format('d/m/Y')}}
                                </td>
                                <td class="text-truncate text-center text-danger">
                                    {{\Carbon\Carbon::parse($student->date_of_birth)->diffInYears()}}
                                </td>
                                <td class="text-truncate text-danger">{{$student->email}}</td>
                                <td class="text-truncate text-danger d-print-none">{{$student->status}}</td>
                                <td class="text-truncate text-center text-danger d-print-none">
                                    @if($student->active == 1)
                                        <i class="fas fa-thumbs-up text-success"></i>
                                    @else
                                        <i class="fas fa-thumbs-down text-danger"></i>
                                    @endif
                                </td>
                                <td class="text-truncate text-center text-danger d-print-none">
                                    {{\Carbon\Carbon::parse($student->created_at)->format('d/m/Y')}}
                                </td>
                            </tr>

                        @else
                            <tr>
                                <td class="text-truncate text-center">{{$student->number}}</td>
                                <td class="text-truncate">{{$student->name}}</td>
                                <td class="text-truncate">{{$student->ra}}</td>
                                <td class="text-truncate text-center">{{$student->ra_digit}}</td>
                                <td class="text-truncate">
                                    {{\Carbon\Carbon::parse($student->date_of_birth)->format('d/m/Y')}}
                                </td>
                                <td class="text-truncate text-center">
                                    {{\Carbon\Carbon::parse($student->date_of_birth)->diffInYears()}}
                                </td>
                                <td class="text-truncate">{{$student->email}}</td>
                                <td class="text-truncate d-print-none">{{$student->status}}</td>
                                <td class="text-truncate text-center d-print-none">
                                    @if($student->active == 1)
                                        <i class="fas fa-thumbs-up text-success"></i>
                                    @else
                                        <i class="fas fa-thumbs-down text-danger"></i>
                                    @endif
                                </td>
                                <td class="text-truncate text-center d-print-none">
                                    {{\Carbon\Carbon::parse($student->created_at)->format('d/m/Y')}}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
