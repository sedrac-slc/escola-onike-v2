@php $funcao = App\Enum\FuncaoEnum::ALUNO; @endphp
<input type="hidden" name="funcao" value="{{ $funcao }}"/>
<div class="row">
    @include('components.parts.form-utilizador')
    @isset($classes)
        <div class="col-md-6 p-1">
            <label for="classe_id" class="form-label">
                <i class="bi bi-basket"></i>
                <span>Classes:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="classe_id" id="classe_id" class="form-control">
                @foreach ($classes as $classe)
                    <option value="{{ $classe->id }}"> {{ $classe->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-aluno">cadastra</span>
</button>
