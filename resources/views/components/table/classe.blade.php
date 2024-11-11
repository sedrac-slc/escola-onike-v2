<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-collection"></i>
                        <span>Curso</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-archive"></i>
                        <span>Turma</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-archive"></i>
                        <span>Número classe</span>
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
            @foreach ($classes as $classe)
                <tr>
                    <td data-value={{ $classe->curso_id }}>{{ $classe->curso->nome }}</td>
                    <td data-value={{ $classe->turma_id }}>{{ $classe->turma->text() }}</td>
                    <td data-value={{ $classe->numero_classe }}>{{ $classe->numero_classe }}</td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('classes.destroy', $classe->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('classes.update', $classe->id) }}"
                            data-url="{{ route('turmas.ajaxturma', $classe->curso_id) }}"
                            data-classe="{{ $classe->turma_id }}"
                        >

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
    {{ $classes->links() }}
</div>
