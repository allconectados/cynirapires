<section>
    <div class="container">
        <form action="{{route('coordinations.notas.conselho.filter', [$year->url,$stage->url,$serie->url,$room->url])}}">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <span>{{$year->title}}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <span>{{$stage->title}}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <span>{{$serie->title}}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <span>{{$room->title}}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group">
                            <select id="select_student" name="selectStudent"
                                    class="custom-select custom-select-sm" onchange="selectFunctionStudent()">
                                <option value="null" selected>Estudantes</option>
                                @foreach ($studentsNote as $student)
                                    <option value="{{ $student->name }}">{{ $student->name }}</option>
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
