<form action="{{route('modules.stages.update', $item->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <h6 class="label-custom">Código</h6>
            <div class="form-group">
                <input type="text" name="code" class="form-control form-control-sm"
                       value="{{$item->code}}" readonly>
                <small id="emailHelp" class="form-text text-muted">Não alterar!</small>
{{--                {!! $errors->first('code', '<p class="alert alert-warning">:message</p>') !!}--}}
            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <h6 class="label-custom">Título</h6>
            <div class="form-group">
                <select name="title" class="form-control form-control-sm">
                    <option value="{{$item->title}}">{{$item->title}}</option>
                    <option value="" class="text-danger">Selecione outro Tipo de Ensino</option>
                    <option value="Educação Espacial - DI - Itinerante">Educação Especial - DI - Itinerante</option>
                    <option value="Eja Ensino Médio">Eja Ensino Médio</option>
                    <option value="Ensino Fundamental de 9 anos">Ensino Fundamental de 9 anos</option>
                    <option value="Ensino Médio">Ensino Médio</option>
                    <option value="Ensino com Habilitação Profissional (Novo Tec)">Ensino Médio com Habilitação Profissional
                        (Novo Tec)
                    </option>
                    <option value="Novo Ensino Médio">Novo Ensino Médio</option>
                    <option value="Novo Ensino Médio com Habilitação Profissional (Novo Tec)">Novo Ensino Médio com
                        Habilitação Profissional (Novo Tec)
                    </option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Selecione o tipo de ensino que deseja criar!</small>
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