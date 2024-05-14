<div class="table-responsive">
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-person"></i>
                        <span>Aluno</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-calendar"></i>
                        <span>Trimestre</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-book"></i>
                        <span>Disciplina</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-basket"></i>
                        <span>Pauta</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-list-ol"></i>
                        <span>MAC</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-list-ol"></i>
                        <span>NPP</span>
                    </div>
                </th>
                <th>
                    <div class="th-icone">
                        <i class="bi bi-list-ol"></i>
                        <span>NPT</span>
                    </div>
                </th>
                @if (auth()->user()->isProfessor())
                    <th colspan="2">
                        <div class="th-icone">
                            <i class="bi bi-tools"></i>
                            <span>Acção</span>
                        </div>
                    </th>
                @endif
            </tr>
        </thead>
        <tbody class="position-relative">
            @foreach ($notas as $nota)
                <tr>
                    <td data-value={{ $nota->aluno_id }}>{{ $nota->aluno->user->name }}</td>
                    <td data-value={{ $nota->trimestre_id }}>{{ $nota->trimestre->text() }}</td>
                    <td data-value={{ $nota->disciplina_id }}>{{ $nota->disciplina->text() }}</td>
                    <td class="min-w" data-value={{ $nota->pauta_id }}>{{ $nota->pauta->text() }}</td>
                    <td>{{ $nota->mac }}</td>
                    <td>{{ $nota->npp }}</td>
                    <td>{{ $nota->npt }}</td>
                    @if (auth()->user()->isProfessor())
                        <td>
                            <button class="btn btn-outline-danger btn-sm rounded-pill btn-del" data-bs-toggle="modal"
                                data-bs-target="#modalDelete" data-del="{{ route('notas.destroy', $nota->id) }}">
                                <div class="th-icone">
                                    <i class="bi bi-trash"></i>
                                    <span>eliminar</span>
                                </div>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-outline-warning btn-sm rounded-pill btn-up" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne" data-up="{{ route('notas.update', $nota->id) }}">
                                <div class="th-icone">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>editar</span>
                                </div>
                            </button>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="pag">
    {{ $notas->links() }}
</div>
