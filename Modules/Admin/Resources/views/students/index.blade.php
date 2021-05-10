@extends('admin::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg col-xl">
                <div class="form-group">
                    <a class="btn btn-primary btn-sm btn-block" href="{{route('admins.admins.index')}}">
                        Painel
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                @include('admin::students._forms.import')
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                <div class="form-group">
                    <form method="GET" action="{{route('filterDataForm')}}">
                        <div class="input-group">
                            <input id="title" name="search" type="search"
                                   class="form-control form-control-sm textDateTitle" autocomplete="on"
                                   placeholder="Filtrar por nome">

                            <div class="input-group-append">
                                <button class="btn btn-outline-primary btn-primary btn-sm" type="submit"
                                        style="box-shadow: none !important;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2">
                <div class="form-group">
                    <select name="roomStudent" style="border: 1px solid #0097A7 !important;"
                            class="custom-select custom-select-sm"
                            onchange="location = this.value;">
                        <option selected>Filtrar por sala</option>
                        @foreach ($roomStudents as $roomStudent)
                            <option value="{{route('filterStudent', $roomStudent)}}">
                                <a href="{{route('filterStudent', $roomStudent)}}">
                                    {{$roomStudent}}
                                </a>
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">--}}
{{--                @include('admin::students._forms.create')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container">
        <form action="{{route('admins.students.destroyAll')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-11 col-xl-11">
                    <div class="form-group">
                        <div class="pagination">
                            @if(isset($data))
                                {!! $data->appends(Request::all())->links() !!}
                            @else
                                {!! $data->links() !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-1 col-xl-1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger btn-sm marcar"
                                onClick="return confirm('Se você clicar em OK, os registros selecionados serão excluido definitivamente. Clique em cancelar se você não tem certeza.')">
                            Excluir
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-hover">
                        <thead>
                        <tr>

                            <th style="width: 10px" class="text-center">
                                <label class="control control--checkbox">
                                    <input type="checkbox" id="ckAllStudent"/>
                                    <span class="control__indicator chkStudent"></span>
                                </label>
                            </th>
                            <th scope="col" style="width: 10px">Sala</th>
                            <th scope="col" style="width: 10px">Nº</th>
                            <th scope="col">Nome</th>
                            <th scope="col" style="width: 20px">RA</th>
                            <th scope="col">Email</th>
                            <th scope="col" style="width: 100px">Status</th>
                            <th scope="col" style="width: 50px">Estado</th>
                            <th scope="col" class="text-center" style="width: 30px">Editar</th>

                        </tr>
                        </thead>
                        <tbody style="font-size: 90% !important;">
                        @foreach($data as $item)
                            <tr>
                                <td class="text-center">
                                    <label class="control control--checkbox">
                                        <input name="delete[]" value="{{$item->id}}" type="checkbox"
                                               class="chkStudent"/>
                                        <span class="control__indicator chkStudent"></span>
                                    </label>
                                </td>
                                <td class="text-truncate text-center">{{$item->room}}</td>
                                <td class="text-truncate text-center">{{$item->number}}</td>
                                <td class="text-truncate">{{$item->name}}</td>
                                <td class="text-truncate">{{$item->ra}}</td>
                                <td class="text-truncate">{{$item->email_google}}</td>
                                <td class="text-truncate">{{$item->status}}</td>
                                <td class="text-truncate text-center">
                                    @if($item->active == 1)
                                        <i class="fas fa-thumbs-up text-success"></i>
                                    @else
                                        <i class="fas fa-thumbs-down text-danger"></i>
                                    @endif
                                </td>
                                <td class="text-truncate text-center">
                                    <a href="{{route('admins.students.edit', $student->id)}}"
                                       class="btn btn-sm btn-block btn-warning">
                                        <span style="cursor: pointer;"><i class="fas fa-user-edit"></i></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    <br><br><br>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $("#ckAllStudent").click(function () {  // minha chkStudent que marcará as outras
                if ($("#ckAllStudent").prop("checked"))   // se ela estiver marcada...
                    $(".chkStudent").prop("checked", true);  // as que estiverem nessa classe ".chkStudent" tambem serão marcadas
                else $(".chkStudent").prop("checked", false);   // se não, elas tambem serão desmarcadas
            });
        });
    </script>
@endpush



