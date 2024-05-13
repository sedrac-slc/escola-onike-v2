<div class="row">
    @isset($turmas)
        <div class="col-md-6">
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
    @isset($dia_semanas)
        <div class="col-md-6">
            <label for="dia_semana" class="form-label">
                <i class="bi bi-brightness-high"></i>
                <span>Dia da semana:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="dia_semana" id="dia_semana" class="form-control">
                @foreach ($dia_semanas as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
    @endisset
</div>
<div class="row mt-2">
    <div class="col-md-6  @isset($inline) inline @endisset">
        <label for="hora_inicio" class="form-label" class="form-control">
            <i class="bi bi-calendar-check"></i>
            <span>Hora inicio:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="time" id="hora_inicio" name="hora_inicio" class="form-control"
            value="{{ $trimestre->hora_inicio ?? old('hora_inicio') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-6  @isset($inline) inline @endisset">
        <label for="hora_termino" class="form-label" class="form-control">
            <i class="bi bi-calendar-x"></i>
            <span>Hora termino:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="time" id="hora_termino" name="hora_termino" class="form-control"
            value="{{ $trimestre->hora_termino ?? old('hora_termino') }}"
            @isset($disabled) disabled @endisset />
    </div>
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-horario">cadastra</span>
</button>
