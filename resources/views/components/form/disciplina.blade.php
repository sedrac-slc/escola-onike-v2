<div class="row">
    <div class="col-md-12">
        <label for="nome" class="form-label">
            <span>Nome:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder=""
            value="{{ $disciplina->nome ?? old('nome') }}" @isset($disabled) disabled @endisset />
    </div>
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <span id="span-disciplina">cadastra</span>
</button>
