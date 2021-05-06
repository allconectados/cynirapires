<form action="{{route('modules.rooms.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <h6 class="label-custom">Código</h6>
            <div class="form-group">
                <input type="text" name="code" class="form-control form-control-sm"
                       value="{{uniqid()}}" readonly>
                <small id="emailHelp" class="form-text text-muted">Não alterar!</small>
{{--                {!! $errors->first('code', '<p class="alert alert-warning">:message</p>') !!}--}}
            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <h6 class="label-custom">Ano</h6>
            <div class="form-group">
                <select name="year_id" class="form-control form-control-sm">
                    <option value="">Selecione o ano</option>
                    @forelse($years as $key => $year)
                        <option value="{{$key}}">{{$year}}</option>
                    @empty

                    @endforelse
                </select>
                <small id="emailHelp" class="form-text text-muted">Selecione o ano!</small>
{{--                {!! $errors->first('year_id', '<p class="alert alert-warning">:message</p>') !!}--}}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
            <h6 class="label-custom">Tipo de Ensino</h6>
            <div class="form-group">
                <select name="stage_id" class="form-control form-control-sm">
                    <option value="">Selecione o Tipo de Ensino</option>
                    @forelse($stages as $key => $stage)
                        <option value="{{$key}}">{{$stage}}</option>
                    @empty

                    @endforelse
                </select>
                <small id="emailHelp" class="form-text text-muted">Selecione o Tipo de Ensino!</small>
{{--                {!! $errors->first('stage_id', '<p class="alert alert-warning">:message</p>') !!}--}}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <h6 class="label-custom">Turma</h6>
            <div class="form-group">
                <input name="title" class="form-control form-control-sm" value="{{old('title')}}">
                <small id="emailHelp" class="form-text text-muted">Ex.: 1ºA</small>
{{--                {!! $errors->first('title', '<p class="alert alert-warning">:message</p>') !!}--}}
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