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
                    <span>Curso</span>
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
            @foreach ($coordenadores as $coordenador)
                <tr>
                    <td>{{ $coordenador->user->name }}</td>
                    <td>{{ $coordenador->user->email }}</td>
                    <td>{{ $coordenador->user->bilhete_identidade }}</td>
                    <td data-value={{ $coordenador->user->genero }}>{{ $coordenador->user->genero() }}</td>
                    <td>{{ $coordenador->user->data_nascimento }}</td>
                    <td>
                        @php $count =  $coordenador->cursos->count(); @endphp
                        <button
                            class="btn btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-coordenador-curso-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorarioList" data-url="{{ route('coordenador-curso.ajaxCoordenadorCursos', $coordenador->id) }}" data-coordenador="{{ $coordenador->id }}" @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete"
                            data-del="{{ route('coordenador-curso.destroy', $coordenador->user->id) }}">
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
                            data-up="{{ route('coordenador-curso.update', $coordenador->user->id) }}">
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
    {{ $coordenadores->links() }}
</div>
