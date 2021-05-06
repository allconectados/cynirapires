<form action="{{route('modules.teachers.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="form-group">
                <input type="text" name="code" class="form-control form-control-sm"
                       value="{{uniqid()}}" readonly>
                {!! $errors->first('code', '<p class="alert alert-warning">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="form-group">
                <input type="text" name="name" class="form-control form-control-sm"
                       value="{{old('name')}}"
                >
                {!! $errors->first('name', '<p class="alert alert-warning">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
            <div class="form-group">
                <input type="text" name="email" class="form-control form-control-sm"
                       value="{{old('email')}}"
                >
                {!! $errors->first('email', '<p class="alert alert-warning">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
            </div>
        </div>
    </div>
</form>