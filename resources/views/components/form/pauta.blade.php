@php $numeroClasse = App\Enum\NumeroClasseEnum::list(); @endphp
<div class="row">
    <div class="col-md-4 p-1">
        <label for="mt1" class="form-label">
            <i class="bi bi-1-circle-fill"></i>
            <span>Média do 1 trimestre(mt1):</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="mt1" name="mt1" class="form-control"
            placeholder="" value="{{ $pauta->mt1 ?? old('mt1') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-4 p-1">
        <label for="mt2" class="form-label">
            <i class="bi bi-2-circle-fill"></i>
            <span>Média do 2 trimestre(mt2):</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="mt2" name="mt2" class="form-control"
            placeholder="" value="{{ $pauta->mt2 ?? old('mt2') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-4 p-1">
        <label for="mt3" class="form-label">
            <i class="bi bi-3-circle-fill"></i>
            <span>Média do trimestre(mt3):</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="mt3" name="mt3" class="form-control"
            placeholder="" value="{{ $pauta->mt3 ?? old('mt3') }}"
            @isset($disabled) disabled @endisset />
    </div>

    <div class="col-md-4 p-1">
        <label for="mf" class="form-label">
            <i class="bi bi-list-ol"></i>
            <span>Média Final da disciplina(mf):</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="mf" name="mf" class="form-control"
            placeholder="" value="{{ $pauta->mf ?? old('mf') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-4 p-1">
        <label for="exame" class="form-label">
            <i class="bi bi-list-ol"></i>
            <span>Exame:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="exame" name="exame" class="form-control"
            placeholder="" value="{{ $pauta->exame ?? old('exame') }}"
            @isset($disabled) disabled @endisset />
    </div>
    <div class="col-md-4 p-1">
        <label for="mfd" class="form-label">
            <i class="bi bi-list-ol"></i>
            <span>Média Final da disciplina(mfd):</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="number" min="0" max="20" id="mfd" name="mfd" class="form-control"
            placeholder="" value="{{ $pauta->mfd ?? old('mfd') }}"
            @isset($disabled) disabled @endisset />
    </div>

</div>
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-pauta">cadastra</span>
</button>
