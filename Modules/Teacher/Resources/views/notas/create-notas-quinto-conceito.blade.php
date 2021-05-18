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
    <form action="{{route('teacher.notas.quinto.conceito.store')}}" method="post">
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
                            <th scope="col" class="text-center" style="width: 20px">Nº</th>
                            <th class="text-center" style="width: 2.8rem">1ºB</th>
                            <th class="text-center" style="width: 2.8rem">Faltas</th>
                            <th class="text-center" style="width: 2.8rem">2ºB</th>
                            <th class="text-center" style="width: 2.8rem">Faltas</th>
                            <th class="text-center" style="width: 2.8rem">3ºB</th>
                            <th class="text-center" style="width: 2.8rem">Faltas</th>
                            <th class="text-center" style="width: 2.8rem">4ºB</th>
                            <th class="text-center" style="width: 2.8rem">Faltas</th>
                            <th class="text-center" style="width: 2.8rem">5ºB</th>
                            <th class="text-center" style="width: 2.8rem">Nota P.</th>
                            <th class="text-center" style="width: 2.8rem">Nota</th>
                            <th class="text-center" style="width: 2.8rem">F. C.</th>
                            <th class="text-center" style="width: 2.8rem">Falta</th>
                            <th scope="col">Motivo</th>
                            <th scope="col">Nome</th>

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
                                    <input type="text" style="max-width: 2.8rem" name="nota_primeiro_bimestre[]"
                                           value="{{old('nota_primeiro_bimestre')}}" readonly>
                                </td>
                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="faltas_primeiro_bimestre[]"
                                           value="{{old('faltas_primeiro_bimestre')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="nota_segundo_bimestre[]"
                                           value="{{old('nota_segundo_bimestre')}}" readonly>
                                </td>
                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="faltas_segundo_bimestre[]"
                                           value="{{old('faltas_segundo_bimestre')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="nota_terceiro_bimestre[]"
                                           value="{{old('nota_terceiro_bimestre')}}" readonly>
                                </td>
                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="faltas_terceiro_bimestre[]"
                                           value="{{old('faltas_terceiro_bimestre')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="nota_quarto_bimestre[]"
                                           value="{{old('nota_quarto_bimestre')}}" readonly>
                                </td>
                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="faltas_quarto_bimestre[]"
                                           value="{{old('faltas_quarto_bimestre')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="nota_quinto_conceito[]"
                                           value="{{old('nota_quinto_conceito')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="nota_participation_quinto_conceito[]"
                                           value="{{old('nota_participation_quinto_conceito')}}"readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="nota_final_quinto_conceito[]"
                                           value="{{old('nota_final_quinto_conceito')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="faltas_compensadas_quinto_conceito[]"
                                           value="{{old('faltas_compensadas_quinto_conceito')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 2.8rem" name="total_de_faltas_quinto_conceito[]"
                                           value="{{old('total_de_faltas_quinto_conceito')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <select name="motivo_nota_participation[]" style="max-width: 10rem"
                                            class="form-control form-control-sm" disabled>
                                        <option value="{{old('motivo_nota_participation')}}">{{'Selecione', old('motivo_nota_participation')}}</option>
                                        <option value="Participação">1</option>
                                        <option value="Bondade">2</option>
                                        <option value="Amor">3</option>
                                        <option value="Reconhecimento">4</option>
                                    </select>
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
