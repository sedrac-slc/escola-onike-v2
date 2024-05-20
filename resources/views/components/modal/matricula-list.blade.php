<div class="modal fade" id="modalMatriculaList" tabindex="-1" role="dialog"
    aria-labelledby="modalMatriculaListLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ $action ?? route('aluno-matricula.remove') }}" method="POST" id="formMatriculaList">
            @csrf
            @method("DELETE")
            <input type="hidden" name="aluno_id" id="aluno-matricula-list" />
            <div class="modal-header">
                <h5 class="modal-title" id="modalMatriculaListLabel">
                    <span>{{ $title ?? 'Matriculas feitas' }}</span>
                </h5>
                <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"
                    style="background: none; border: none;">
                    <span aria-hidden="true" class="text-white h3">x</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                    <span>Fechar</span>
                </button>
            </div>
        </form>
    </div>
</div>
