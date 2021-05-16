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
    <form action="{{route('teacher.notas.conceito.final.store')}}" method="post">
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
                            <th class="text-center" style="width: 60px">1ºB</th>
                            <th class="text-center" style="width: 60px">Falta</th>
                            <th class="text-center" style="width: 60px">2ºB</th>
                            <th class="text-center" style="width: 60px">Falta</th>
                            <th class="text-center" style="width: 60px">3ºB</th>
                            <th class="text-center" style="width: 60px">Falta</th>
                            <th class="text-center" style="width: 60px">4ºB</th>
                            <th class="text-center" style="width: 60px">Falta</th>
                            <th class="text-center" style="width: 60px">Nota Part.</th>
                            <th class="text-center" style="width: 100px">Motivo</th>
                            <th class="text-center" style="width: 60px">Total Notas</th>
                            <th class="text-center" style="width: 60px">Faltas Comp.</th>
                            <th class="text-center" style="width: 60px">Total Faltas.</th>
                            <th scope="col">Nome</th>

                        </tr>
                        </thead>
                        <tbody style="font-size: 90% !important;">
                        @foreach($studentsNotePrimeiroBimestre->sortBy('number') as $student)
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
                                    <input type="text" style="max-width: 3rem" name="bimestre_one_falta[]"
                                           value="{{old('bimestre_one_falta')}}" tabindex="2">
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="bimestre_two_note[]"
                                           value="{{old('bimestre_two_note')}}" tabindex="3">
                                </td>
                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="bimestre_two_falta[]"
                                           value="{{old('bimestre_two_falta')}}" tabindex="4">
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="bimestre_tree_note[]"
                                           value="{{old('bimestre_tree_note')}}" tabindex="5">
                                </td>
                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="bimestre_tree_falta[]"
                                           value="{{old('bimestre_tree_falta')}}" tabindex="6">
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="bimestre_four_note[]"
                                           value="{{old('bimestre_four_note')}}" tabindex="7">
                                </td>
                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="bimestre_four_falta[]"
                                           value="{{old('bimestre_four_falta')}}" tabindex="8">
                                </td>


                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="note_participation[]"
                                           value="{{old('note_participation')}}" tabindex="9">
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <select name="motivo_note_participation[]" style="max-width: 6rem"
                                            class="form-control form-control-sm" tabindex="10">
                                        <option value="">Selecione</option>
                                        <option value="Participação">1</option>
                                        <option value="Bondade">2</option>
                                        <option value="Amor">3</option>
                                        <option value="Reconhecimento">4</option>
                                    </select>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="total_note[]"
                                           value="{{old('total_note')}}" readonly>
                                </td>

                                <td class="text-truncate text-center" contenteditable="true">
                                    <input type="text" style="max-width: 3rem" name="faltas_compensadas[]"
                                           value="{{old('faltas_compensadas')}}" tabindex="11">
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
