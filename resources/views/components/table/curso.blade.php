<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <span>Nome</span>
                </th>
                <th>
                    <span>Ano lectivo</span>
                </th>
                <th>
                    <span>Horáro</span>
                </th>
                <th>
                    <span>Aluno</span>
                </th>
                <th>
                    <span>Turma</span>
                </th>
                <th colspan="2">
                    <span>Acção</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->lectivo_ano ?? '-' }}</td>
                    <td>
                        <a target="_blank" href="{{ route('curso.horario-pdf', $curso->id) }}" class="btn btn-outline-success btn-sm rounded-pill">
                            <i class="bi bi-file-earmark-pdf"></i>
                            <span>PDF</span>
                        </a>
                    </td>
                    <td class="">
                        <a href="#" class="btn btn-outline-info btn-sm rounded-pill btn-curso-aluno-list"
                            type="button" data-bs-toggle="modal" data-bs-target="#modalCursoAlunoList"
                            data-url="{{ route('aluno.ajaxcurso', $curso->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar</span>
                            </div>
                        </a>
                    </td>

                    <td class="">
                        @php $count =  $curso->turmas->count(); @endphp
                        <a href="#"
                            class="btn btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-turma-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalCursoTurmaList" data-url="{{ route('turmas.ajaxturma', $curso->id) }}" @else disabled @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('cursos.destroy', $curso->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('cursos.update', $curso->id) }}">
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
    {{ $cursos->links() }}
</div>
