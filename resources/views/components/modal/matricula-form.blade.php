@php
    use App\Models\Curso;
    $cursos = Curso::orderBy('created_at', 'DESC')->get();
@endphp

<div class="modal fade" id="modalMatriculaForm" tabindex="-1" role="dialog"
    aria-labelledby="modalMatriculaFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('curso-disciplina-horario.store') }}" method="POST" id="formCursoDisciplinaHorario">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalMatriculaFormLabel">
                    <span>{{ $title ?? 'Matricula' }}</span>
                </h5>
                <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"
                    style="background: none; border: none;">
                    <span aria-hidden="true" class="text-white h3">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    @isset($cursos)
                        <label for="curso_id_search" class="form-label">
                            <i class="bi bi-calendar-plus"></i>
                            <span>Escolha o curso para procurar as turmas:</span>
                            <span class="text-danger">*</span>
                        </label>
                        <select name="curso_id" id="curso_id_search" class="form-control">
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}" data-url="{{ route('turmas.ajaxturma', $curso->id) }}">
                                    {{ $curso->text() }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <div class="panel-empty">Não tem disciplina cadastrado</div>
                    @endisset
                </div>
                <div id="turmas-result"></div>
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
