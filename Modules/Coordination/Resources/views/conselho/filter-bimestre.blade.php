<section>
    <div class="container">
        <form action="{{route('filterConselhoPrimeiroBimestre')}}">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <select id="select_ano" name="selectYear"
                                    class="custom-select custom-select-sm" onchange="selectFunctionAno()">
                                <option value="null" selected>Ano</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->title }}">{{ $year->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <select id="select_stage" name="selectStage"
                                    class="custom-select custom-select-sm" onchange="selectFunctionStage()">
                                <option value="null" selected>Ensino</option>
                                @foreach ($stages as $stage)
                                    <option value="{{ $stage->title }}">{{ $stage->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <select id="select_serie" name="selectSerie"
                                    class="custom-select custom-select-sm" onchange="selectFunctionSerie()">
                                <option value="null" selected>Série</option>
                                @foreach ($series as $serie)
                                    <option value="{{ $serie->title }}">{{ $serie->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <select id="select_room" name="selectRoom"
                                    class="custom-select custom-select-sm" onchange="selectFunctionRoom()">
                                <option value="null" selected>Turma</option>
                                @foreach ($rooms as $room)
                                    <option value="{{ $room->title }}">{{ $room->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <button id="submit_form" class="btn btn-primary btn-sm btn-block" type="submit">Buscar
                            </button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>


<script>
    // Retorna o select select_stage disable
    document.getElementById("select_stage").disabled = true;
    // Retorna o select select_serie disable
    document.getElementById("select_serie").disabled = true;
    // Retorna o select select_room disable
    document.getElementById("select_room").disabled = true;
    // Retorna o select submit_form disable
    document.getElementById("submit_form").disabled = true;

    // Função onchange
    function selectFunctionAno() {
        // Retorna o valor do select select_stage
        let stage = document.getElementById("select_ano").value;
        // Verifica se o valor do select_stage é diferente de null
        if (stage != null) {
            // Se o valor for diferente de null,
            // Retorna o select select_serie enable
            document.getElementById("select_stage").disabled = false;
        }
    }

    // Função onchange
    function selectFunctionStage() {
        // Retorna o valor do select select_stage
        let serie = document.getElementById("select_stage").value;
        // Verifica se o valor do select_stage é diferente de null
        if (serie != null) {
            // Se o valor for diferente de null,
            // Retorna o select select_serie enable
            document.getElementById("select_serie").disabled = false;
        }
    }

    // Função onchange
    function selectFunctionSerie() {
        // Retorna o valor do select select_serie
        let serie = document.getElementById("select_serie").value;
        // Verifica se o valor do select_serie é diferente de null
        if (serie != null) {
            // Se o valor for diferente de null,
            // Retorna o select submit_form enable
            document.getElementById("select_room").disabled = false;
        }
    }

    // Função onchange
    function selectFunctionRoom() {
        // Retorna o valor do select select_room
        let room = document.getElementById("select_room").value;
        // Verifica se o valor do select_room é diferente de null
        if (room != null) {
            // Se o valor for diferente de null,
            // Retorna o select submit_form enable
            document.getElementById("submit_form").disabled = false;
        }
    }

</script>