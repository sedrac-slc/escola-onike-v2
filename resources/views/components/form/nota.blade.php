@php $numeroClasse = App\Enum\NumeroClasseEnum::list(); @endphp
<div class="row">
    @isset($alunos)
        <div class="col-md-6 p-1">
            <label for="aluno_id" class="form-label">
                <i class="bi bi-person"></i>
                <span>Alunos:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="aluno_id" id="aluno_id" class="form-control">
                @foreach ($alunos as $aluno)
                    <option value="{{ $aluno->id }}"> {{ $aluno->user->name }}</option>
                @endforeach
            </select>
        </div>
    @endisset
    @isset($pautas)
        <div class="col-md-6 p-1">
            <label for="pauta_id" class="form-label">
                <i class="bi bi-basket"></i>
                <span>Pauta:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="pauta_id" id="pauta_id" class="form-control">
                @foreach ($pautas as $pauta)
                    <option value="{{ $pauta->id }}"> {{ $pauta->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
    @isset($trimestres)
        <div class="col-md-6 p-1">
            <label for="trimestre_id" class="form-label">
                <i class="bi bi-calendar"></i>
                <span>Trimestre:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="trimestre_id" id="trimestre_id" class="form-control">
                @foreach ($trimestres as $trimestre)
                    <option value="{{ $trimestre->id }}"> {{ $trimestre->data_inicio.' à '. $trimestre->data_termino }}</option>
                @endforeach
            </select>
        </div>
    @endisset
    @isset($disciplinas)
        <div class="col-md-6 p-1">
            <label for="disciplina_id" class="form-label">
                <i class="bi bi-book"></i>
                <span>Turma:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="disciplina_id" id="disciplina_id" class="form-control">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}"> {{ $disciplina->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset

    <div class="col-md-4 p-1">
        <label for="mac" class="form-label">
            <i class="bi bi-list-ol"></i>
            <span>Média da Avaliação continua(MAC):</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="mac" name="mac" class="form-control" placeholder=""  value="{{ $nota->mac ?? old('mac') }}" @isset($disabled) disabled @endisset />
    </div>

    <div class="col-md-4 p-1">
        <label for="npp" class="form-label">
            <i class="bi bi-list-ol"></i>
            <span>Nota da prova do professor(NPP):</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="npp" name="npp" class="form-control" placeholder="" value="{{ $nota->npp ?? old('npp') }}" @isset($disabled) disabled @endisset />
    </div>

    <div class="col-md-4 p-1">
        <label for="npt" class="form-label">
            <i class="bi bi-list-ol"></i>
            <span>Nota da prova trimestral(NPT):</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="npt" name="npt" class="form-control" placeholder="" value="{{ $nota->npt ?? old('npt') }}" @isset($disabled) disabled @endisset />
    </div>

</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-nota">cadastra</span>
</button>
