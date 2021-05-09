<div class="modal fade" id="{{'modal_edit'.$period->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="{{'modal_edit'.$period->id}}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{'modal_'.$period->title}}Label">Editar: {{$period->title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('admins.periods.update', $period)}}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" name="year_id" value="{{$year->id}}">
                    <input type="hidden" name="stage_id" value="{{$stage->id}}">
                    <input type="hidden" name="serie_id" value="{{$serie->id}}">
                    <input type="hidden" name="title" value="{{$period->title}}">
                    <div class="form-group">
                        <label for="date_initial">Data inicial</label>
                        <input id="date_initial" type="date" value="{{$period->date_initial}}" name="date_initial"
                               class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="date_initial">Data final</label>
                        <input type="date" name="date_final" value="{{$period->date_final}}"
                               class="form-control form-control-sm" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
