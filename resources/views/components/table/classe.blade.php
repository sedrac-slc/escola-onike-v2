<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar-plus"></i>
                        <span>Curso</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-archive"></i>
                        <span>Turmas</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar-check"></i>
                        <span>Número de classe</span>
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
                    <td data-value={{ $classe->curso_id }}>{{ $classe->curso->text() }}</td>
                    <td data-value={{ $classe->turma_id }}>{{ $classe->turma->text() }}</td>
                    <td data-value={{ $classe->num_classe }}>{{ $classe->numeroClasse() }}</td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('classes.destroy', $classe->id) }}">
                            <i class="bi bi-trash"></i>
                            <span>eliminar</span>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('classes.update', $classe->id) }}">
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
    {{ $classes->links() }}
</div>
