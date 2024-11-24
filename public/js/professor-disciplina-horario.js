const modalProfessor = document.querySelector('#formProfessorDisciplinaHorarioList');
const modalProfessorBody = modalProfessor.querySelector('.modal-body');

const btnProfessorDisciplinaHorarioList = document.querySelectorAll('.btn-professor-disciplina-horario-list');

btnProfessorDisciplinaHorarioList.forEach(item => {
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
                    <td>${item.turma.curso.nome}</td>
                    <td>${numeroClasse(item.turma.curso.num_classe)}</td>
                    <td>${item.professor}</td>
                    <td>${diaSemana(item.horario.dia_semana)}</td>
                    <td>${periodo(item.turma.periodo)}</td>
                    <td>${item.turma.sala}</td>
                    <td>${item.horario.hora_inicio} à ${item.horario.hora_termino}</td>
                    <td>
                        <button class='btn btn-sm btn-outline-danger m-auto' type="submit" name="professor_leciona_id" value="${item.professor_leciona_id}">
                            <span>eliminar</span>
                        </button>
                    </td>
                </tr>`;
            });

            modalProfessorBody.innerHTML = createTable(html)
        })
}

function createTable(html) {
    return `<table class='table table-borderless  text-center'>
                <thead>
                    <tr>
                        <th> <i class="bi bi-calendar-plus"></i> <span>Curso</span> </th>
                        <th> <i class="bi bi-moon"></i> <span>Classe</span> </th>
                        <th> <i class="bi bi-people"></i> <span>Projessor</span> </th>
                        <th> <i class="bi bi-person-lines-fill"></i> <span>Dia semana</span> </th>
                        <th> <i class="bi bi-sun"></i> <span>Periódo</span> </th>
                        <th> <i class="bi bi-123"></i> <span>Sala</span> </th>
                        <th> <i class="bi bi-calendar"></i> <span>Tempo</span> </th>
                        <th>Acção</th>
                    </tr>
                </thead>
                <tbody> ${html}</tbody>
            </table>`;
}

function diaSemana(diaSemana){
    switch(diaSemana){
        case "SEGUNDA_FEIRA": return "Segunda feira";
        case "TERCA_FEIRA": return "Terça feira";
        case "QUARTA_FEIRA": return "Quarta feira";
        case "QUINTA_FEIRA": return "Quinta feira";
        default: return "Sexta feira";
    }
}

function periodo(periodo){
    switch(periodo){
        case "MANHA": return "Manhã";
        case "TARDE": return "Tarde";
        default: return "Noite";
    }
}

function numeroClasse(num_classe){
    switch(num_classe){
        case "SETIMA": return "Sétima";
        case "OITAVA": return "Oitava";
        case "NONA": return "Nona";
        case "DECIMA": return "Décima";
        case "DECIMA_PRIMEIRA": return "Décima primeira";
        case "DECIMA_SEGUNDA": return "Décima segunda";
        default: return "Décima terceira";
    }
}
