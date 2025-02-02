<div class="row">
    @isset($cursos)
        <div class="col-md-6 p-1">
            <label for="curso_id" class="form-label">
                <span>Curso:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="curso_id" id="curso_id" class="form-control">
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->textLective() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
    @isset($periodos)
        <div class="col-md-6 p-1">
            <label for="periodo" class="form-label">
                <span>Periodo:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="periodo" id="periodo" class="form-control">
                @foreach ($periodos as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    @endisset
    <div class="col-md-6 p-1">
        <label for="classe_id" class="form-label">
            <span>Classe:</span>
            <span class="text-danger">*</span>
        </label>
        <select name="classe_id" id="classe_id" class="form-control">
        </select>
    </div>
    <div class="col-md-6 p-1 d-none">
        <label for="ano_lectivo" class="form-label" class="form-control">
            <span>Ano lectivo:</span>
        </label>
        <input type="text" class="form-control" name="ano_lectivo" id="ano_lectivo" disabled/>
    </div>
    <div class="col-md-6 p-1">
        <label for="sala" class="form-label" class="form-control">
            <span>Sala:</span>
            <span class="text-danger">*</span>
        </label>
        <input type="number" class="form-control" name="sala" id="sala" min="0" max="100" />
    </div>
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <span id="span-turma">cadastra</span>
</button>
