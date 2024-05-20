<div class="modal fade" id="modalCursoDisciplinaHorarioList" tabindex="-1" role="dialog"
    aria-labelledby="modalCursoDisciplinaHorarioListLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ $action ?? route('curso-disciplina-horario.remove') }}" method="POST" id="formCursoDisciplinaHorarioList">
            @csrf
            @method("DELETE")
            <input type="hidden" name="professor_id" id="professorCursoDisciplina" />
            <div class="modal-header">
                <h5 class="modal-title" id="modalCursoDisciplinaHorarioListLabel">
                    <span>{{ $title ?? 'Lista Disciplina no Curso' }}</span>
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
