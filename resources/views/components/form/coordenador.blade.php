@php $funcao = App\Enum\FuncaoEnum::COORDENADOR_CURSO; @endphp
<input type="hidden" name="funcao" value="{{ $funcao }}"/>
<div class="row">
    @include('components.parts.form-utilizador')
    @isset($cursos)
        <div class="col-md-6 p-1">
            <label for="curso_id" class="form-label">
                <i class="bi bi-calendar-plus"></i>
                <span>Curso:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="cursos[]" id="curso_id" class="form-control" multiple>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->text() }}</option>
                @endforeach
            </select>
        </div>
    @endisset
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-coordenador">cadastra</span>
</button>
