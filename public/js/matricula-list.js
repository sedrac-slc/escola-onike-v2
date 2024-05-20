const modalList = document.querySelector("#modalMatriculaList");
const btnAlunoMatriculaList = document.querySelectorAll('.btn-aluno-matricula-list');
const modalBodyList = modalList.querySelector(".modal-body");

console.log(btnAlunoMatriculaList)

btnAlunoMatriculaList.forEach( item =>{
    item.addEventListener("click",(e)=>{
        requestCreateTableList(item.dataset.url);
        document.querySelector('#aluno-matricula-list').value = item.dataset.aluno;
    });
});

function requestCreateTableList(url) {
    fetch(url)
        .then(resp => resp.json())
        .then(resp => {
            let html = ``
            resp.forEach(item => {html +=
                `<tr>
                    <td>${item.curso.nome}</td>
                    <td>${item.ano_lectivo}</td>
                    <td>${periodo(item.periodo)}</td>
                    <td>${item.sala}</td>
                    <td>
                        <button class='btn btn-sm btn-outline-danger m-auto' type="submit" name="turma_id" value="${item.id}">
                            <span>eliminar</span>
                        </button>
                    </td>
                </tr>`;
            });

            modalBodyList.innerHTML = html == "" ? "" : createTableList(html)
        })
}

function createTableList(html) {
    return `<table class='table table-borderless  text-center'>
                <thead>
                    <tr>
                        <th> <i class="bi bi-calendar-plus"></i> <span>Curso</span> </th>
                        <th> <i class="bi bi-book"></i> <span>Ano lectivo</span> </th>
                        <th> <i class="bi bi-person-lines-fill"></i> <span>Periodo</span> </th>
                        <th> <i class="bi bi-calendar"></i> <span>Sala</span> </th>
                        <th> <i class="bi bi-tools"></i> <span>Acção</span> </th>
                    </tr>
                </thead>
                <tbody> ${html}</tbody>
            </table>`;
}

function periodo(periodo){
    switch(periodo){
        case "MANHA":
            return "Manhã";
        case "TARDE":
            return "Tarde";
        default:
            return "Noite";
    }
}

