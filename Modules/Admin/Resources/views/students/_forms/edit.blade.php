<div class="container">
    @if($student->status == 'Remanejamento' || $student->status == 'TROCA NÃO OFICIAL' || $student->status == 'TRANSFERIDO NÃO OFICIAL')
        <form>
            <div class="container">

                <span class="text-warning">Este aluno foi remanejado, não é possivel edita-lo.</span>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input id="name" type="text" name="name"
                                   value="{{$student->name}}" class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="email">Email Google</label>
                            <input id="email" type="text" name="email"
                                   value="{{$student->email}}" class="form-control form-control-sm"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="email_microsoft">Email Microsoft</label>
                            <input id="email_microsoft" type="text" name="email_microsoft"
                                   value="{{$student->email_microsoft}}"
                                   class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="username">Nome de usuário</label>
                            <input id="username" type="text" name="username"
                                   value="{{$student->username}}" class="form-control form-control-sm"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="ra">RA</label>
                            <input id="ra" type="text" name="ra"
                                   value="{{$student->ra}}" class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
                        <div class="form-group">
                            <label for="ra_digit">Digito</label>
                            <input id="ra_digit" type="text" name="ra_digit"
                                   value="{{$student->ra_digit}}" class="form-control form-control-sm"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="date_of_birth">Data de aniversário</label>
                            <input id="date_of_birth" type="date" name="date_of_birth"
                                   value="{{$student->date_of_birth}}" class="form-control form-control-sm"
                                   disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="active">Habilitar acesso?</label>
                            <select id="active" name="active" class="form-control form-control-sm" disabled>
                                <option value="0" @if ($student->active == 0) selected @endif>Não
                                </option>
                                <option value="1" @if ($student->active == 1) selected @endif>Sim
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="status">Status do aluno</label>
                            <input type="text" id="status" name="status" value="{{$student->status}}"
                                   class="form-control form-control-sm text-warning" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input id="password" name="password" type="password"
                                   class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="password_confirmation">Confirme a senha</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="status">Status do aluno</label>
                            <select id="status" type="date" name="status"
                                    class="form-control form-control-sm"
                                    style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;"
                                    disabled>
                                <option value="{{$student->status}}">{{$student->status}}</option>

                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="room_id">Sala</label>
                            <select id="room_id" name="room_id" class="form-control form-control-sm"
                                    style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;"
                                    disabled>
                                @foreach($rooms as $room => $key)
                                    <option
                                            value="{{$room}}"{{ ($student->room_id == $room ? "selected":"") }}>
                                        {{$key}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="number">Número</label>
                            <select name="number" id="number"
                                    class="form-control form-control-sm"
                                    style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;"
                                    disabled>
                                @foreach(range(1,60) as $value)
                                    <option value="{{$value}}"
                                            @if ($student->number == $value) selected @endif>
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <a href="{{route('admins.students.index')}}"
                   class="btn btn-sm btn-secondary">
                    Voltar
                </a>
            </div>
        </form>
    @else
        <form action="{{route('admins.students.update', $student->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input id="name" type="text" name="name"
                                   value="{{$student->name}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="email">Email Google</label>
                            <input id="email" type="text" name="email"
                                   value="{{$student->email}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="email_microsoft">Email Microsoft</label>
                            <input id="email_microsoft" type="text" name="email_microsoft"
                                   value="{{$student->email_microsoft}}"
                                   class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="username">Nome de usuário</label>
                            <input id="username" type="text" name="username"
                                   value="{{$student->username}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                        <div class="form-group">
                            <label for="ra">RA</label>
                            <input id="ra" type="text" name="ra"
                                   value="{{$student->ra}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
                        <div class="form-group">
                            <label for="ra_digit">Digito</label>
                            <input id="ra_digit" type="text" name="ra_digit"
                                   value="{{$student->ra_digit}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="date_of_birth">Data de aniversário</label>
                            <input id="date_of_birth" type="date" name="date_of_birth"
                                   value="{{$student->date_of_birth}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="active">Habilitar acesso?</label>
                            <select id="active" name="active" class="form-control form-control-sm">
                                <option value="0" @if ($student->active == 0) selected @endif>Não
                                </option>
                                <option value="1" @if ($student->active == 1) selected @endif>Sim
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="status">Status do aluno</label>
                            <input type="text" id="status" name="status" value="{{$student->status}}"
                                   class="form-control form-control-sm text-info" disabled>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input id="password" name="password" type="password"
                                   class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="password_confirmation">Confirme a senha</label>
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <span class="text-info">Caso necessite remanejar o aluno, selecione Remanejamento,
                                    o novo estágio, a nova sala e o novo número do aluno
                                </span>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <label for="status">Status do aluno</label>
                            <select id="status" type="date" name="status"
                                    class="form-control form-control-sm"
                                    style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                <option value="{{$student->status}}">{{$student->status}}</option>
                                <option value="Remanejamento">Remanejamento</option>
                                <option value="Troca aluno entre classes">Troca aluno entre classes</option>
                                <option value="Troca aluno entre escolas">Troca aluno entre escolas</option>
                                <option value="Não Comparecimento">Não Comparecimento</option>
                                <option value="Baixa-Transferência"> Baixa-Transferência</option>
                                <option value="Transferido">Transferido</option>
                                <option value="TROCA NÃO OFICIAL" style="color: #fb3c00">TROCA NÃO OFICIAL</option>
                                <option value="TRANSFERIDO NÃO OFICIAL" style="color: #fb3c00">TRANSFERIDO NÃO OFICIAL</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="room">Sala</label>
                            <select id="room" name="room" class="form-control form-control-sm"
                                    style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                @foreach($rooms as $room)
                                    <option
                                            value="{{$room}}"{{ ($student->room == $room ? "selected":"") }}>
                                        {{$room}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="number">Número</label>
                            <select name="number" id="number"
                                    class="form-control form-control-sm"
                                    style="font-size: 100% !important;padding-top: 0px !important;padding-bottom: 0px !important;">
                                @foreach(range(1,60) as $value)
                                    <option value="{{$value}}"
                                            @if ($student->number == $value) selected @endif>
                                        {{$value}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{route('admins.students.index')}}"
                   class="btn btn-sm btn-secondary">
                    Voltar
                </a>
                <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
            </div>
        </form>
    @endif

</div>