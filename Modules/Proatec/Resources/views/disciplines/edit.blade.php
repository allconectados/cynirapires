@extends('proatec::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('modules.proatecs.dashboard')}}">
                        Painel
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <div class="form-group">
                    <a class="btn btn-secondary btn-sm btn-block" href="{{route('modules.disciplines.index')}}">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <h5 class="with-line left">{{$titlePage}}</h5>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        @include('proatec::disciplines._forms.edit')
    </div>
    <hr>
    <div class="container">
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
    </div>

@endsection




