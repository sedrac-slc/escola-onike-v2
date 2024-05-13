<div class="row">
    <div class="col-md-6 @isset($inline) inline @endisset">
        <label for="nome" class="form-label">
            <i class="bi bi-key"></i>
            <span>Nome:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder=""
            value="{{ $curso->nome ?? old('nome') }}" @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-6 @isset($inline) inline @endisset">
        <label for="num_classe" class="form-label">
            <i class="bi bi-collection"></i>
            <span>Número da classe:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        @php $classes = ["7","8","9","10","11","12","13"]; @endphp
        <select id="num_classe" name="num_classe" class="form-control"
            @isset($disabled) disabled @endisset>
            @foreach ($classes as $class)
                <option value="{{ $class }}"
                    @isset($curso)   @if ($curso->num_classe == $class) selected @endif @endisset>
                    {{ $class }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-curso">cadastra</span>
</button>
