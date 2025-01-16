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
                    <span>Formação</span>
                </th>
                <th colspan="2">
                    <span>Disciplina</span>
                </th>
                <th colspan="2">
                    <span>Acção</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professores as $professor)
                <tr>
                    <td>{{ $professor->user->name }}</td>
                    <td>{{ $professor->user->email }}</td>
                    <td>{{ $professor->user->bilhete_identidade }}</td>
                    <td data-value={{ $professor->user->genero }}>{{ $professor->user->genero() }}</td>
                    <td>{{ $professor->user->data_nascimento }}</td>
                    <td>{{ $professor->formacao }}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary btn-sm rounded-pill btn-curso-disciplina-horario"
                            data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorario"
                            data-professor="{{ $professor->id }}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        @php $count =  $professor->leciona->count(); @endphp
                        <button
                            class="btn btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-curso-disciplina-horario-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorarioList" data-url="{{ route('turma-disciplina-horario.ajaxprofessor', $professor->id) }}" data-professor="{{ $professor->id }}" @else disabled @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete"
                            data-del="{{ route('professores.destroy', $professor->user->id) }}">
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
                            data-up="{{ route('professores.update', $professor->user->id) }}">
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
    {{ $professores->links() }}
</div>
