<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-123"></i>
                        <span>Número</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar-check"></i>
                        <span>Data inicio</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar-x"></i>
                        <span>Data termino</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-123"></i>
                        <span>Notas</span>
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
            @foreach ($trimestres as $trimestre)
                <tr>
                    <td data-value={{ $trimestre->numero }}>{{ $trimestre->numero() }}</td>
                    <td>{{ $trimestre->data_inicio }}</td>
                    <td>{{ $trimestre->data_termino }}</td>
                    <td>
                        @php $count =  $trimestre->notas->count(); @endphp
                        <button class="btn btn-outline-info btn-sm rounded-pill @if($count > 0) btn-nota-trimestre-list @endif" type="button"
                            @if($count > 0)  data-bs-toggle="modal" data-bs-target="#modalTrimestreNotaList" data-url="{{ route('trimestre-nota.ajaxTrimestreNota', $trimestre->id) }}" @else disabled @endif
                        >
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('trimestres.destroy', $trimestre->id) }}">
                            <i class="bi bi-trash"></i>
                            <span>eliminar</span>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('trimestres.update', $trimestre->id) }}">
                            <i class="bi bi-pencil-square"></i>
                            <span>editar</span>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="pag">
    {{ $trimestres->links() }}
</div>
