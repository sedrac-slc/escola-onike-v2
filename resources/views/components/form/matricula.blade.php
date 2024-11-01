@php $numeroClasse = App\Enum\NumeroClasseEnum::list(); @endphp
<div class="row">
    <div class="col-md-6">
        <label for="nome" class="form-label">
            <i class="bi bi-key"></i>
            <span>Aluno:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder=""
            value="{{ $curso->nome ?? old('nome') }}" @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-6 ">
        <label for="num_classe" class="form-label">
            <i class="bi bi-collection"></i>
            <span>Turma:</span>
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
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-curso">cadastra</span>
</button>
