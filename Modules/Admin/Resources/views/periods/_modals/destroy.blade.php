<div id="{{ 'modal_destroy' . $period->id }}" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-confirm">
        <form action="{{route('admins.periods.destroy', $period->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <h4 class="modal-title w-100 text-danger">ATENÇÃO!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza de que deseja excluir esse registro? Este processo não pode ser desfeito.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Excluír</button>
                </div>
            </div>
        </form>
    </div>
</div>