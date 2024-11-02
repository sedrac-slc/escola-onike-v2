
const modalCursoTurma = document.querySelector('#formCursoTurmaList');
const modalCursoTurmaBody = modalCursoTurma.querySelector('.modal-body');

const btnCursoTurmaList = document.querySelectorAll('.btn-turma-list');

btnCursoTurmaList.forEach(item => {
    item.addEventListener('click', function (e) {
        requestCursoTurmaCreateTable(item.dataset.url);
    })
})

function requestCursoTurmaCreateTable(url) {
    fetch(url)
        .then(resp => resp.json())
        .then(resp => {
            let html = ``
            resp.forEach(item => {
                html +=
                `<tr>
                    <td>${item.ano_lectivo}</td>
                    <td>${item.periodo}</td>
                    <td>${item.sala}</td>
                    <td>${classe(item.ano_curricular)}</td>
                    <td>
                        <button class='btn btn-sm btn-outline-danger m-auto' type="submit" name="turma_id" value="${item.id}">
                            <span>eliminar</span>
                        </button>
                    </td>
                </tr>`;
            });

            modalCursoTurmaBody.innerHTML = createTurmaAlunoTable(html)
        })
}

function createTurmaAlunoTable(html) {
    return `<table class='table table-borderless  text-center'>
                <thead>
                    <th><i class="bi bi-calendar"></i><span>Ano lectivo</span></th>
                    <th><i class="bi bi-brightness-high"></i><span>Periodo</span></th>
                    <th><i class="bi bi-1-circle"></i><span>Sala</span></th>
                    <th><i class="bi bi-3-circle"></i><span>Classe</span></th>
                    <th><i class="bi bi-tools"></i><span>Acção</span></th>
                </thead>
                <tbody> ${html}</tbody>
            </table>`;
}

function classe(classe) {
    switch (classe) {
        case "1": return "A";
        case "2": return "B";
        case "3": return "C";
        default: return "-";
    }
}
