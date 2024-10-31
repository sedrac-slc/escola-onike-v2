<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar-plus"></i>
                        <span>Curso</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar"></i>
                        <span>Ano lectivo</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-brightness-high"></i>
                        <span>Periodo</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-1-circle"></i>
                        <span>Sala</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-3-circle"></i>
                        <span>Ano curricular</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-people"></i>
                        <span>Alunos</span>
                    </div>
                </th>
                <th colspan="2">
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
            @foreach ($turmas as $turma)
                <tr>
                    <td data-value={{ $turma->curso_id }}>{{ $turma->curso->text() }}</td>
                    <td>{{ $turma->ano_lectivo }}</td>
                    <td data-value={{ $turma->periodo }}>{{ $turma->periodo() }}</td>
                    <td>{{ $turma->sala }}</td>
                    <td data-value={{ $turma->ano_curricular }}>{{ $turma->ano_curricular() }}</td>
                    <td>
                        @php $count =  $turma->alunos->count(); @endphp
                        <button class="btn btn-sm btn-outline-info btn-sm rounded-pill @if($count > 0)  btn-turma-aluno-list @endif" type="button"
                            @if($count > 0)  data-bs-toggle="modal" data-bs-target="#modalTurmaAlunoList" data-url="{{ route('turma.ajaxaluno', $turma->id) }}" @else disabled @endif
                        >
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary btn-sm rounded-pill btn-curso-disciplina-horario" data-bs-toggle="modal"
                        data-bs-target="#modalCursoDisciplinaHorario" data-turma="{{$turma->id}}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        @php $count =  $turma->disciplinas->count(); @endphp
                        <button class="btn btn-sm btn-outline-info btn-sm rounded-pill @if($count > 0) btn-curso-disciplina-horario-list @endif" type="button"
                            @if($count > 0)  data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorarioList" data-url="{{ route('turma-disciplina-horario.ajaxcurso', $turma->id) }}" @else disabled @endif
                        >
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('turmas.destroy', $turma->id) }}">
                            <i class="bi bi-trash"></i>
                            <span>eliminar</span>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('turmas.update', $turma->id) }}">
                            <i class="bi bi-pencil-square"></i>
                            <span>editar</span>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="pag">
    {{ $turmas->links() }}
</div>
