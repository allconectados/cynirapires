<form action="{{route('modules.coordinations.import')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-11 col-xl-11">
            <div class="form-group">
                <input type="file" name="select_file" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
            <div class="form-group">
                <input type="submit" name="upload" class="btn btn-success btn-sm" value="Importar">
            </div>
        </div>
    </div>
</form>
