<form action="{{route('disciplines.store')}}" method="post" enctype="multipart/form-data">
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
        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <h6 class="label-custom">Título</h6>
            <div class="form-group">
                <input name="title" class="form-control form-control-sm" value="{{old('title')}}">
                <small id="emailHelp" class="form-text text-muted">Digite o título da disciplina!</small>
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