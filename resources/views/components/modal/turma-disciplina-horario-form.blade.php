@php

    use App\Models\Disciplina;
    use App\Models\Horario;
    use App\Models\Turma;

    $turmas = Turma::orderBy('created_at', 'DESC')->get();
    $horarios = Horario::orderBy('created_at', 'DESC')->get();
    $disciplinas = Disciplina::orderBy('created_at', 'DESC')->get();

@endphp

<div class="modal fade" id="modalCursoDisciplinaHorario" tabindex="-1" role="dialog"
    aria-labelledby="modalCursoDisciplinaHorarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ route('turma-disciplina-horario.store') }}" method="POST" id="formCursoDisciplinaHorario">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalCursoDisciplinaHorarioLabel">
                    <span>{{ $title ?? 'Adicionar Disciplina no Curso' }}</span>
                </h5>
                <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"
                    style="background: none; border: none;">
                    <span aria-hidden="true" class="text-white h3">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="">
                    <input type="hidden" id="professor" name="professor_id"/>
                    @isset($turmas)
                        <label for="curso_id_search" class="form-label">
                            <i class="bi bi-calendar-plus"></i>
                            <span>Turma</span>
                            <span class="text-danger">*</span>
                        </label>
                        <select name="turma_id" id="curso_id_search" class="form-control">
                            @foreach ($turmas as $turma)
                                <option value="{{ $turma->id }}"> {{ $turma->text() }}</option>
                            @endforeach
                        </select>
                    @else
                        <div class="panel-empty">Não tem disciplina cadastrado</div>
                    @endisset
                </div>

                <div class="mt-2">
                    @isset($disciplinas)
                        <label for="disciplina_id" class="form-label">
                            <i class="bi bi-book"></i>
                            <span>Disciplina:</span>
                            <span class="text-danger">*</span>
                        </label>
                        <select name="disciplina_id" id="disciplina_id_search" class="form-control">
                            @foreach ($disciplinas as $disciplina)
                                <option value="{{ $disciplina->id }}"> {{ $disciplina->nome }}</option>
                            @endforeach
                        </select>
                    @else
                        <div class="panel-empty">Não tem disciplina cadastrado</div>
                    @endisset
                </div>

                <div class="mt-2">
                    @isset($horarios)
                        <label for="horario_id" class="form-label">
                            <i class="bi bi-person-lines-fill"></i>
                            <span>Horários:</span>
                            <span class="text-danger">*</span>
                        </label>
                        <select name="horario_id" id="horario_id" class="form-control">
                            @foreach ($horarios as $horario)
                                <option value="{{ $horario->id }}"> {{ $horario->text() }}</option>
                            @endforeach
                        </select>
                    @else
                        <div class="panel-empty">Não tem horarios cadastrado</div>
                    @endisset
                </div>
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
