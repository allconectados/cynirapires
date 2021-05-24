<div class="container">
    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h6 class="label-custom">Disciplinas e professores
                        / {{ $disciplines->count() }}</h6>
                    <div class="form-group">
                        <form action="{{route('admins.disciplines.import')}}" method="POST"
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
            @include('admin::rooms._modals.disciplines', ['item' => $room])
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
                                  action="{{route('admins.disciplines.update', $discipline->id)}}"
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
                                                <option value="{{$teacher->name}}" class="text-secondary">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <select name="teacher"
                                                class="form-control form-control-sm"
                                                onchange='this.form.submit()'
                                                style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                            <option value="">Selecione</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->name}}" class="text-secondary">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>
                            </form>
                            @if ($discipline->room_id != null && $discipline->teacher != null)
                                <td class="text-center">
                                                 <span class="text-success">
                                                {{\Carbon\Carbon::parse($discipline->date_initial)->format('d/m')}}
                                            </span>
                                </td>
                            @else
                                <td>
                                    <span class="text-danger"></span>
                                </td>

                            @endif

                            <td class="text-truncate text-center">
                                <form
                                        action="{{route('admins.disciplines.destroy', $discipline->id) }}"
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
</div>
@push('scripts')
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