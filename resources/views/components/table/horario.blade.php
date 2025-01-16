<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <span>Dia semana</span>
                </th>
                <th>
                    <span>Curso</span>
                </th>
                <th>
                    <span>Disciplina</span>
                </th>
                <th>
                    <span>Periódo</span>
                </th>
                <th>
                    <span>Inicio</span>
                </th>
                <th>
                    <span>Termino</span>
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
            @foreach ($horarios as $horario)
                <tr>
                    <td data-value={{ $horario->dia_semana }}>{{ $horario->diaSemana() }}</td>
                    <td>{{ $horario->curso->nome }}</td>
                    <td>{{ $horario->disciplina->nome }}</td>
                    <td>{{ $horario->periodo() }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_termino }}</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm rounded-pill btn-turma-disciplina-horario"
                            data-bs-toggle="modal" data-bs-target="#modalProfessorDisciplinaHorario"
                            data-horario="{{ $horario->id }}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        @php $count =  countHorario($horario->id); @endphp
                        <button
                            class="btn btn-outline-info btn-sm rounded-pill @if ($count > 0) btn-curso-disciplina-horario-list @endif"
                            type="button"
                            @if ($count > 0) data-bs-toggle="modal" data-bs-target="#modalCursoDisciplinaHorarioList" data-url="{{ route('turma-disciplina-horario.ajaxDisciplinaHorario', $horario->id) }}" @else disabled @endif>
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('horarios.update', $horario->id) }}">
                            <i class="bi bi-pencil-square"></i>
                            <span>editar</span>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('horarios.destroy', $horario->id) }}">
                            <i class="bi bi-trash"></i>
                            <span>eliminar</span>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="pag">
    {{ $horarios->links() }}
</div>
