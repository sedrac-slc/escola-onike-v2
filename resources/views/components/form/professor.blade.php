@php $funcao = App\Enum\FuncaoEnum::PROFESSOR; @endphp
<input type="hidden" name="funcao" value="{{ $funcao }}"/>

<div class="row">
    @include('components.parts.form-utilizador')
    <div class="col-md-6 p-1">
        <label  for="formacao" class="form-label">
            <i class="bi bi-book"></i>
            <span>Formação:</span>
            <span class="text-danger">*</span>
        </label>
        <div class="input-group has-validation">
            <input type="text" name="formacao" class="form-control" id="formacao" required value="{{ $user->formacao ?? old('formacao') }}">
            <div class="invalid-feedback">Verifica o nome inserido!</div>
        </div>
    </div>
    @isset($turmaDisciplinas)
        <div class="col-md-12 p-1">
            <label for="turma_disciplina_horario" class="form-label">
                <i class="bi bi-calendar-plus"></i>
                <span>Turma-Disciplina-Horário:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="turma_disciplina_horario[]" id="turma_disciplina_horario" class="form-control" multiple>
                @foreach ($turmaDisciplinas as $turmaDisciplina)
                    <option value="{{ $turmaDisciplina->id }}">{{ $turmaDisciplina->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
</div>

<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-professor">cadastra</span>
</button>
