<div class="row">
    <div class="col-md-6  @isset($inline) inline @endisset">
        <label for="data_inicio" class="form-label" class="form-control">
            <span>Data inicio:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="date" id="data_inicio" name="data_inicio" class="form-control"
            value="{{ $trimestre->data_inicio ?? old('data_inicio') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-6  @isset($inline) inline @endisset">
        <label for="data_termino" class="form-label" class="form-control">
            <span>Data termino:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="date" id="data_termino" name="data_termino" class="form-control"
            value="{{ $trimestre->data_termino ?? old('data_termino') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-6 ">
        <label for="numero" class="form-label">
            <span>Número:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <select id="numero" name="numero" class="form-control"
            @isset($disabled) disabled @endisset>
            @foreach ($numeros as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <span id="span-trimestre">cadastra</span>
</button>
