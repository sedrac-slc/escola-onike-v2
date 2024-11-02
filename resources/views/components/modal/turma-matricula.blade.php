@php
    use App\Models\Curso;
    $cursos = Curso::orderBy('created_at', 'DESC')->get();
@endphp

<div class="modal fade" id="modalMatriculaForm" tabindex="-1" role="dialog" aria-labelledby="modalMatriculaFormLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="modal-content border-none" class="modal-content" action="{{ route('matriculas.store') }}" method="POST">
            <div class="modal-header">
                <h5 class="modal-title" id="modalMatriculaFormLabel">
                    <span>{{ $title ?? 'Matricula aluno' }}</span>
                </h5>
                <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"
                    style="background: none; border: none;">
                    <span aria-hidden="true" class="text-white h3">x</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                @method('POST')
                @include('components.form.matricula', ['hidden_cadastra' => true])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">
                    <span>Não, cancela</span>
                </button>
                <button type="submit" class="btn btn-primary">
                    <span>Sim, confirmo</span>
                </button>
            </div>
        </form>
    </div>
</div>
