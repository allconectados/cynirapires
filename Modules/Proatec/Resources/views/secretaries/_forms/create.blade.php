<form action="{{route('modules.secretaries.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="form-group">
                <input type="hidden" name="code" class="form-control form-control-sm"
                       value="{{uniqid()}}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <div class="form-group">
                <h6 class="label-custom">Cargo</h6>
                <select name="cargo" class="form-control form-control-sm">
                    <option value="">Selecione o cargo</option>
                    <option value="Gerente de Organização Escolar">Gerente de Organização Escolar</option>
                    <option value="Agente de Organizacao Escolar">Agente de Organizacao Escolar</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <div class="form-group">
                <h6 class="label-custom">Nome</h6>
                <input type="text" name="name" class="form-control form-control-sm"
                       value="{{old('name')}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
            <div class="form-group">
                <h6 class="label-custom">E-mail</h6>
                <input type="text" name="email" class="form-control form-control-sm"
                       value="{{old('email')}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
            <div class="form-group">
                <h6 class="label-custom">Salvar</h6>
                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
            </div>
        </div>
    </div>
</form>
