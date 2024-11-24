<div class="modal fade" id="modalTrimestreNotaList" tabindex="-1" role="dialog"
    aria-labelledby="modalTrimestreNotaListLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('turma-disciplina-horario.remove') }}" method="POST" id="formTrimestreNotaList">
            @csrf
            @method("DELETE")
            <div class="modal-header">
                <h5 class="modal-title" id="modalTrimestreNotaListLabel">
                    <span>{{ $title ?? 'Listar notas' }}</span>
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
