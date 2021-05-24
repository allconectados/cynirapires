<form action="{{route('coordinations.disciplines.update', $item->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <h6 class="label-custom">Código</h6>
            <div class="form-group">
                <input type="text" name="code" class="form-control form-control-sm"
                       value="{{$item->code}}" readonly>
                <small id="emailHelp" class="form-text text-muted">Não alterar!</small>
            </div>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <h6 class="label-custom">Título</h6>
            <div class="form-group">
                <input name="title" class="form-control form-control-sm" value="{{$item->title, old('title')}}">
                <small id="emailHelp" class="form-text text-muted">Digite o título da disciplina!</small>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
            <h6 class="label-custom">Salvar</h6>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
            </div>
        </div>
    </div>

    <div class="row" style="margin:15px 0px">
        <h6 class="label-custom">Selecione os professores</h6>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="col-sm" style="border: 1px solid #ccc">
                <div class="form-group">
                    <br>
                    @foreach($teachers->slice(0, 21) as $teacher)
                        <label class="control control--checkbox">{{ $teacher->name}}&nbsp;
                            <input type="checkbox" name="teachers[]" value="{{$teacher->id}}"
                            @forelse($item->teachers as $item->teacher)
                                {{ $item->teacher->id == $teacher->id ? 'checked' : '' }}
                                    @empty

                                    @endforelse
                            />
                            <div class="control__indicator"></div>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="col-sm" style="border: 1px solid #ccc">
                <div class="form-group">
                    <br>
                    @foreach($teachers->slice(21) as $teacher)
                        <label class="control control--checkbox">{{ $teacher->name}}&nbsp;
                            <input type="checkbox" name="teachers[]" value="{{$teacher->id}}"
                            @forelse($item->teachers as $item->teacher)
                                {{ $item->teacher->id == $teacher->id ? 'checked' : '' }}
                                    @empty

                                    @endforelse
                            />
                            <div class="control__indicator"></div>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</form>