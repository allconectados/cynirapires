<div class="modal fade" id="{{'modal_discipline'.$room->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="{{'modal_discipline'.$room->id}}Label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{'modal_discipline'.$room->title}}Label">Visualizando Turma: {{$room->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-sm table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Disciplinas</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Início</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($disciplines->sortBy('title') as $discipline)
                        {{--                        @if ($room->id === $discipline->room_id)--}}
                        <tr>
                            <td>{{$discipline->title}}</td>
                            @if ($discipline->teacher != null)
                                <td>{{$discipline->teacher}}</td>
                                <td class="text-center">
                                    {{\Carbon\Carbon::parse($discipline->date_initial)->format('d/m')}}
                                </td>
                            @else
                                <td>Não Informado!</td>
                                <td class="text-center">Não Informado!</td>
                            @endif
                        </tr>
                        {{--                        @else--}}

                        {{--                        @endif--}}
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>