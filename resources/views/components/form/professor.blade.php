@php $funcao = App\Enum\FuncaoEnum::PROFESSOR; @endphp
<input type="hidden" name="funcao" value="{{ $funcao }}"/>
<div class="row">
    @include('components.parts.form-utilizador')
    @isset($disciplinas)
        <div class="col-md-6 p-1">
            <label  for="disciplinas" class="form-label">
                <i class="bi bi-book"></i>
                <span>Disciplina:</span>
                <span class="text-danger">*</span>
                {{-- <input mbsc-input id="disciplina-lab" placeholder="Escolha as disicplinas..." data-dropdown="true" data-input-style="outline" data-label-style="stacked" data-tags="true" /> --}}
            </label>
            <select name="disciplinas[]" id="disciplinas" class="form-control" data-mdb-select-init multiple>
                @foreach ($disciplinas as $disciplina)
                    <option value="{{ $disciplina->id }}"> {{ $disciplina->nome .'| horario:'. $disciplina->horario->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-professor">cadastra</span>
</button>
