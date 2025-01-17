<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <span>Curso</span>
                </th>
                <th>
                    <span>Número classe</span>
                </th>
                <th colspan="2">
                    <span>Acção</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $classe)
                <tr>
                    <td data-value={{ $classe->curso_id }}>{{ $classe->curso->nome }}</td>
                    <td data-value={{ $classe->num_classe }}>{{ $classe->numeroClasse() }}</td>
                    <td>
                        <a href="#" class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('classes.destroy', $classe->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('classes.update', $classe->id) }}"
                            data-url="{{ route('turmas.ajaxturma', $classe->curso_id) }}"
                            data-classe="{{ $classe->turma_id }}">
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>editar</span>
                            </div>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="pag">
    {{ $classes->links() }}
</div>
