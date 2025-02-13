
const modalTurmaAluno = document.querySelector('#formTurmaAlunoList');
const modalTurmaAlunoBody = modalTurmaAluno.querySelector('.modal-body');

const btnTurmaAlunoList = document.querySelectorAll('.btn-turma-aluno-list');

btnTurmaAlunoList.forEach(item => {
    item.addEventListener('click', function (e) {
        requestTurmaAlunoCreateTable(item.dataset.url, item.dataset.turma);
    })
})

function requestTurmaAlunoCreateTable(url, init = "") {
    fetch(url)
        .then(resp => resp.json())
        .then(resp => {
            let html = ``
            resp.forEach(item => {
                html +=
                    `<tr>
                    <td>${item.user.name}</td>
                    <td>${item.user.bilhete_identidade}</td>
                    <td>${item.user.email}</td>
                    <td>${genero(item.user.genero)}</td>
                    <td>${item.user.data_nascimento}</td>
                    <td>
                        <button class='btn btn-sm btn-outline-danger m-auto' type="submit" name="aluno_id" value="${item.id}">
                            <span>eliminar</span>
                        </button>
                    </td>
                </tr>`;
            });

            modalTurmaAlunoBody.innerHTML = createTurmaAlunoTable(html, init)
        })
}

function createTurmaAlunoTable(html, init = "") {
    return `<input type="hidden" name="turma_id" value="${init}"/>
            <table class='table table-borderless  text-center'>
                <thead>
                    <th><i class="bi bi-person"></i><span>Nome</span></th>
                    <th><i class="bi bi-person-vcard"></i><span>BI</span></th>
                    <th><i class="bi bi-envelope"></i><span>Email</span></th>
                    <th><i class="bi bi-gender-ambiguous"></i><span>Gênero</span></th>
                    <th><i class="bi bi-calendar"></i><span>Aniversário</span></th>
                    <th><i class="bi bi-tools"></i><span>Acção</span></th>
                </thead>
                <tbody> ${html}</tbody>
            </table>`;
}

function genero(genero) {
    switch (genero) {
        case "M": return "Masculino";
        case "F": return "Femenino";
        default: return "-";
    }
}
