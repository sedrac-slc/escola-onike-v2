@php $funcao = App\Enum\FuncaoEnum::ALUNO; @endphp
<input type="hidden" name="funcao" value="{{ $funcao }}"/>
<div class="row">
    @include('components.parts.form-utilizador')
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-aluno">cadastra</span>
</button>
