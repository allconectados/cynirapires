<form action="{{route('modules.rooms.update', $item->id)}}" method="post" enctype="multipart/form-data">
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
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <h6 class="label-custom">Ano</h6>
            <div class="form-group">
                <select name="year_id" class="form-control form-control-sm">
                    <option value="{{$item->year->id}}">{{$item->year->title}}</option>
                    {{--                    <option value="">Selecione o ano</option>--}}
                    @forelse($years as $key => $year)
                        @if($key != $item->year_id)
                            <option value="{{$key}}">{{$year}}</option>
                        @else

                        @endif
                    @empty

                    @endforelse
                </select>
                <small id="emailHelp" class="form-text text-muted">Selecione o ano!</small>
                {{--                {!! $errors->first('year_id', '<p class="alert alert-warning">:message</p>') !!}--}}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
            <h6 class="label-custom">Tipo de Ensino</h6>
            <div class="form-group">
                <select name="stage_id" class="form-control form-control-sm">
                    <option value="{{$item->stage_id}}">{{$item->stage->title}}</option>
                    @forelse($stages as $key => $stage)
                        @if($item->stage_id != $key)
                            <option value="{{$key}}">{{$stage}}</option>
                        @else

                        @endif
                    @empty

                    @endforelse
                </select>
                <small id="emailHelp" class="form-text text-muted">Selecione o Tipo de Ensino!</small>
                {{--                {!! $errors->first('stage_id', '<p class="alert alert-warning">:message</p>') !!}--}}
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
            <h6 class="label-custom">Turma</h6>
            <div class="form-group">
                <input name="title" class="form-control form-control-sm" value="{{$item->title, old('title')}}">
                <small id="emailHelp" class="form-text text-muted">Ex.: 1ºA</small>
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

        <div class="row" style="margin: 0 15px">
            <h6 class="label-custom">
                Selecione os professores</h6>
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