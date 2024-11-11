<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar-check"></i>
                        <span>Dia semana</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar"></i>
                        <span>Hora inicio</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar-x"></i>
                        <span>Hora termino</span>
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
            @foreach ($horarios as $horario)
                <tr>
                    <td data-value={{ $horario->dia_semana }}>{{ $horario->diaSemana() }}</td>
                    <td>{{ $horario->hora_inicio }}</td>
                    <td>{{ $horario->hora_termino }}</td>
                    <td>
                        <button class="btn btn-outline-primary btn-sm rounded-pill btn-turma-disciplina-horario" data-bs-toggle="modal"
                        data-bs-target="#modalCursoDisciplinaHorario" data-horario="{{$horario->id}}">
                            <div class="th-icone">
                                <i class="bi bi-plus"></i>
                                <span>adicionar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        @php $count =  countHorario($horario->id); @endphp
                        <button class="btn btn-outline-info btn-sm rounded-pill @if($count > 0) btn-turma-horario-horario-list @endif" type="button"
                            @if($count > 0)  data-bs-toggle="modal" data-bs-target="#modalDisciplinaHorarioList" data-url="#" @else disabled @endif
                        >
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
