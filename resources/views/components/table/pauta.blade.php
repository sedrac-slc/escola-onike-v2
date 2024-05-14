<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-1-circle-fill"></i>
                        <span>MT1</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-2-circle-fill"></i>
                        <span>MT2</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-3-circle-fill"></i>
                        <span>MT3</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-collection"></i>
                        <span>MF</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-collection"></i>
                        <span>Exame</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-collection"></i>
                        <span>MFD</span>
                    </div>
                </th>
                <th colspan="2">
                    <div class="th-icone">
                        <i class="bi bi-tools"></i>
                        <span>Acção</span>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pautas as $pauta)
                <tr>
                    <td>{{ $pauta->mt1 }}</td>
                    <td>{{ $pauta->mt2 }}</td>
                    <td>{{ $pauta->mt3 }}</td>
                    <td>{{ $pauta->mf }}</td>
                    <td>{{ $pauta->exame }}</td>
                    <td>{{ $pauta->mfd }}</td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('pautas.destroy', $pauta->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('pautas.update', $pauta->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>editar</span>
                            </div>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="pag">
    {{ $pautas->links() }}
</div>
