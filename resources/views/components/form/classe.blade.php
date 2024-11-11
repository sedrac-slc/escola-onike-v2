@php $numeroClasse = App\Enum\NumeroClasseEnum::list(); @endphp
<div class="row">
    @isset($cursos)
        <div class="col-md-12 p-1">
            <label for="curso_id" class="form-label">
                <i class="bi bi-calendar-plus"></i>
                <span>Curso:</span>
                <span class="text-danger">*</span>
            </label>
            <select name="curso_id" id="curso_id" class="form-control">
                <option disabled class="text-muted" selected>seleciona o curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}" data-url="{{ route('turmas.ajaxturma', $curso->id) }}">
                        {{ $curso->text() }}
                    </option>
                @endforeach
            </select>
        </div>
    @endisset
    <div class="col-md-12 p-1">
        <label for="turma_id" class="form-label">
            <i class="bi bi-archive"></i>
            <span>Turma:</span>
            <span class="text-danger">*</span>
        </label>
        <select name="turma_id" id="turma_id" class="form-control" disabled>
            @isset($turmas)
                @foreach ($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->text() }}</option>
                @endforeach
            @endisset
        </select>
    </div>
    <div class="col-md-12 p-1">
        <label for="numero_classe" class="form-label">
            <i class="bi bi-collection"></i>
            <span>Número da classe:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <select id="numero_classe" name="numero_classe" class="form-control"
            @isset($disabled) disabled @endisset>
            @foreach ($numeroClasse as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-classe">cadastra</span>
</button>
