const modalNota = document.querySelector('#formTrimestreNotaList');
const modalNotaBody = modalNota.querySelector('.modal-body');

const btnNotaList = document.querySelectorAll('.btn-nota-trimestre-list');

btnNotaList.forEach(item => {
    item.addEventListener('click', function(e) {
        requestCreateTable(item.dataset.url);
    })
})

function requestCreateTable(url) {
    fetch(url)
        .then(resp => resp.json())
        .then(resp => {
            let html = ``
            resp.forEach(item => {html +=
                `<tr>
                    <td>${item.aluno.user.name}</td>
                    <td>${item.disciplina.nome}</td>
                    <td>${item.npt}</td>
                    <td>${item.npp}</td>
                    <td>${item.mac}</td>
                    <td>${item.mt1}</td>
                    <td>${item.mt2}</td>
                    <td>${item.mt3}</td>
                    <td>${item.mf}</td>
                    <td>${item.mfd}</td>
                    <td>${item.exame}</td>
                </tr>`;
            });

            modalNotaBody.innerHTML = createTable(html)
        })
}

function createTable(html) {
    return `<table class='table table-borderless  text-center'>
                <thead>
                    <tr>
                        <th> <span>Aluno</span> </th>
                        <th> <span>Disciplina</span> </th>
                        <th> <span>npt</span> </th>
                        <th> <span>npp</span> </th>
                        <th> <span>mac</span> </th>
                        <th> <span>mt1</span> </th>
                        <th> <span>mt2</span> </th>
                        <th> <span>mt3</span> </th>
                        <th> <span>mf</span> </th>
                        <th> <span>mfd</span> </th>
                        <th> <span>exame</span> </th>
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
