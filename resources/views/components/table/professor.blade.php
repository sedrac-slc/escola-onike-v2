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
                        <i class="bi bi-calendar-plues"></i>
                        <span>Formação</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-book"></i>
                        <span>Disciplina</span>
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
            @foreach ($professores as $professor)
                <tr>
                    <td>{{ $professor->user->name }}</td>
                    <td>{{ $professor->user->email }}</td>
                    <td>{{ $professor->user->bilhete_identidade }}</td>
                    <td data-value={{ $professor->user->genero }}>{{ $professor->user->genero() }}</td>
                    <td>{{ $professor->user->data_nascimento }}</td>
                    <td>{{ $professor->formacao }}</td>
                    <td>
                        @php $count =  $professor->leciona->count(); @endphp
                        <button
                            class="btn btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-curso-disciplina-horario-list @endif" type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorarioList" data-url="{{ route('curso-disciplina-horario.ajaxprofessor', $professor->id) }}" data-professor="{{ $professor->id }}" @endif>
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
