
const modal = document.querySelector('#formCursoDisciplinaHorarioList');
const modalBody = modal.querySelector('.modal-body');

const btnCursoDisciplinaHorarioList = document.querySelectorAll('.btn-curso-disciplina-horario-list');

btnCursoDisciplinaHorarioList.forEach(item => {
    item.addEventListener('click', function(e) {
        requestCreateTable(item.dataset.url);
        if(item.dataset.professor){
            const professorCursoDisciplina = document.querySelector("#professorCursoDisciplina");
            professorCursoDisciplina.value = item.dataset.professor;
        }
    })
})

function requestCreateTable(url) {
    fetch(url)
        .then(resp => resp.json())
        .then(resp => {
            let html = ``
            resp.forEach(item => {html +=
                `<tr>
                    <td>${item.curso.nome}</td>
                    <td>${item.disciplina.nome}</td>
                    <td>${diaSemana(item.horario.dia_semana)}</td>
                    <td>${item.horario.hora_inicio} à ${item.horario.hora_termino}</td>
                    <td>
                        <button class='btn btn-sm btn-outline-danger m-auto' type="submit" name="curso_disciplina_horario_id" value="${item.id}">
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
                        <th> <i class="bi bi-book"></i> <span>Disciplina</span> </th>
                        <th> <i class="bi bi-person-lines-fill"></i> <span>Horario</span> </th>
                        <th> <i class="bi bi-calendar"></i> <span>Tempo</span> </th>
                        <th>Acção</th>
                    </tr>
                </thead>
                <tbody> ${html}</tbody>
            </table>`;
}

function diaSemana(diaSemana){
    switch(diaSemana){
        case "SEGUNDA_FEIRA":
            return "Segunda feira";
        case "TERCA_FEIRA":
            return "Terça feira";
        case "QUARTA_FEIRA":
            return "Quarta feira";
        case "QUINTA_FEIRA":
            return "Quinta feira";
        default:
            return "Sexta feira";
    }
}
