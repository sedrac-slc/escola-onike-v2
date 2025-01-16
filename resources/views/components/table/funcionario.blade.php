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
                <th>
                    <span>Função</span>
                </th>
                <th colspan="2">
                    <span>Acção</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->user->name }}</td>
                    <td>{{ $funcionario->user->email }}</td>
                    <td>{{ $funcionario->user->bilhete_identidade }}</td>
                    <td data-value={{ $funcionario->user->genero }}>{{ $funcionario->user->genero() }}</td>
                    <td>{{ $funcionario->user->data_nascimento }}</td>
                    <td>{{ $funcionario->user->funcao() }}</td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete"
                            data-del="{{ route('funcionarios.destroy', $funcionario->user->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne"
                            data-up="{{ route('funcionarios.update', $funcionario->user->id) }}">
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
    {{ $funcionarios->links() }}
</div>
