<form action="{{route('modules.teachers.update', $item->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="form-group">
                <input type="text" name="code" class="form-control form-control-sm"
                       value="{{$item->code, old('code')}}" readonly
                >
                {!! $errors->first('code', '<p class="alert alert-warning">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <div class="form-group">
                <input type="text" name="name" class="form-control form-control-sm"
                       value="{{$item->name, old('name')}}"
                >
                {!! $errors->first('name', '<p class="alert alert-warning">:message</p>') !!}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <input type="text" name="email" class="form-control form-control-sm"
                       value="{{$item->email, old('email')}}"
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