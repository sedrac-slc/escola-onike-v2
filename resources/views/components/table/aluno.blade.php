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
                <th colspan="2">
                    <div class="th-icone">
                        <i class="bi bi-book"></i>
                        <span>Matrícula</span>
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
                    <td>{{ $aluno->user->bilhete_identidade }}</td>
                    <td>{{ $aluno->user->email }}</td>
                    <td data-value={{ $aluno->user->genero }}>{{ $aluno->user->genero() }}</td>
                    <td>{{ $aluno->user->data_nascimento }}</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm rounded-pill btn-aluno-matricula" data-bs-toggle="modal"
                        data-bs-target="#modalMatriculaForm" data-aluno="{{$aluno->id}}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        @php $count =  $aluno->matriculas->count(); @endphp
                        <button class="btn btn-outline-info btn-sm rounded-pill @if($count > 0) btn-aluno-matricula-list  @endif" type="button"
                            @if($count > 0)  data-bs-toggle="modal" data-bs-target="#modalMatriculaList" data-url="{{ route('aluno-matricula.ajaxturma', $aluno->id) }}" data-aluno="{{$aluno->id}}" @endif
                        >
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
