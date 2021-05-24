<div class="container">
    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg col-xl">
            <div class="form-group">
                <form action="{{route('coordinations.series.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <input type="hidden" name="stage_id" value="{{$stage->id}}">
                    <button type="submit" name="title" value="6º Ano"
                            class="btn btn-sm btn-primary btn-block">
                        6º Ano
                    </button>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg col-xl">
            <div class="form-group">
                <form action="{{route('coordinations.series.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <input type="hidden" name="stage_id" value="{{$stage->id}}">
                    <button type="submit" name="title" value="7º Ano"
                            class="btn btn-sm btn-primary btn-block">
                        7º Ano
                    </button>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg col-xl">
            <div class="form-group">
                <form action="{{route('coordinations.series.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <input type="hidden" name="stage_id" value="{{$stage->id}}">
                    <button type="submit" name="title" value="8º Ano"
                            class="btn btn-sm btn-primary btn-block">
                        8º Ano
                    </button>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg col-xl">
            <div class="form-group">
                <form action="{{route('coordinations.series.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <input type="hidden" name="stage_id" value="{{$stage->id}}">
                    <button type="submit" name="title" value="9º Ano"
                            class="btn btn-sm btn-primary btn-block">
                        9º Ano
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<div class="container">
    <div class="row">

        <div class="col-sm-12 col-md-12 col-lg col-xl">
            <div class="form-group">
                <form action="{{route('coordinations.series.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <input type="hidden" name="stage_id" value="{{$stage->id}}">
                    <button type="submit" name="title" value="1ª Série"
                            class="btn btn-sm btn-primary btn-block">
                        1ª Série
                    </button>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg col-xl">
            <div class="form-group">
                <form action="{{route('coordinations.series.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <input type="hidden" name="stage_id" value="{{$stage->id}}">
                    <button type="submit" name="title" value="2ª Série"
                            class="btn btn-sm btn-primary btn-block">
                        2ª Série
                    </button>
                </form>
            </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg col-xl">
            <div class="form-group">
                <form action="{{route('coordinations.series.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <input type="hidden" name="stage_id" value="{{$stage->id}}">
                    <button type="submit" name="title" value="3ª Série"
                            class="btn btn-sm btn-primary btn-block">
                        3ª Série
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
