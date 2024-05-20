
const modal = document.querySelector('#formCoordenadorCursoList');
const modalBody = modal.querySelector('.modal-body');

const btnCoordenadorCursoList = document.querySelectorAll('.btn-coordenador-curso-list');

btnCoordenadorCursoList.forEach(item => {
    item.addEventListener('click', function(e) {
        requestCreateTable(item.dataset.url);
        const inputCoordenador = modal.querySelector("#coordenadorCurso");
        inputCoordenador.value = item.dataset.coordenador;
    })
})

function requestCreateTable(url) {
    fetch(url)
        .then(resp => resp.json())
        .then(resp => {
            let html = ``
            resp.forEach(item => {html +=
                `<tr>
                    <td>${item.nome}</td>
                    <td>
                        <button class='btn btn-sm btn-outline-danger m-auto' type="submit" name="curso_id" value="${item.id}">
                            <span>eliminar</span>
                        </button>
                    </td>
                </tr>`;
            });

            modalBody.innerHTML = createTable(html)
        })
}

function createTable(html) {
    return `<table class='table table-borderless  text-center'>
                <thead>
                    <tr>
                        <th> <i class="bi bi-calendar-plus"></i> <span>Curso</span> </th>
                        <th>Acção</th>
                    </tr>
                </thead>
                <tbody> ${html}</tbody>
            </table>`;
}
