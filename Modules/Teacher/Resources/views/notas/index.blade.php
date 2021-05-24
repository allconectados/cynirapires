@extends('teacher::layouts.fechamento-bimestre')

@section('content')
    <table class="table table-sm table-bordered target"
           style="margin-bottom: 0 !important;background-color: #ffffff !important;">
        <thead class="border-0">
        <tr>
            <th class="text-center align-middle text-uppercase"
                style="width: 1.6rem;background-color: #9575CD !important;font-size: 100% !important;">
            </th>
            <th class="text-center align-middle text-uppercase"
                style="width: 18.3rem;background-color: #9575CD !important;font-size: 100% !important;">
                <span class="text-white"> {{$year->title}}</span>
            </th>
            <th class="text-center align-middle text-uppercase"
                style="width: 20.3rem;background-color: #9575CD !important;font-size: 90% !important;">
                <span class="text-white">{{ auth()->user()->name }}</span>
            </th>
            <th class="text-center align-middle text-uppercase"
                style="width: 25.0rem;background-color: #9575CD !important;">
                <span class="text-white"> {{$discipline->title}}</span>
            </th>
            <th class="text-center align-middle text-uppercase" style="background-color: #e57373 !important;">
                <a href="{{route('teachers.rooms.index', [$year->url, $stage->url, $serie->url])}}"
                   class="text-uppercase text-white">
                    Sair
                </a>
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-center align-middle text-uppercase"
                style="background-color: #9575CD !important;font-size: 100% !important;padding-top: 0 !important;padding-bottom: 0 !important;"></td>
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
    @if(isset($dadosBimestres))
        @forelse($dadosBimestres as $dadosBimestre)
        @empty
        @endforelse
        <form action="{{route('teacher.notas.bimestres.update', $dadosBimestre->id ?? '')}}" method="post">
            @endif
            @csrf
            @method('put')
            <div class="table-responsive">
                <table class="table table-bordered table-hover target mb-0 pb-0">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 2rem">Nº</th>
                        <th class="text-center" style="width: 22rem">Estudante</th>
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

                    <tbody style="font-size: 90% !important;">

                    @forelse($dadosBimestres->sortBy('number') as $dadosBimestre)
                        <tr style="height:1rem !important;">
                            <div>
                                <input type="hidden" name="id[]" value="{{$dadosBimestre->id}}">
                                <input type="hidden" name="code[]" value="{{$dadosBimestre->code}}">
                                <input type="hidden" name="ano[]" value="{{$dadosBimestre->ano}}">
                                <input type="hidden" name="stage[]" value="{{$dadosBimestre->stage}}">
                                <input type="hidden" name="serie[]" value="{{$dadosBimestre->serie}}">
                                <input type="hidden" name="room[]" value="{{$dadosBimestre->room}}">
                                <input type="hidden" name="number[]" value="{{$dadosBimestre->number}}">
                                <input type="hidden" name="name[]" value="{{$dadosBimestre->name}}">
                                <input type="hidden" name="discipline[]" value="{{$discipline->title}}">
                                <input type="hidden" name="teacher[]" value="{{auth()->user()->name}}">
                            </div>
                            <td class="text-truncate text-center">{{$dadosBimestre->number}}</td>
                            <td class="text-truncate">
                                <span style="padding-left: 0.5rem !important;">{{$dadosBimestre->name}}</span>
                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_primeiro_bimestre !== 1)
                                    @switch($dadosBimestre->nota_conselho_primeiro_bimestre)
                                        @case($dadosBimestre->nota_conselho_primeiro_bimestre >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_primeiro_bimestre[]"
                                               class="table-target text-success" tabindex="1" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_primeiro_bimestre,old('nota_conselho_primeiro_bimestre')}}">
                                        @break

                                        @case($dadosBimestre->nota_conselho_primeiro_bimestre < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_primeiro_bimestre[]"
                                               class="table-target text-danger" tabindex="1" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_primeiro_bimestre,old('nota_conselho_primeiro_bimestre')}}">
                                        @break

                                        @default
                                    @endswitch
                                @else
                                    @switch($dadosBimestre->nota_conselho_primeiro_bimestre)
                                        @case($dadosBimestre->nota_conselho_primeiro_bimestre >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_primeiro_bimestre[]"
                                               class="table-target text-success" tabindex="1" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_primeiro_bimestre,old('nota_conselho_primeiro_bimestre')}}"
                                               readonly>
                                        @break

                                        @case($dadosBimestre->nota_conselho_primeiro_bimestre < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_primeiro_bimestre[]"
                                               class="table-target text-danger" tabindex="1" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_primeiro_bimestre,old('nota_conselho_primeiro_bimestre')}}"
                                               readonly>
                                        @break

                                        @default
                                    @endswitch
                                @endif
                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_segundo_bimestre !== 1)
                                    @switch($dadosBimestre->nota_conselho_segundo_bimestre)
                                        @case($dadosBimestre->nota_conselho_segundo_bimestre >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_segundo_bimestre[]"
                                               class="table-target text-success" tabindex="2" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_segundo_bimestre,old('nota_conselho_segundo_bimestre')}}">
                                        @break

                                        @case($dadosBimestre->nota_conselho_segundo_bimestre < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_segundo_bimestre[]"
                                               class="table-target text-danger" tabindex="2" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_segundo_bimestre,old('nota_conselho_segundo_bimestre')}}">
                                        @break

                                        @default
                                    @endswitch
                                @else
                                    @switch($dadosBimestre->nota_conselho_segundo_bimestre)
                                        @case($dadosBimestre->nota_conselho_segundo_bimestre >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_segundo_bimestre[]"
                                               class="table-target text-success" tabindex="2" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_segundo_bimestre,old('nota_conselho_segundo_bimestre')}}"
                                               readonly>
                                        @break

                                        @case($dadosBimestre->nota_conselho_segundo_bimestre < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_segundo_bimestre[]"
                                               class="table-target text-danger" tabindex="2" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_segundo_bimestre,old('nota_conselho_segundo_bimestre')}}"
                                               readonly>
                                        @break

                                        @default
                                    @endswitch
                                @endif
                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_terceiro_bimestre !== 1)
                                    @switch($dadosBimestre->nota_conselho_terceiro_bimestre)
                                        @case($dadosBimestre->nota_conselho_terceiro_bimestre >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_terceiro_bimestre[]"
                                               class="table-target text-success" tabindex="3" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_terceiro_bimestre,old('nota_conselho_terceiro_bimestre')}}">
                                        @break

                                        @case($dadosBimestre->nota_conselho_terceiro_bimestre < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_terceiro_bimestre[]"
                                               class="table-target text-danger" tabindex="3" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_terceiro_bimestre,old('nota_conselho_terceiro_bimestre')}}">
                                        @break

                                        @default
                                    @endswitch
                                @else
                                    @switch($dadosBimestre->nota_conselho_terceiro_bimestre)
                                        @case($dadosBimestre->nota_conselho_terceiro_bimestre >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_terceiro_bimestre[]"
                                               class="table-target text-success" tabindex="3" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_terceiro_bimestre,old('nota_conselho_terceiro_bimestre')}}"
                                               readonly>
                                        @break

                                        @case($dadosBimestre->nota_conselho_terceiro_bimestre < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_terceiro_bimestre[]"
                                               class="table-target text-danger" tabindex="3" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_terceiro_bimestre,old('nota_conselho_terceiro_bimestre')}}"
                                               readonly>
                                        @break

                                        @default
                                    @endswitch
                                @endif
                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_quarto_bimestre !== 1)
                                    @switch($dadosBimestre->nota_conselho_quarto_bimestre)
                                        @case($dadosBimestre->nota_conselho_quarto_bimestre >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_quarto_bimestre[]"
                                               class="table-target text-success" tabindex="4" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_quarto_bimestre,old('nota_conselho_quarto_bimestre')}}">
                                        @break

                                        @case($dadosBimestre->nota_conselho_quarto_bimestre < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_quarto_bimestre[]"
                                               class="table-target text-danger" tabindex="4" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_quarto_bimestre,old('nota_conselho_quarto_bimestre')}}">
                                        @break

                                        @default
                                    @endswitch
                                @else
                                    @switch($dadosBimestre->nota_conselho_quarto_bimestre)
                                        @case($dadosBimestre->nota_conselho_quarto_bimestre >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_quarto_bimestre[]"
                                               class="table-target text-success" tabindex="4" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_quarto_bimestre,old('nota_conselho_quarto_bimestre')}}"
                                               readonly>
                                        @break

                                        @case($dadosBimestre->nota_conselho_quarto_bimestre < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_quarto_bimestre[]"
                                               class="table-target text-danger" tabindex="4" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_quarto_bimestre,old('nota_conselho_quarto_bimestre')}}"
                                               readonly>
                                        @break

                                        @default
                                    @endswitch
                                @endif

                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_quinto_conceito !== 1)
                                    @switch($dadosBimestre->nota_conselho_quinto_conceito)
                                        @case($dadosBimestre->nota_conselho_quinto_conceito >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_quinto_conceito[]"
                                               class="table-target text-success" tabindex="5" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_quinto_conceito,old('nota_conselho_quinto_conceito')}}">
                                        @break

                                        @case($dadosBimestre->nota_conselho_quinto_conceito < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_quinto_conceito[]"
                                               class="table-target text-danger" tabindex="5" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_quinto_conceito,old('nota_conselho_quinto_conceito')}}">
                                        @break

                                        @default
                                    @endswitch
                                @else
                                    @switch($dadosBimestre->nota_conselho_quinto_conceito)
                                        @case($dadosBimestre->nota_conselho_quinto_conceito >= 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_quinto_conceito[]"
                                               class="table-target text-success" tabindex="5" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_quinto_conceito,old('nota_conselho_quinto_conceito')}}"
                                               readonly>
                                        @break

                                        @case($dadosBimestre->nota_conselho_quinto_conceito < 5)
                                        <input type="number" style="width: 4.0rem"
                                               name="nota_conselho_quinto_conceito[]"
                                               class="table-target text-danger" tabindex="5" step='1'
                                               min="0" max="10"
                                               value="{{$dadosBimestre->nota_conselho_quinto_conceito,old('nota_conselho_quinto_conceito')}}"
                                               readonly>
                                        @break

                                        @default
                                    @endswitch
                                @endif
                            </td>

                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_primeiro_bimestre !== 1)
                                    <input type="number" style="width: 4.0rem" tabindex="6" step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_primeiro_bimestre[]"
                                           class="table-target text-secondary"
                                           value="{{$dadosBimestre->faltas_conselho_primeiro_bimestre,
                                                       old('faltas_conselho_primeiro_bimestre')}}">
                                @else
                                    <input type="number" style="width: 4.0rem" tabindex="6" step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_primeiro_bimestre[]"
                                           class="table-target text-secondary"
                                           value="{{$dadosBimestre->faltas_conselho_primeiro_bimestre,
                                                       old('faltas_conselho_primeiro_bimestre')}}" readonly>
                                @endif
                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_segundo_bimestre !== 1)
                                    <input type="number" style="width: 4.0rem" tabindex="7" step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_segundo_bimestre[]"
                                           class="table-target text-secondary"
                                           value="{{$dadosBimestre->faltas_conselho_segundo_bimestre,old('faltas_conselho_segundo_bimestre')}}">
                                @else
                                    <input type="number" style="width: 4.0rem" tabindex="7" step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_segundo_bimestre[]"
                                           class="table-target text-secondary"
                                           value="{{$dadosBimestre->faltas_conselho_segundo_bimestre,old('faltas_conselho_segundo_bimestre')}}"
                                           readonly>
                                @endif
                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_terceiro_bimestre !== 1)
                                    <input type="number" style="width: 4.0rem" tabindex="8" step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_terceiro_bimestre[]"
                                           class="table-target text-secondary"
                                           value="{{$dadosBimestre->faltas_conselho_terceiro_bimestre,old('faltas_conselho_terceiro_bimestre')}}">
                                @else
                                    <input type="number" style="width: 4.0rem" tabindex="8" step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_terceiro_bimestre[]"
                                           class="table-target text-secondary"
                                           value="{{$dadosBimestre->faltas_conselho_terceiro_bimestre,old('faltas_conselho_terceiro_bimestre')}}"
                                           readonly>
                                @endif
                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_quarto_bimestre !== 1)
                                    <input type="number" style="width: 4.0rem" tabindex="9" step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_quarto_bimestre[]"
                                           class="table-target text-secondary"
                                           value="{{$dadosBimestre->faltas_conselho_quarto_bimestre,old('faltas_conselho_quarto_bimestre')}}"
                                    >
                                @else
                                    <input type="number" style="width: 4.0rem" tabindex="9" step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_quarto_bimestre[]"
                                           class="table-target text-secondary"
                                           value="{{$dadosBimestre->faltas_conselho_quarto_bimestre,old('faltas_conselho_quarto_bimestre')}}"
                                           readonly>
                                @endif
                            </td>
                            <td class="text-truncate text-center">
                                <input type="number" style="width: 4.0rem" tabindex="10" step='1'
                                       min="0" max="1000"
                                       name="faltas_conselho_total_bimestres[]"
                                       class="table-target text-danger"
                                       value="{{$dadosBimestre->faltas_conselho_total_bimestres,old('faltas_conselho_total_bimestres')}}"
                                       readonly>

                            </td>
                            <td class="text-truncate text-center" contenteditable="true">
                                @if($statusBimestres->status_primeiro_bimestre !== 1
                                && $statusBimestres->status_segundo_bimestre !== 1
                                && $statusBimestres->status_terceiro_bimestre !== 1 && $statusBimestres->status_quarto_bimestre !== 1)
                                    <input type="number" style="width: 4.0rem" tabindex="11"
                                           step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_compensadas[]"
                                           class="table-target text-success"
                                           value="{{$dadosBimestre->faltas_conselho_compensadas,old('faltas_conselho_compensadas')}}">
                                @else
                                    <input type="number" style="width: 4.0rem" tabindex="11"
                                           step='1'
                                           min="0" max="1000"
                                           name="faltas_conselho_compensadas[]"
                                           class="table-target text-success"
                                           value="{{$dadosBimestre->faltas_conselho_compensadas,old('faltas_conselho_compensadas')}}"
                                           readonly>
                                @endif
                            </td>
                            <td class="text-truncate text-center">
                                @switch($dadosBimestre->faltas_conselho_total)
                                    @case($dadosBimestre->faltas_conselho_total !== 0)
                                    <input type="text" name="faltas_conselho_total[]"
                                           class="table-target text-danger"
                                           value="{{$dadosBimestre->faltas_conselho_total,old('faltas_conselho_total')}}"
                                           readonly>
                                    @break

                                    @case($dadosBimestre->faltas_conselho_total === 0)
                                    <input type="text" name="faltas_conselho_total[]"
                                           class="table-target text-secondary"
                                           value="{{old('faltas_conselho_total')}}" readonly>
                                    @break

                                    @case($dadosBimestre->faltas_conselho_total === null)
                                    <input type="text" name="faltas_conselho_total[]"
                                           class="table-target text-secondary"
                                           value="{{old('faltas_conselho_total')}}" readonly>
                                    @break

                                    @default
                                @endswitch
                            </td>
                        </tr>
                    @empty

                    @endforelse
                    </tbody>
                    <tr>
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
                        <td>
                            @if($dadosBimestres->count() > 0)
                                @if($statusBimestres->status_primeiro_bimestre !== 1
                               && $statusBimestres->status_segundo_bimestre !== 1
                               && $statusBimestres->status_terceiro_bimestre !== 1 && $statusBimestres->status_quarto_bimestre !== 1)
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Salvar</button>
                                @else

                                @endif
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </form>
        <br><br><br><br><br>
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
