<div class="modal fade" id="modalCursoAlunoList" tabindex="-1" role="dialog"
    aria-labelledby="modalCursoAlunoListLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ $action ?? route('turma.remove') }}" method="POST" id="formCursoAlunoList">
            @csrf
            @method("DELETE")
            <div class="modal-header">
                <h5 class="modal-title" id="modalCursoAlunoListLabel">
                    <span>{{ $title ?? 'Lista Alunos' }}</span>
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
