@extends('coordination::layouts.conselho')

@section('content')

    <div class="container">
        <div class="row">
            <table class="table table-sm table-bordered target"
                   style="margin-bottom: 0 !important;background-color: #ffffff !important;">
                <thead class="border-0">
                <tr>
                    <th class="text-center align-middle text-uppercase"
                        style="width: 17.8rem;background-color: #9575CD !important;font-size: 100% !important;">
                        <span class="text-white"> {{$year->title}}</span>
                    </th>
                    <th class="text-center align-middle text-uppercase"
                        style="width: 20.4rem;background-color: #9575CD !important;font-size: 90% !important;">
                        <span class="text-white">{{ $selectStudent ?? 'SELECIONE UM ESTUDANTE NA LISTA' }}</span>
                    </th>
                    <th style="width: 25.0rem;background-color: #9575CD !important;">
                        <form action="{{route('coordinations.conselho.filter.student', [$year->url,$stage->url,$serie->url,$room->url])}}">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <select id="select_student" name="selectStudent"
                                            class="custom-select custom-select-sm"
                                            onchange="selectFunctionStudent()">
                                        <option value="null">{{ $selectStudent ?? 'SELECIONE UM ESTUDANTE AQUI' }}</option>
                                        @foreach ($listStudentsSelects->sortBy('number') as $listStudentsSelect)
                                            <option value="{{ $listStudentsSelect->name }}">
                                                {{ $listStudentsSelect->number }}
                                                - {{ $listStudentsSelect->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button id="submit_form" class="btn btn-sm btn-block" type="submit"
                                            style="background-color: #9575CD !important;">
                                        <span class="text-white text-uppercase"> buscar</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </th>
                    <th class="text-center align-middle text-uppercase" style="background-color: #e57373 !important;">
                        <a href="{{route('coordinations.rooms.index', [$year->url, $stage->url, $serie->url])}}"
                           class="text-uppercase text-white">
                            Sair
                        </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center align-middle text-uppercase"
                        style="background-color: #9575CD !important;font-size: 100% !important;padding-top: 0 !important;padding-bottom: 0 !important;">
                        <span class="text-white pr-5"> {{$serie->title}}</span>
                        <span class="text-white pl-5"> {{$room->title}}</span>
                    </td>
                    <td class=" text-center align-middle text-uppercase"
                        style="background-color: #9575CD !important;padding-top: 0 !important;padding-bottom: 0 !important;">
                        <span class="text-white"> NOTAS</span>
                    </td>
                    <td class=" text-center align-middle text-uppercase"
                        style="background-color: #9575CD !important;padding-top: 0 !important;padding-bottom: 0 !important;">
                        <span class="text-white"> FALTAS</span>
                    </td>

                    <td class=" text-center align-middle text-uppercase"
                        style="background-color: #9575CD !important;padding-top: 0 !important;padding-bottom: 0 !important;">

                    </td>
                </tr>
                </tbody>
            </table>
            @if(isset($notasConselhos))
                @foreach($notasConselhos as $notasConselho)

                @endforeach
            @endif
            <form name="form" action="{{route('coordinations.conselho.update', $notasConselho->id ?? '')}}"
                  method="post">
                @csrf
                @method('put')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover target mb-0 pb-0">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 22rem">Disciplina</th>
                            <th class="text-center" style="width: 4.0rem">1ºB</th>
                            <th class="text-center" style="width: 4.0rem">2ºB</th>
                            <th class="text-center" style="width: 4.0rem">3ºB</th>
                            <th class="text-center" style="width: 4.0rem">4ºB</th>
                            <th class="text-center" style="width: 4.0rem">5º C.</th>

                            <th class="text-center" style="width: 4.0rem">1ºB</th>
                            <th class="text-center" style="width: 4.0rem">2ºB</th>
                            <th class="text-center" style="width: 4.0rem">3ºB</th>
                            <th class="text-center" style="width: 4.0rem">4ºB</th>
                            <th class="text-center" style="width: 4.5rem">T. F. B.</th>
                            <th class="text-center" style="width: 4.5rem">Faltas C.</th>
                            <th class="text-center" style="width: 4.5rem">T. F.</th>

                        </tr>
                        </thead>
                        @forelse($disciplines as $discipline)
                            <tbody style="font-size: 120% !important;">
                            <tr>
                                <td class="text-truncate">
                                    <span style="padding-left: 0.5rem !important;">{{$discipline->title}}</span>
                                </td>
                                @if(isset($notasConselhos) && $notasConselhos->count() > 0)
                                    @foreach($notasConselhos as $notasConselho)
                                        @if($notasConselho->discipline === $discipline->title)
                                            <div>
                                                <input type="hidden" name="id[]" value="{{$notasConselho->id}}">
                                                <input type="hidden" name="code[]" value="{{$notasConselho->code}}">
                                                <input type="hidden" name="ano[]" value="{{$notasConselho->ano}}">
                                                <input type="hidden" name="stage[]" value="{{$notasConselho->stage}}">
                                                <input type="hidden" name="serie[]" value="{{$notasConselho->serie}}">
                                                <input type="hidden" name="room[]" value="{{$notasConselho->room}}">
                                                <input type="hidden" name="discipline[]"
                                                       value="{{$notasConselho->discipline}}">
                                                <input type="hidden" name="number[]" value="{{$notasConselho->number}}">
                                                <input type="hidden" name="name[]" value="{{$notasConselho->name}}">
                                            </div>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                @switch($notasConselho->nota_conselho_primeiro_bimestre)
                                                    @case($notasConselho->nota_conselho_primeiro_bimestre >= 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_primeiro_bimestre[]"
                                                           class="table-target text-success" tabindex="1" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_primeiro_bimestre,old('nota_conselho_primeiro_bimestre')}}">
                                                    @break

                                                    @case($notasConselho->nota_conselho_primeiro_bimestre < 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_primeiro_bimestre[]"
                                                           class="table-target text-danger" tabindex="1" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_primeiro_bimestre,old('nota_conselho_primeiro_bimestre')}}">
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                @switch($notasConselho->nota_conselho_segundo_bimestre)
                                                    @case($notasConselho->nota_conselho_segundo_bimestre >= 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_segundo_bimestre[]"
                                                           class="table-target text-success" tabindex="2" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_segundo_bimestre,old('nota_conselho_segundo_bimestre')}}">
                                                    @break

                                                    @case($notasConselho->nota_conselho_segundo_bimestre < 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_segundo_bimestre[]"
                                                           class="table-target text-danger" tabindex="2" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_segundo_bimestre,old('nota_conselho_segundo_bimestre')}}">
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                @switch($notasConselho->nota_conselho_terceiro_bimestre)
                                                    @case($notasConselho->nota_conselho_terceiro_bimestre >= 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_terceiro_bimestre[]"
                                                           class="table-target text-success" tabindex="3" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_terceiro_bimestre,old('nota_conselho_terceiro_bimestre')}}">
                                                    @break

                                                    @case($notasConselho->nota_conselho_terceiro_bimestre < 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_terceiro_bimestre[]"
                                                           class="table-target text-danger" tabindex="3" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_terceiro_bimestre,old('nota_conselho_terceiro_bimestre')}}">
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                @switch($notasConselho->nota_conselho_quarto_bimestre)
                                                    @case($notasConselho->nota_conselho_quarto_bimestre >= 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_quarto_bimestre[]"
                                                           class="table-target text-success" tabindex="4" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_quarto_bimestre,old('nota_conselho_quarto_bimestre')}}">
                                                    @break

                                                    @case($notasConselho->nota_conselho_quarto_bimestre < 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_quarto_bimestre[]"
                                                           class="table-target text-danger" tabindex="4" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_quarto_bimestre,old('nota_conselho_quarto_bimestre')}}">
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                @switch($notasConselho->nota_conselho_quinto_conceito)
                                                    @case($notasConselho->nota_conselho_quinto_conceito >= 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_quinto_conceito[]"
                                                           class="table-target text-success" tabindex="5" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_quinto_conceito,old('nota_conselho_quinto_conceito')}}">
                                                    @break

                                                    @case($notasConselho->nota_conselho_quinto_conceito < 5)
                                                    <input type="number" style="width: 4.0rem"
                                                           name="nota_conselho_quinto_conceito[]"
                                                           class="table-target text-danger" tabindex="5" step='1'
                                                           min="0" max="10"
                                                           value="{{$notasConselho->nota_conselho_quinto_conceito,old('nota_conselho_quinto_conceito')}}">
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>

                                            <td class="text-truncate text-center" contenteditable="true">
                                                <input type="number" style="width: 4.0rem" tabindex="6" step='1'
                                                       min="0" max="1000"
                                                       name="faltas_conselho_primeiro_bimestre[]"
                                                       class="table-target text-secondary"
                                                       value="{{$notasConselho->faltas_conselho_primeiro_bimestre,
                                                       old('faltas_conselho_primeiro_bimestre')}}">
                                            </td>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                <input type="number" style="width: 4.0rem" tabindex="7" step='1'
                                                       min="0" max="1000"
                                                       name="faltas_conselho_segundo_bimestre[]"
                                                       class="table-target text-secondary"
                                                       value="{{$notasConselho->faltas_conselho_segundo_bimestre,old('faltas_conselho_segundo_bimestre')}}">
                                            </td>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                <input type="number" style="width: 4.0rem" tabindex="8" step='1'
                                                       min="0" max="1000"
                                                       name="faltas_conselho_terceiro_bimestre[]"
                                                       class="table-target text-secondary"
                                                       value="{{$notasConselho->faltas_conselho_terceiro_bimestre,old('faltas_conselho_terceiro_bimestre')}}">
                                            </td>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                <input type="number" style="width: 4.0rem" tabindex="9" step='1'
                                                       min="0" max="1000"
                                                       name="faltas_conselho_quarto_bimestre[]"
                                                       class="table-target text-secondary"
                                                       value="{{$notasConselho->faltas_conselho_quarto_bimestre,old('faltas_conselho_quarto_bimestre')}}"
                                                >
                                            </td>
                                            <td class="text-truncate text-center">
                                                <input type="number" style="width: 4.0rem" tabindex="10" step='1'
                                                       min="0" max="1000"
                                                       name="faltas_conselho_total_bimestres[]"
                                                       class="table-target text-danger"
                                                       value="{{$notasConselho->faltas_conselho_total_bimestres,old('faltas_conselho_total_bimestres')}}"
                                                       readonly>

                                            </td>
                                            <td class="text-truncate text-center" contenteditable="true">
                                                <input type="number" style="width: 4.0rem" tabindex="11"
                                                       step='1'
                                                       min="0" max="1000"
                                                       name="faltas_conselho_compensadas[]"
                                                       class="table-target text-success"
                                                       value="{{$notasConselho->faltas_conselho_compensadas,old('faltas_conselho_compensadas')}}">
                                            </td>
                                            <td class="text-truncate text-center">
                                                @switch($notasConselho->faltas_conselho_total)
                                                    @case($notasConselho->faltas_conselho_total !== 0)
                                                    <input type="text" name="faltas_conselho_total[]"
                                                           class="table-target text-danger"
                                                           value="{{$notasConselho->faltas_conselho_total,old('faltas_conselho_total')}}"
                                                           readonly>
                                                    @break

                                                    @case($notasConselho->faltas_conselho_total === 0)
                                                    <input type="text" name="faltas_conselho_total[]"
                                                           class="table-target text-secondary"
                                                           value="{{old('faltas_conselho_total')}}" readonly>
                                                    @break

                                                    @case($notasConselho->faltas_conselho_total === null)
                                                    <input type="text" name="faltas_conselho_total[]"
                                                           class="table-target text-secondary"
                                                           value="{{old('faltas_conselho_total')}}" readonly>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                        @endif
                                    @endforeach
                                @else

                                @endif
                            </tr>
                            </tbody>

                        @empty

                        @endforelse
                        <tr>
                            <td> <span class="text-secondary text-uppercase font-weight-bold">
                                    {{ $selectStudent ?? ' SELECIONE UM ESTUDANTE NA LISTA ' }}
                                </span>
                            </td>
                            <td>
                                @if(isset($notasConselhos))
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Salvar
                                    </button>
                                @else

                                @endif
                            </td>
                            <td>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            @if(isset($faltasConselhoStudents))
                                <td>
                                    <input type="text" style="width: 4.0rem" class="table-target text-secondary"
                                           value="{{$faltasConselhoStudents->total_falta_primeiro_bimestre}}"
                                           readonly>
                                </td>
                                <td>
                                    <input type="text" style="width: 4.0rem" class="table-target text-secondary"
                                           value="{{$faltasConselhoStudents->total_falta_segundo_bimestre}}"
                                           readonly>
                                </td>
                                <td>
                                    <input type="text" style="width: 4.0rem" class="table-target text-secondary"
                                           value="{{$faltasConselhoStudents->total_falta_terceiro_bimestre}}"
                                           readonly>
                                </td>
                                <td>
                                    <input type="text" style="width: 4.0rem" class="table-target text-secondary"
                                           value="{{$faltasConselhoStudents->total_falta_quarto_bimestre}}"
                                           readonly>
                                </td>
                                <td>
                                    <input type="text" style="width: 4.0rem" class="table-target text-secondary"
                                           value="{{$faltasConselhoStudents->total_falta_bimestres}}"
                                           readonly>
                                </td>
                                <td>
                                    <input type="text" style="width: 4.0rem" class="table-target text-secondary"
                                           value="{{$faltasConselhoStudents->total_falta_compensadas_ano}}"
                                           readonly>
                                </td>
                                <td>
                                    <input type="text" style="width: 4.0rem" class="table-target text-secondary"
                                           value="{{$faltasConselhoStudents->total_falta_ano}}"
                                           readonly>

                                </td>
                            @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>


                    </table>
                </div>
            </form>

        </div>
        @if(isset($statusBimestres))
            <div class="row">
                <table class="table table-bordered table-sm table-hover">
                    <form action="{{route('coordinations.conselho.status.bimestres', $statusBimestres->id)}}"
                          method="POST">
                        @csrf
                        @method('PUT')
                        <thead>
                        <tr>
                            <th style="width: 14% !important;" class="border-right-0 align-middle text-uppercase align-content-end">
                                Bloquear
                            </th>
                            <th style="width: 14% !important;" class="border-left-0 align-middle text-uppercase">
                                bimestres
                            </th>
                            <th style="width: 14% !important;">
                                @if($statusBimestres->status_primeiro_bimestre == 1)
                                    <select name="status_primeiro_bimestre" id="status_bimestres"
                                            class="form-control form-control-sm text-danger"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_primeiro_bimestre}}">1ºB Bloqueado
                                        </option>
                                        <option class="text-success" value="0">1ºB Desbloqueado</option>

                                    </select>
                                @else
                                    <select name="status_primeiro_bimestre" id="status_bimestres"
                                            class="form-control form-control-sm text-success"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_primeiro_bimestre}}">1ºB Desbloqueado
                                        </option>
                                        <option class="text-danger" value="1">1ºB Bloqueado</option>
                                    </select>
                                @endif


                            </th>
                            <th style="width: 14% !important;">
                                @if($statusBimestres->status_segundo_bimestre == 1)
                                    <select name="status_segundo_bimestre" id="status_bimestres"
                                            class="form-control form-control-sm text-danger"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_segundo_bimestre}}">2ºB Bloqueado</option>
                                        <option class="text-success" value="0">2ºB Desbloqueado</option>

                                    </select>
                                @else
                                    <select name="status_segundo_bimestre" id="status_bimestres"
                                            class="form-control form-control-sm text-success"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_segundo_bimestre}}">2ºB Desbloqueado
                                        </option>
                                        <option class="text-danger" value="1">2ºB Bloqueado</option>
                                    </select>
                                @endif


                            </th>
                            <th style="width: 14% !important;">
                                @if($statusBimestres->status_terceiro_bimestre == 1)
                                    <select name="status_terceiro_bimestre" id="status_bimestres"
                                            class="form-control form-control-sm text-danger"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_terceiro_bimestre}}">31ºB Bloqueado
                                        </option>
                                        <option class="text-success" value="0">3ºB Desbloqueado</option>

                                    </select>
                                @else
                                    <select name="status_terceiro_bimestre" id="status_bimestres"
                                            class="form-control form-control-sm text-success"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_terceiro_bimestre}}">3ºB Desbloqueado
                                        </option>
                                        <option class="text-danger" value="1">3ºB Bloqueado</option>
                                    </select>
                                @endif


                            </th>
                            <th style="width: 14% !important;">
                                @if($statusBimestres->status_quarto_bimestre == 1)
                                    <select name="status_quarto_bimestre" id="status_bimestres"
                                            class="form-control form-control-sm text-danger"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_quarto_bimestre}}">4ºB Bloqueado</option>
                                        <option class="text-success" value="0">4ºB Desbloqueado</option>

                                    </select>
                                @else
                                    <select name="status_quarto_bimestre" id="status_bimestres"
                                            class="form-control form-control-sm text-success"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_quarto_bimestre}}">4ºB Desbloqueado
                                        </option>
                                        <option class="text-danger" value="1">4ºB Bloqueado</option>
                                    </select>
                                @endif


                            </th>
                            <th style="width: 14% !important;">
                                @if($statusBimestres->status_quinto_conceito == 1)
                                    <select name="status_quinto_conceito" id="status_bimestres"
                                            class="form-control form-control-sm text-danger"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_quinto_conceito}}">5ºC Bloqueado</option>
                                        <option class="text-success" value="0">5ºC Desbloqueado</option>

                                    </select>
                                @else
                                    <select name="status_quinto_conceito" id="status_bimestres"
                                            class="form-control form-control-sm text-success"
                                            onchange='this.form.submit()'
                                            style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                        <option value="{{$statusBimestres->status_quinto_conceito}}">5ºC Desbloqueado
                                        </option>
                                        <option class="text-danger" value="1">5ºC Bloqueado</option>
                                    </select>
                                @endif


                            </th>

                        </tr>
                        </thead>

                    </form>
                </table>
            </div>
        @else

        @endif
    </div>


@endsection

@push('scripts')
    <script>
        document.querySelector('.formStatus').addEventListener('change', function () {
            this.form.submit();
        });

    </script>
    <script type="text/javascript">
        document.addEventListener("keydown", function (e) {
            if (e.key === 'Enter') {

                e.preventDefault();

            }
        });
    </script>
    <script>
        // Retorna o select submit_form disable
        document.getElementById("submit_form").disabled = true;

        // Função onchange
        function selectFunctionStudent() {
            // Retorna o valor do select select_room
            let student = document.getElementById("select_student").value;
            // Verifica se o valor do select_room é diferente de null
            if (student != null) {
                // Se o valor for diferente de null,
                // Retorna o select submit_form enable
                document.getElementById("submit_form").disabled = false;
            }
        }

    </script>

@endpush
