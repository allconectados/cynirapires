<div class="container">
    <h6 class="card-title text-center text-uppercase">Editar sala - {{$room->title}}</h6>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="label-custom">Disciplinas e professores / {{ $disciplines->count() }}</h6>
                        <div class="form-group">
                            <form action="{{route('coordinations.disciplines.import')}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="year_id" value="{{$year->id}}">
                                <input type="hidden" name="stage_id" value="{{$stage->id}}">
                                <input type="hidden" name="serie_id" value="{{$serie->id}}">
                                <input type="hidden" name="room_id" value="{{$room->id}}">
                                <table class="table">
                                    <tr>
                                        <td><label>Importar</label></td>
                                        <td>
                                            <input id="arquivoDiscipline" type="file" name="select_file_discipline"
                                                   required>
                                        </td>
                                        <td>
                                            <input id="submitDiscipline" type="submit" name="uploadDiscipline"
                                                   class="btn btn-success btn-sm" value="Upload">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-sm btn-block btn-info" data-toggle="modal"
                        data-target="#{{ 'modal_discipline' . $room->id }}">
                    Visualizar Lista
                </button>
                @include('coordination::rooms._modals.disciplines', ['item' => $room])
                <table class="table table-sm table-bordered table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Disciplina</th>
                        <th scope="col">Professor</th>
                        <th scope="col" style="width: 30px">Início</th>
                        <th scope="col" style="width: 30px">Excluír</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($disciplines->sortBy('title') as $discipline)
                        @if ($room->id === $discipline->room_id)
                            <tr>
                                <td> {{$discipline->title}} </td>
                                <form name="form"
                                      action="{{route('coordinations.disciplines.update', $discipline->id)}}"
                                      method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td>
                                        @if ($discipline->teacher != null)
                                            <select name="teacher"
                                                    class="form-control form-control-sm text-success"
                                                    onchange='this.form.submit()'
                                                    style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                                <option value="{{$discipline->teacher}}">{{$discipline->teacher}}</option>
                                                <option name="teacher" value="" class="text-danger">Selecione</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->name}}"
                                                            class="text-secondary">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                        @else
                                            <select name="teacher"
                                                    class="form-control form-control-sm"
                                                    onchange='this.form.submit()'
                                                    style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                                <option value="">Selecione</option>
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->name}}"
                                                            class="text-secondary">{{$teacher->name}}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </td>

                                </form>

                                <td class="text-center">
                                    @if ($discipline->teacher != null)
                                        <span class="text-secondary">
                                        {{\Carbon\Carbon::parse($discipline->updated_at)->format('d/m')}}
                                                                                    </span>
                                    @else
                                        <span class="text-danger"></span>

                                    @endif
                                </td>
                                <td class="text-truncate text-center">
                                    <form
                                            action="{{route('coordinations.disciplines.destroy', $discipline->id) }}"
                                            method="POST"
                                            class="form_destroy">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-block btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @else

                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--        ESTUDANTES--}}

        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h6 class="label-custom">Estudantes / {{ $students->count() }}</h6>
                        <div class="form-group pt-3">
                            <form action="{{route('coordinations.students.createTableConselho')}}" method="POST">
                                @csrf
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        @if($disciplines->count() > 0)
                                            <button type="submit"
                                                    class="btn btn-primary btn-block btn-sm marcar text-uppercase">
                                                Criar Tabela do conselho
                                            </button>
                                        @else
                                            <button type="submit"
                                                    class="btn btn-primary btn-block btn-sm marcar text-uppercase"
                                                    disabled>
                                                Criar Tabela do conselho
                                            </button>
                                        @endif
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <span class="btn btn-sm btn-block btn-info">Estudantes</span>
                                </div>
                                <table class="table table-sm table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px" class="text-center">
                                            @if($studentTableNotaConselho->count() > 0)

                                            @else
                                                <label class="control control--checkbox">
                                                    <input type="checkbox" id="ckAllStudent"/>
                                                    <span class="control__indicator chkStudent"></span>
                                                </label>
                                            @endif
                                        </th>
                                        <th>Selecione o checkbox ao lado para criar a tabela do conselho</th>
                                    </tr>
                                    </thead>
                                    <tbody style="display: none">
                                    @forelse($students as $student)
                                        @foreach($disciplines as $discipline)
                                            <tr>
                                                <td class="text-center">
                                                    <label class="control control--checkbox">
                                                        <input name="name[]" value="{{$student->name}}"
                                                               type="checkbox"
                                                               class="chkStudent"/>
                                                        <span class="control__indicator chkStudent"></span>
                                                    </label>
                                                </td>
                                                <td class="text-truncate">
                                                    <input type="hidden" name="ano[]" value="{{$year->title}}">
                                                </td>
                                                <td class="text-truncate">
                                                    <input type="hidden" name="stage[]" value="{{$stage->title}}">
                                                </td>
                                                <td class="text-truncate">
                                                    <input type="hidden" name="serie[]" value="{{$serie->title}}">
                                                </td>
                                                <td class="text-truncate">
                                                    <input type="hidden" name="room[]" value="{{$room->title}}">
                                                </td>
                                                <td class="text-truncate">
                                                    <input type="hidden" name="number[]"
                                                           value="{{$student->number}}">
                                                </td>
                                                <td class="text-truncate">
                                                    <input type="hidden" name="discipline[]"
                                                           value="{{$discipline->title}}">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @empty

                                    @endforelse
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <table class="table table-bordered table-sm table-hover">
                                <thead>
                                <tr>
                                    <th scope="col" style="width: 2rem">Nº</th>
                                    <th scope="col">Nome</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($studentTableNotaConselho->sortBy('number') as $studentTableNota)
                                    <tr>
                                        <td class="text-center">{{$studentTableNota->number}}</td>
                                        <td>{{$studentTableNota->name}}</td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#ckAllStudent").click(function () {  // minha chkStudent que marcará as outras
                if ($("#ckAllStudent").prop("checked"))   // se ela estiver marcada...
                    $(".chkStudent").prop("checked", true);  // as que estiverem nessa classe ".chkStudent" tambem serão marcadas
                else $(".chkStudent").prop("checked", false);   // se não, elas tambem serão desmarcadas
            });
        });
    </script>
    <script>
        document.getElementById("submitDiscipline").disabled = true;
        let validoDiscipline = /(\.xlsx)$/i;

        $("#arquivoDiscipline").change(function () {

            let fileInput = $(this);

// Verifica o nome do arquivoDiscipline
            let nome = fileInput.get(0).files["0"].name;

// Retorna o nome da sala com a extensão .xlsx para verificar se é igual ao nome do arquivoDiscipline
            let filename = "{{$room->title}}.xlsx";

// Verifica a extensão do arquivoDiscipline é .xlsx
            if (validoDiscipline.test(nome)) {
                document.getElementById("submitDiscipline").disabled = false;
            } else {
                document.getElementById("submitDiscipline").disabled = true;
                return swal("Oops!", "A extensão do arquivo deve ser .xlsx!!", "error");
            }

// Verifica se o nome do arquivoDiscipline é igual ao nome da sala
            if (nome !== filename) {
                document.getElementById("submitDiscipline").disabled = true;
                return swal("Oops!", "O nome do arquivo deve ser igual ao nome da sala!!", "error");
            } else {
                return document.getElementById("submitDiscipline").disabled = false;
            }
        });
    </script>
@endpush