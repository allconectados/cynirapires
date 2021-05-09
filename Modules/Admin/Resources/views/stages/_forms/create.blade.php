<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <form action="{{route('admins.stages.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <button type="submit" name="title" value="Educação Especial - DI - Itinerante"
                            class="btn btn-sm btn-primary btn-block">
                        Educação Especial - DI - Itinerante
                    </button>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <form action="{{route('admins.stages.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <button type="submit" name="title" value="Eja Ensino Médio"
                            class="btn btn-sm btn-primary btn-block">
                        Eja Ensino Médio
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <form action="{{route('admins.stages.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <button type="submit" name="title" value="Ensino Fundamental de 9 anos"
                            class="btn btn-sm btn-primary btn-block">
                        Ensino Fundamental de 9 anos
                    </button>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <form action="{{route('admins.stages.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <button type="submit" name="title"
                            value="Novo Ensino Médio com Habilitação Profissional (Novo Tec)"
                            class="btn btn-sm btn-primary btn-block">
                        Novo Ensino Médio com Habilitação Profissional (Novo Tec)
                    </button>
                </form>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <form action="{{route('admins.stages.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <button type="submit" name="title" value="Ensino Médio com Habilitação Profissional (Novo Tec)"
                            class="btn btn-sm btn-primary btn-block">
                        Ensino Médio com Habilitação Profissional (Novo Tec)
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <form action="{{route('admins.stages.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <button type="submit" name="title" value="Novo Ensino Médio"
                            class="btn btn-sm btn-primary btn-block">
                        Novo Ensino Médio
                    </button>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group">
                <form action="{{route('admins.stages.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <button type="submit" name="title" value="Ensino Médio"
                            class="btn btn-sm btn-primary btn-block">
                        Ensino Médio
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>