<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <form action="{{route('admins.periods.store') }}" method="post">
                @csrf
                <input type="hidden" name="year_id" value="{{$year->id}}">
                <input type="hidden" name="stage_id" value="{{$stage->id}}">
                <input type="hidden" name="serie_id" value="{{$serie->id}}">
                <div class="form-group">
                    <label for="date_initial">Data inicial</label>
                    <input id="date_initial" type="date" name="date_initial" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <label for="date_initial">Data final</label>
                    <input type="date" name="date_final" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="title" value="1º Bimestre"
                            class="btn btn-sm btn-primary btn-block">
                        1º Bimestre
                    </button>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <form action="{{route('admins.periods.store') }}" method="post">
                @csrf
                <input type="hidden" name="year_id" value="{{$year->id}}">
                <input type="hidden" name="stage_id" value="{{$stage->id}}">
                <input type="hidden" name="serie_id" value="{{$serie->id}}">
                <div class="form-group">
                    <label for="date_initial">Data inicial</label>
                    <input id="date_initial" type="date" name="date_initial"
                           class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <label for="date_initial">Data final</label>
                    <input type="date" name="date_final" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="title" value="2º Bimestre"
                            class="btn btn-sm btn-primary btn-block">
                        2º Bimestre
                    </button>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <form action="{{route('admins.periods.store') }}" method="post">
                @csrf
                <input type="hidden" name="year_id" value="{{$year->id}}">
                <input type="hidden" name="stage_id" value="{{$stage->id}}">
                <input type="hidden" name="serie_id" value="{{$serie->id}}">
                <div class="form-group">
                    <label for="date_initial">Data inicial</label>
                    <input id="date_initial" type="date" name="date_initial"
                           class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <label for="date_initial">Data final</label>
                    <input type="date" name="date_final" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="title" value="3º Bimestre"
                            class="btn btn-sm btn-primary btn-block">
                        3º Bimestre
                    </button>
                </div>
            </form>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <form action="{{route('admins.periods.store') }}" method="post">
                @csrf
                <input type="hidden" name="year_id" value="{{$year->id}}">
                <input type="hidden" name="stage_id" value="{{$stage->id}}">
                <input type="hidden" name="serie_id" value="{{$serie->id}}">
                <div class="form-group">
                    <label for="date_initial">Data inicial</label>
                    <input id="date_initial" type="date" name="date_initial"
                           class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <label for="date_initial">Data final</label>
                    <input type="date" name="date_final" class="form-control form-control-sm" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="title" value="4º Bimestre"
                            class="btn btn-sm btn-primary btn-block">
                        4º Bimestre
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>