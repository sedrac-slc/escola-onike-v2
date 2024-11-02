<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-people"></i>
                        <span>Aluno</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi-calendar-plus"></i>
                        <span>Curso</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar"></i>
                        <span>Ano lectivo</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-3-circle"></i>
                        <span>Classe</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-brightness-high"></i>
                        <span>Periodo</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-1-circle"></i>
                        <span>Sala</span>
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
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('matriculas.destroy', $matricula->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('matriculas.update', $matricula->id) }}"
                            data-aluno="{{ $matricula->aluno_id }}" data-turma="{{ $matricula->turma_id }}">
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
    {{ $matriculas->links() }}
</div>
