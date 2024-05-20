
const cursoSearch = document.querySelector('#curso_id_search');
const painel = document.querySelector("#turmas-result")

requestChangeCurso();

cursoSearch.addEventListener('change',(e) => {
    requestChangeCurso();
});

function requestChangeCurso(){
    const val = cursoSearch.value
    const option = cursoSearch.querySelector(`option[value="${val}"]`)
    requestCreateTable(option.dataset.url);
}

function requestCreateTable(url) {
    fetch(url)
        .then(resp => resp.json())
        .then(resp => {
            let html = ``
            resp.forEach(item => {html +=
                `<tr>
                    <td>
                        <input type="radio" name="turma_id" value="${item.id}" class="form-check m-auto"/>
                    </td>
                    <td>${item.curso.nome}</td>
                    <td>${item.ano_lectivo}</td>
                    <td>${periodo(item.periodo)}</td>
                    <td>${item.sala}</td>
                </tr>`;
            });

            painel.innerHTML = html == "" ? "" : createTable(html)
        })
}

function createTable(html) {
    return `<table class='table table-borderless  text-center'>
                <thead>
                    <tr>
                        <th> <i class="bi bi-check"></i> <span>#</span> </th>
                        <th> <i class="bi bi-calendar-plus"></i> <span>Curso</span> </th>
                        <th> <i class="bi bi-book"></i> <span>Ano lectivo</span> </th>
                        <th> <i class="bi bi-person-lines-fill"></i> <span>Periodo</span> </th>
                        <th> <i class="bi bi-calendar"></i> <span>Sala</span> </th>
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

