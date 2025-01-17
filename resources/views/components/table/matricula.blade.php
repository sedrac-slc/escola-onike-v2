<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <span>Aluno</span>
                </th>
                <th>
                    <span>Curso</span>
                </th>
                <th>
                    <span>Ano lectivo</span>
                </th>
                <th>
                    <span>Classe</span>
                </th>
                <th>
                    <span>Periodo</span>
                </th>
                <th>
                    <span>Sala</span>
                </th>
                <th colspan="2">
                    <span>Acção</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matriculas as $matricula)
                <tr>
                    <td data-value={{ $matricula->aluno_id }}>{{ $matricula->aluno->user->name }}</td>
                    <td>{{ $matricula->turma->curso->nome }}</td>
                    <td>{{ $matricula->turma->ano_lectivo }}</td>
                    <td data-value={{ $matricula->turma->ano_curricular }}>
                        {{ $matricula->turma->ano_curricular() }}</td>
                    <td data-value={{ $matricula->turma->periodo }}>
                        {{ $matricula->turma->periodo() }}
                    </td>
                    <td>{{ $matricula->turma->sala }}</td>
                    <td>
                        <a href="#" class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('matriculas.destroy', $matricula->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne"
                            data-up="{{ route('matriculas.update', $matricula->id) }}"
                            data-aluno="{{ $matricula->aluno_id }}" data-turma="{{ $matricula->turma_id }}">
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
    {{ $matriculas->links() }}
</div>
