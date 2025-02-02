<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <span>Curso</span>
                </th>
                <th>
                    <span>Classe</span>
                </th>
                <th>
                    <span>Ano lectivo</span>
                </th>
                <th>
                    <span>Periodo</span>
                </th>
                <th>
                    <span>Sala</span>
                </th>
                <th colspan="2">
                    <span>Alunos</span>
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
            @foreach ($turmas as $turma)
                <tr>
                    <td data-value={{ $turma->curso_id }}>{{ $turma->curso->text() }}</td>
                    <td data-value={{ $turma->classe->id }}>{{ $turma->classe->numeroClasse() }}</td>
                    <td>{{ $turma->curso->lectivo_ano }}</td>
                    <td data-value={{ $turma->periodo }}>{{ $turma->periodo() }}</td>
                    <td>{{ $turma->sala }}</td>
                    <td>
                        <a href="#" class="btn btn-outline-primary btn-sm rounded-pill btn-turma-matricula"
                            data-bs-toggle="modal" data-bs-target="#modalMatriculaForm" data-turma="{{ $turma->id }}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        @php $count =  $turma->alunos->count(); @endphp
                        <a href="#"
                            class="btn btn-sm btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-turma-aluno-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalTurmaAlunoList" data-url="{{ route('turma.ajaxaluno', $turma->id) }}" data-turma="{{ $turma->id }}" @else disabled @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-primary btn-sm rounded-pill btn-curso-disciplina-horario"
                            data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorario"
                            data-turma="{{ $turma->id }}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        @php $count =  $turma->disciplinas->count(); @endphp
                        <a href="#"
                            class="btn btn-sm btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-curso-disciplina-horario-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorarioList" data-url="{{ route('turma-disciplina-horario.ajaxcurso', $turma->id) }}" @else disabled @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-danger btn-sm rounded-pill btn-del"
                            data-bs-toggle="modal" data-bs-target="#modalDelete"
                            data-del="{{ route('turmas.destroy', $turma->id) }}">
                            <i class="bi bi-trash"></i>
                            <span>eliminar</span>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-outline-warning btn-sm rounded-pill btn-up"
                            type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                            aria-expanded="false" aria-controls="flush-collapseOne"
                            data-up="{{ route('turmas.update', $turma->id) }}">
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
    {{ $turmas->links() }}
</div>
