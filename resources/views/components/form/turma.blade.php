<div class="row">
    @isset($cursos)
        <div class="col-md-6 p-1">
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
    @isset($periodos)
        <div class="col-md-6 p-1">
            <label for="periodo" class="form-label">
                <i class="bi bi-brightness-high"></i>
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
    @isset($anoCurricular)
        <div class="col-md-6 p-1">
            <label for="ano_curricular" class="form-label">
                <i class="bi bi-1-circle"></i>
                <span>Ano curricular:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="ano_curricular" id="ano_curricular" class="form-control">
                @foreach ($anoCurricular as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    @endisset
    <div class="col-md-6 p-1">
        <label for="ano_lectivo" class="form-label" class="form-control">
            <i class="bi bi-123"></i>
            <span>Ano lectivo:</span>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="ano_lectivo" id="ano_lectivo" />
    </div>
    <div class="col-md-6 p-1">
        <label for="sala" class="form-label" class="form-control">
            <i class="bi bi-1-circle"></i>
            <span>Sala:</span>
            <span class="text-danger">*</span>
        </label>
        <input type="number" class="form-control" name="sala" id="sala" min="0" max="100" />
    </div>
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-turma">cadastra</span>
</button>
