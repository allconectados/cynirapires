@extends('teacher::layouts.master')

@section('content')
    <h1>EDITAR</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <a href="{{route('modules.teachers.dashboard')}}"
                       class="btn btn-sm btn-block btn-primary">
                        Painel
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="form-group">
                    <a href="{{route('teachers.rooms.index', [$year->url, $stage->url, $serie->url])}}"
                       class="btn btn-sm btn-block btn-secondary">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    @foreach($studentsNote as $studentsNote1)

    @endforeach
    <form action="{{route('teacher.notas.terceiro.bimestre.update', $studentsNote1->id)}}" method="post">
        @csrf
        @method('put')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
                    <input class="form-control form-control-sm" value="{{$year->title}}" readonly>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                    <input class="form-control form-control-sm" value="{{$stage->title}}" readonly>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                    <input class="form-control form-control-sm" value="{{$serie->title}}" readonly>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                    <input class="form-control form-control-sm" value="{{$room->title}}" readonly>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                    <input class="form-control form-control-sm" value="{{$discipline->title}}" readonly>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <input class="form-control form-control-sm" value="{{auth()->user()->name}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover target">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 4rem">Nº</th>
                            <th class="text-center" style="width: 4rem">Nota</th>
                            <th class="text-center" style="width: 4rem">Nota P.</th>
                            <th class="text-center" style="width: 4rem">Total N</th>
                            <th class="text-center" style="width: 4rem">Falta</th>
                            <th class="text-center" style="width: 4rem">Falta C.</th>
                            <th class="text-center" style="width: 4rem">Total F</th>
                            <th>Nome</th>
                        </tr>
                        </thead>
                        <tbody style="font-size: 90% !important;">
                        @foreach($studentsNote->sortBy('number') as $student)
                            <input type="hidden" name="id[]" value="{{$student->id}}">
                            <div class="container-fluid" style="display: none">
                                <div class="row mb-2">
                                    <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
                                        <input name="ano[]" class="form-control form-control-sm"
                                               value="{{$year->title}}" readonly>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                                        <input name="stage[]" class="form-control form-control-sm"
                                               value="{{$stage->title}}" readonly>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                                        <input name="serie[]" class="form-control form-control-sm"
                                               value="{{$serie->title}}" readonly>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-1 col-xl-1">
                                        <input name="room[]" class="form-control form-control-sm"
                                               value="{{$room->title}}" readonly>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                                        <input name="discipline[]" class="form-control form-control-sm"
                                               value="{{$discipline->title}}" readonly>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input name="teacher[]" class="form-control form-control-sm"
                                               value="{{auth()->user()->name}}" readonly>
                                    </div>
                                </div>
                            </div>
                            <tr>
                                <td class="text-truncate text-center">
                                    <input type="hidden" name="number[]" value="{{$student->number}}">
                                    <span>{{$student->number}}</span>
                                </td>
                                <td class="text-truncate text-center" contenteditable="true">
                                    @if($student->nota >= 5)
                                        <input type="number" style="max-width: 4rem" name="nota[]"
                                               class="table-target text-success"
                                               value="{{$student->nota}}">
                                    @elseif($student->nota < 5)
                                        <input type="number" style="max-width: 4rem" name="nota[]"
                                               class="table-target text-danger"
                                               value="{{$student->nota }}">
                                    @else
                                        <input type="number" style="max-width: 4rem" name="nota[]"
                                               class="table-target text-secondary" value=""
                                               step='0.5' min="0.5" max="10">
                                    @endif
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="number" style="max-width: 4rem" name="nota_participation[]"
                                           class="table-target text-secondary"
                                           value="{{$student->nota_participation, old('nota_participation')}}"
                                           tabindex="2" step='0.5' min="0.5" max="10">
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    @if($student->nota_final >= 5)
                                        <input type="number" style="max-width: 4rem" name="nota_final[]"
                                               class="table-target text-success"
                                               value="{{$student->nota_final}}"
                                               readonly>
                                    @elseif($student->nota_final < 5)
                                        <input type="number" style="max-width: 4rem" name="nota_final[]"
                                               class="table-target text-danger"
                                               value="{{$student->nota_final }}"
                                               readonly>
                                    @else
                                        <input type="number" style="max-width: 4rem" name="nota_final[]"
                                               class="table-target text-secondary" value=""
                                               step='0.5' min="0.5" max="10" readonly>
                                    @endif

                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="number" style="max-width: 4rem" name="falta[]"
                                           class="table-target text-secondary"
                                           value="{{$student->falta, old('falta')}}" tabindex="3" step='1'>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="number" style="max-width: 4rem" name="faltas_compensadas[]"
                                           class="table-target text-secondary"
                                           value="{{$student->faltas_compensadas, old('faltas_compensadas')}}"
                                           tabindex="4" step='1'>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    @if($student->falta != null)
                                        <input type="number" style="max-width: 4rem" name="total_de_faltas[]"
                                               class="table-target text-secondary"
                                               value="{{$student->falta - $student->faltas_compensadas}}"
                                               readonly>
                                    @else
                                        <input type="text" style="max-width: 4rem" name="total_de_faltas[]"
                                               class="table-target text-secondary"
                                               value=""
                                               readonly>
                                    @endif
                                </td>

                                <td class="text-truncate">
                                    <input type="hidden" name="name[]" value="{{$student->name}}">
                                    <span class="pl-2">{{$student->name}}</span>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
    </form>
@endsection
@push('scripts')
    <script type="text/javascript">
        document.addEventListener("keydown", function (e) {
            if (e.key === 'Enter') {

                e.preventDefault();

            }
        });
    </script>
@endpush