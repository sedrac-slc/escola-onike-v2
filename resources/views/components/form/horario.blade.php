@php $dia_semanas = App\Enum\DiaSemanaEnum::list(); @endphp
@php $disciplines = App\Models\Disciplina::get(); @endphp
@php $periodos = App\Enum\PeriodoEnum::list(); @endphp
@php $cursos = App\Models\Curso::get(); @endphp

<div class="row">
    <div class="col-md-6 p-1">
        <label for="curso_id" class="form-label" class="form-control">
            <span>Curso:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <select id="curso_id" name="curso_id" class="form-control" value="{{ $horario->curso_id ?? old('curso_id') }}">
            @foreach ($cursos as $curso)
                <option value="{{$curso->id}}">{{$curso->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 p-1">
        <label for="disciplina_id" class="form-label" class="form-control">
            <span>Disciplina:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <select id="disciplina_id" name="disciplina_id" class="form-control" value="{{ $horario->discipline_id ?? old('disciplina_id') }}">
            @foreach ($disciplines as $discipline)
                <option value="{{$discipline->id}}">{{$discipline->nome}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-6 p-1">
        <label for="hora_inicio" class="form-label" class="form-control">
            <span>Hora inicio:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="time" id="hora_inicio" name="hora_inicio" class="form-control"
            value="{{ $horario->hora_inicio ?? old('hora_inicio') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-6 p-1">
        <label for="hora_termino" class="form-label" class="form-control">
            <span>Hora termino:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="time" id="hora_termino" name="hora_termino" class="form-control"
            value="{{ $horario->hora_termino ?? old('hora_termino') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-6 p-1">
        <label for="dia_semana" class="form-label">
            <span>Dia da semana:</span>
            <span class="text-danger">*</span>
        </label>
        <select name="dia_semana" id="dia_semana" class="form-control">
            @foreach ($dia_semanas as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
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
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-horario">cadastra</span>
</button>
