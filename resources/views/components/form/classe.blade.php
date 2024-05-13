<div class="row">
    @isset($cursos)
        <div class="col-md-6 p-2">
            <label for="curso_id" class="form-label">
                <i class="bi bi-calendar-plus"></i>
                <span>Curso:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="curso_id" id="curso_id" class="form-control">
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
    @isset($turmas)
        <div class="col-md-6 p-2">
            <label for="periodo" class="form-label">
                <i class="bi bi-archive"></i>
                <span>Turma:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="turma_id" id="turma_id" class="form-control">
                @foreach ($turmas as $turma)
                    <option value="{{ $turma->id }}"> {{ $turma->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
    @isset($numeroClasse)
        <div class="col-md-6 p-2">
            <label for="num_classe" class="form-label">
                <i class="bi bi-collection"></i>
                <span>Número da classe:</span>
                @if (!isset($require))
                    <span class="text-danger">*</span>
                @endif
            </label>
            <select id="num_classe" name="num_classe" class="form-control"
                @isset($disabled) disabled @endisset>
                @foreach ($numeroClasse as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    @endisset
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-classe">cadastra</span>
</button>
