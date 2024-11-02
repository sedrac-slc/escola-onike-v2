@php $numeroClasse = App\Enum\NumeroClasseEnum::list(); @endphp
<div class="row">
    <div class="col-md-12">
        <label for="aluno" class="form-label">
            <i class="bi bi-key"></i>
            <span>Aluno:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="text" id="aluno_search" name="aluno" class="form-control" placeholder="Procurar aluno..." @isset($disabled) disabled @endisset />
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>
                            <span>#</span>
                        </th>
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
                    </tr>
                </thead>
                <tbody id="aluno-result"></tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12">
        <label for="turma" class="form-label">
            <i class="bi bi-collection"></i>
            <span>Turma:</span>
            @if (!isset($require))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input type="text" id="turma_search" name="turma" class="form-control" placeholder="Procura turma ..." @isset($disabled) disabled @endisset />
        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>
                            <span>#</span>
                        </th>
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
                                <span>Classe</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody id="turma-result"></tbody>
            </table>
        </div>
    </div>
</div>
@if(!isset($hidden_cadastra))
<button class="btn btn-outline-primary rounded-pill mt-3">
    <i class="bi bi-check-circle"></i>
    <span id="span-curso">cadastra</span>
</button>
@endif
<script>
    const inputAlunoSearch = document.querySelector("#aluno_search");
    inputAlunoSearch.addEventListener('keyup', (e) => {
        createAluno("", false);
    });

    function createAluno(extra, check){
        fetch("{{ route('aluno.ajaxsearch') }}" + `?content=${inputAlunoSearch.value}&${extra}`)
            .then(resp => resp.json())
            .then(resp => {
                let html = ``
                resp.forEach(item => { html +=
                `<tr>
                    <td>
                        <input type="radio" class='form-check' name="aluno_id" value="${item.id}" checked="${check}"/>
                    </td>
                    <td>${item.user.name}</td>
                    <td>${item.user.bilhete_identidade}</td>
                    <td>${item.user.email}</td>
                    <td>${item.user.genero}</td>
                    <td>${item.user.data_nascimento}</td>
                </tr>`;
                });
                document.querySelector("#aluno-result").innerHTML = html;
            })
    }

    const inputTurmaSearch = document.querySelector("#turma_search");
    inputTurmaSearch.addEventListener('keyup', (e) => {
        createTurma("", false);
    });

    function createTurma(extra, check){
        fetch("{{ route('turma.ajaxsearch') }}" + `?content=${inputTurmaSearch.value}&${extra}`)
            .then(resp => resp.json())
            .then(resp => {
                let html = ``
                resp.forEach(item => { html +=
                `<tr>
                    <td>
                        <input type="radio" class='form-check' name="turma_id" value="${item.id}" checked="${check}"/>
                    </td>
                    <td>${item.curso.nome}</td>
                    <td>${item.ano_lectivo}</td>
                    <td>${item.periodo}</td>
                    <td>${item.sala}</td>
                    <td>${item.ano_curricular ?? '-'}</td>
                </tr>`;
                });
                document.querySelector("#turma-result").innerHTML = html;
            })
    }
</script>
