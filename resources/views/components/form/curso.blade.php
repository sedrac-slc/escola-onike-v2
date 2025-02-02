<div class="row">
    <div class="col-md-6">
        <label for="nome" class="form-label">
            <span>Nome:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder=""
            value="{{ $curso->nome ?? old('nome') }}" @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-6 p-1">
        <label for="lectivo_ano" class="form-label" class="form-control">
            <span>Ano lectivo:</span>
            <span class="text-danger">*</span>
        </label>
        <input type="text" class="form-control" name="lectivo_ano" id="lectivo_ano" />
    </div>
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <span id="span-curso">cadastra</span>
</button>
