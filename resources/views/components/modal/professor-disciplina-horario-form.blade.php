@php

    use App\Models\Professor;
    use App\Models\Disciplina;
    use App\Models\Horario;
    use App\Models\Turma;

    $turmas = Turma::orderBy('created_at', 'DESC')->get();
    $disciplinas = Disciplina::orderBy('created_at', 'DESC')->get();
    $professores = Professor::with('user')->orderBy('created_at', 'DESC')->get();

    if(isset($with_horario)) $horarios = Horario::orderBy('created_at', 'DESC')->get();

@endphp

<div class="modal fade" id="modalProfessorDisciplinaHorario" tabindex="-1" role="dialog"
    aria-labelledby="modalProfessorDisciplinaHorarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <form class="modal-content" action="{{ $action ?? route('turma-disciplina-horario.store_professor') }}" method="POST"
            id="formProfessorDisciplinaHorario">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalProfessorDisciplinaHorarioLabel">
                    <span>{{ $title ?? 'Adicionar professor' }}</span>
                </h5>
                <button type="button" class="" data-bs-dismiss="modal" aria-label="Close"
                    style="background: none; border: none;">
                    <span aria-hidden="true" class="text-white h3">x</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="horario" name="horario_id" value=""/>
                <div class="">
                    @isset($professores)
                        <label for="professor_id" class="form-label">
                            <i class="bi bi-people"></i>
                            <span>Professor</span>
                            <span class="text-danger">*</span>
                        </label>
                        <select name="professor_id" id="professor_id" class="form-control">
                            <option disabled selected class="text-muted">Seleciona o professor</option>
                            @foreach ($professores as $professor)
                                <option value="{{ $professor->id }}"
                                    data-url="{{ route('turmas.ajaxprofessor', $professor->id) }}">
                                    {{ $professor->user->name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <div class="panel-empty">Não tem Professor cadastrado</div>
                    @endisset
                </div>

                <div class="mt-2">
                    @isset($turmas)
                        <label for="turma_id" class="form-label">
                            <i class="bi bi-calendar-plus"></i>
                            <span>Turma</span>
                            <span class="text-danger">*</span>
                        </label>
                        <select name="turma_id" id="turma_id" class="form-control" disabled></select>
                    @else
                        <div class="panel-empty">Não tem disciplina cadastrado</div>
                    @endisset
                </div>

                <div class="mt-2 @if(isset($with_horario)) d-none @endif">
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
                    @if(isset($with_horario))
                    @isset($horarios)
                    <label for="horario_id" class="form-label">
                        <i class="bi bi-clock"></i>
                        <span>Horario:</span>
                        <span class="text-danger">*</span>
                    </label>
                    <select name="horario_id" id="horario_id_search" class="form-control">
                        @foreach ($horarios as $horario)
                            <option value="{{ $horario->id }}"> {{ $horario->text() }}</option>
                        @endforeach
                    </select>
                @else
                    <div class="panel-empty">Não tem horario cadastrado</div>
                @endisset
                    @endif
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

<script>
    const professorSelect = document.querySelector('select#professor_id');
    const turmaSelect = document.querySelector('select#turma_id');

    professorSelect.addEventListener('change', () => {
        const url = professorSelect.querySelector(`option[value="${professorSelect.value}"]`).dataset.url;
        fecthTurma(url)
    });

    function fecthTurma(url, turma_id = '') {
        fetch(url)
            .then(resp => resp.json())
            .then(resp => {
                let html = ``
                resp.forEach(item => {
                    html += `<option value="${item.id}" ${turma_id == item.id ? 'selected' : ''}>
                            Ano lectivo:${item.ano_lectivo}|Periódo:${periodo(item.periodo)}|Sala:${item.sala}
                        </option>`
                });

                if (html != "") {
                    turmaSelect.innerHTML = html;
                    if (turmaSelect.hasAttribute('disabled')) turmaSelect.removeAttribute('disabled');
                } else {
                    if (!turmaSelect.hasAttribute('disabled')) turmaSelect.setAttribute('disabled', true);
                    turmaSelect.innerHTML = ``;
                }
            });
    }

    function periodo(periodo) {
        switch (periodo) {
            case "MANHA":
                return "Manhã";
            case "TARDE":
                return "Tarde";
            default:
                return "Noite";
        }
    }
</script>
