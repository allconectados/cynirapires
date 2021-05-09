<form action="{{route('admins.rooms.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="year_id" value="{{$year->id}}">
    <input type="hidden" name="stage_id" value="{{$stage->id}}">
    <input type="hidden" name="serie_id" value="{{$serie->id}}">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-11 col-xl-11">
            <h6 class="label-custom">Turma</h6>
            <div class="form-group">
                <input name="title" class="form-control form-control-sm" value="{{old('title')}}">
                <small id="emailHelp" class="form-text text-muted">Ex.: 1ºA</small>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
            <h6 class="label-custom">Salvar</h6>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
            </div>
        </div>
    </div>
</form>