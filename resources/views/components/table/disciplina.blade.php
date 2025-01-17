<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <span>Nome</span>
                </th>
                <th colspan="2">
                    <span>Professor</span>
                </th>
                <th colspan="2">
                    <span>Curso</span>
                </th>
                <th colspan="2">
                    <span>Acção</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->nome }}</td>
                    <td>
                        <a href="#"
                            class="btn btn-outline-primary btn-sm rounded-pill btn-professor-disciplina-horario"
                            data-bs-toggle="modal" data-bs-target="#modalProfessorDisciplinaHorario"
                            data-disciplina="{{ $disciplina->id }}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        @php $count =  countDisciplina($disciplina->id); @endphp
                        <a href="#"
                            class="btn btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-professor-disciplina-horario-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalProfessorDisciplinaHorarioList" data-url="{{ route('turma-disciplina-horario.ajaxDisciplinaProfessor', $disciplina->id) }}" @else disabled @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#"
                            class="btn btn-outline-primary btn-sm rounded-pill btn-curso-disciplina-horario"
                            data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorario"
                            data-disciplina="{{ $disciplina->id }}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        @php $count =  $disciplina->turmas->count(); @endphp
                        <a href="#"
                            class="btn btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-curso-disciplina-horario-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorarioList" data-url="{{ route('turma-disciplina-horario.ajaxdisciplina', $disciplina->id) }}" @else disabled @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-danger btn-sm rounded-pill btn-del"
                            data-bs-toggle="modal" data-bs-target="#modalDelete"
                            data-del="{{ route('disciplinas.destroy', $disciplina->id) }}">
                            <i class="bi bi-trash"></i>
                            <span>eliminar</span>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne"
                            data-up="{{ route('disciplinas.update', $disciplina->id) }}">
                            <i class="bi bi-pencil-square"></i>
                            <span>editar</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="pag">
    {{ $disciplinas->links() }}
</div>
