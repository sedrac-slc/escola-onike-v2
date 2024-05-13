@php $funcao = App\Enum\FuncaoEnum::PROFESSOR; @endphp
<input type="hidden" name="funcao" value="{{ $funcao }}"/>
<div class="row">
    @include('components.parts.form-utilizador')
    @isset($funcoes)
        <div class="col-md-6 p-1">
            <label  for="funcao" class="form-label">
                <i class="bi bi-book"></i>
                <span>Funções:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="funcao" id="funcao" class="form-control">
                @foreach ($funcoes as $key => $value)
                    <option value="{{ $key }}"> {{ $value }}</option>
                @endforeach
            </select>
        </div>
    @endisset
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-funcionario">cadastra</span>
</button>
