<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-person"></i>
                        <span>Nome</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-person-vcard"></i>
                        <span>BI</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-envelope"></i>
                        <span>Email</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-gender-ambiguous"></i>
                        <span>Gênero</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar"></i>
                        <span>Aniversário</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-basket"></i>
                        <span>Classe</span>
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
            @foreach ($alunos as $aluno)
                <tr>
                    <td>{{ $aluno->user->name }}</td>
                    <td>{{ $aluno->user->email }}</td>
                    <td>{{ $aluno->user->bilhete_identidade }}</td>
                    <td data-value={{ $aluno->user->genero }}>{{ $aluno->user->genero() }}</td>
                    <td>{{ $aluno->user->data_nascimento }}</td>
                    <td data-value={{ $aluno->classe_id }}>{{ $aluno->classe->text() }}</td>
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
