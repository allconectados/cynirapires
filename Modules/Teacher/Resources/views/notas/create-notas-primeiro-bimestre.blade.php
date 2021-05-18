@extends('teacher::layouts.master')

@section('content')
    <h1>CRIAR</h1>
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
    <form action="{{route('teacher.notas.primeiro.bimestre.store')}}" method="post">
        @csrf
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
                        @foreach($students->sortBy('number') as $student)
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
                                    <input type="number" style="max-width: 4rem" name="nota[]" class="table-target text-secondary"
                                           value="{{old('nota')}}" tabindex="1" step='0.5' min="0" max="10" required>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="number" style="max-width: 4rem" name="nota_participation[]" class="table-target text-secondary"
                                           value="{{old('nota_participation')}}" tabindex="2" step='0.5' min="0.5" max="10">
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="number" style="max-width: 4rem" name="nota_final[]" class="table-target text-secondary"
                                           value="{{old('nota_final')}}" step='0.5' min="0.5" max="10" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="number" style="max-width: 4rem" name="falta[]" class="table-target text-secondary"
                                           value="{{old('falta')}}" tabindex="3"  step='1' min="0" max="500">
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="number" style="max-width: 4rem" name="faltas_compensadas[]" class="table-target text-secondary"
                                           value="{{old('faltas_compensadas')}}" tabindex="4"  step='1' min="0" max="500">
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="number" style="max-width: 4rem" name="total_de_faltas[]" class="table-target text-secondary"
                                           value="{{old('total_de_faltas')}}" readonly>
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
