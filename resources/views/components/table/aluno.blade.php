<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <span>Nome</span>
                </th>
                <th>
                    <span>BI</span>
                </th>
                <th>
                    <span>Email</span>
                </th>
                <th>
                    <span>Gênero</span>
                </th>
                <th>
                    <span>Aniversário</span>
                </th>
                <th colspan="2">
                    <span>Matrícula</span>
                </th>
                <th colspan="2">
                    <span>Acção</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->user->name }}</td>
                    <td>{{ $aluno->user->bilhete_identidade }}</td>
                    <td>{{ $aluno->user->email }}</td>
                    <td data-value={{ $aluno->user->genero }}>{{ $aluno->user->genero() }}</td>
                    <td>{{ $aluno->user->data_nascimento }}</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm rounded-pill btn-aluno-matricula"
                            data-bs-toggle="modal" data-bs-target="#modalMatriculaForm" data-aluno="{{ $aluno->id }}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        @php $count =  $aluno->matriculas->count(); @endphp
                        <button
                            class="btn btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-aluno-matricula-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalMatriculaList" data-url="{{ route('aluno-matricula.ajaxturma', $aluno->id) }}" data-aluno="{{ $aluno->id }}" @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('alunos.destroy', $aluno->user->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('alunos.update', $aluno->user->id) }}">
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
<div class="pagination mt-3">
    {{ $alunos->links() }}
</div>
