<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-file-word"></i>
                        <span>Nome</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-collection"></i>
                        <span>Classe</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-people"></i>
                        <span>Aluno</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-archive"></i>
                        <span>Turma</span>
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
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td data-value={{ $curso->num_classe }}>{{ $curso->numeroClasse() }}</td>

                    <td class="">
                        <button class="btn btn-sm btn-outline-info btn-sm rounded-pill btn-curso-aluno-list" type="button"
                            data-bs-toggle="modal" data-bs-target="#modalCursoAlunoList" data-url="{{ route('aluno.ajaxcurso', $curso->id) }}"
                        >
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar</span>
                            </div>
                        </button>
                    </td>

                    <td class="">
                        @php $count =  $curso->turmas->count(); @endphp
                        <button class="btn btn-sm btn-outline-info btn-sm rounded-pill @if($count > 0) btn-turma-list @endif" type="button"
                            @if($count > 0)  data-bs-toggle="modal" data-bs-target="#modalCursoTurmaList" data-url="{{ route('turmas.ajaxturma', $curso->id) }}" @else disabled @endif
                        >
                            <div class="th-icone">
                                <i class="bi bi-pencil-square"></i>
                                <span>listar({{ $count }})</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                            data-bs-target="#modalDelete" data-del="{{ route('cursos.destroy', $curso->id) }}">
                            <div class="th-icone">
                                <i class="bi bi-trash"></i>
                                <span>eliminar</span>
                            </div>
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" data-up="{{ route('cursos.update', $curso->id) }}">
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
<div id="pag">
    {{ $cursos->links() }}
</div>
