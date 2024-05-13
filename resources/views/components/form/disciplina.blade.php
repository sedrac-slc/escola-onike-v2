<div class="row">
    <div class="col-md-6">
        <label for="nome" class="form-label">
            <i class="bi bi-key"></i>
            <span>Nome:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder=""
            value="{{ $disciplina->nome ?? old('nome') }}" @isset($disabled) disabled @endisset />
    </div>
    @isset($horarios)
        <div class="col-md-6">
            <label for="periodo" class="form-label">
                <i class="bi bi-person-lines-fill"></i>
                <span>Horários:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="horario_id" id="horario_id" class="form-control">
                @foreach ($horarios as $horario)
                    <option value="{{ $horario->id }}"> {{ $horario->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-disciplina">cadastra</span>
</button>
