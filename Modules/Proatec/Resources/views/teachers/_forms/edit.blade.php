<form action="{{route('modules.teachers.update', $item->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <div class="form-group">
                <input type="hidden" name="code" class="form-control form-control-sm"
                       value="{{$item->code}}" readonly>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <div class="form-group">
                <h6 class="label-custom">Cargo</h6>
                <select name="cargo" class="form-control form-control-sm">
                    <option value="{{$item->cargo, old('cargo')}}">{{$item->cargo, old('cargo')}}</option>
                    <option value="Professor Educacao Basica I">Professor Educacao Basica I</option>
                    <option value="Professor Educacao Basica II">Professor Educacao Basica II</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <div class="form-group">
                <h6 class="label-custom">Nome</h6>
                <input type="text" name="name" class="form-control form-control-sm"
                       value="{{$item->name, old('name')}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
            <div class="form-group">
                <h6 class="label-custom">E-mail</h6>
                <input type="text" name="email" class="form-control form-control-sm"
                       value="{{$item->email, old('email')}}">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
            <div class="form-group">
                <h6 class="label-custom">Salvar</h6>
                <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
            </div>
        </div>
    </div>

    <div class="row" style="margin: 15px 0">
        <h6 class="label-custom">Selecione as disciplinas</h6>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="border: 1px solid #ccc">
            <div class="form-group">
                <br>
                @foreach($disciplines as $discipline)
                        <div class="form-check form-check-inline">
                            <label class="control control--checkbox">{{ $discipline->title}}&nbsp;
                                <input type="checkbox" name="disciplines[]" value="{{$discipline->id}}"
                                @forelse($item->disciplines as $item->discipline)
                                    {{ $item->discipline->id == $discipline->id ? 'checked' : '' }}
                                    @empty

                                    @endforelse
                                />
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row" style="margin: 15px 0">
        <h6 class="label-custom">Selecione as turmas</h6>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="border: 1px solid #ccc">
                <div class="form-group">
                    <br>
                    @foreach($rooms as $room)
                        <div class="form-check form-check-inline">
                            <label class="control control--checkbox">{{ $room->title}}&nbsp;
                                <input type="checkbox" name="rooms[]" value="{{$room->id}}"
                                @forelse($item->rooms as $item->room)
                                    {{ $item->room->id == $room->id ? 'checked' : '' }}
                                    @empty

                                    @endforelse
                                />
                                <div class="control__indicator"></div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
</form>
