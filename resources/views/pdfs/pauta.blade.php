@php
    use App\Enum\NumeroEnum;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .mt-10px{margin-top: 10px;}
        .mt-20px{margin-top: 20px;}
        .mt-40px{margin-top: 40px;}
        .pl-210px{padding-left: 210px;}
        .pl-10px{padding-left: 10px;}
        .text-left{text-align: left;}
        .w-160px{width: 160px;}
        .w-m{width: 25px;}
        .text-center{text-align: center;}
        .text-uppercase{text-transform:  uppercase;}
        .text-underline{text-decoration:  underline;}
        table, th, td{border-collapse: collapse;  border: 1px solid; width: 100%;}
        .td-note{width: 30px;}
        .assinatura{
            position: absolute;
            bottom: 4rem;
            left: 40%;
        }
        .logo{
            height: 100px;
            width: 100px;
            margin-left: 19rem;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div>
        <div>
            <img src="{{ public_path('img/logo.png') }}" class="logo">
        </div>
        <div class="text-center text-underline">Complexo Escolar Privado Onilke</div>
        <div class="text-center text-uppercase mt-20px">Pauta do curso {{$turmaDisciplinaHorario->turma->curso->nome}}</div>
        <div class="text-center text-uppercase mt-10px">Disciplina {{$turmaDisciplinaHorario->disciplina->nome}}</div>
        <div class="d-flex mt-10px">
            <span class="pl-10px">Periodo: {{ $turmaDisciplinaHorario->turma->periodo }}</span>
            <span class="pl-210px">Sala: {{ $turmaDisciplinaHorario->turma->sala }}</span>
            <span class="pl-210px">Classe: {{ $turmaDisciplinaHorario->turma->classe->num_classe }}</span>
        </div>
    </div>

    <table class="text-center mt-10px">
        <thead>
            <tr>
                <th rowspan="2">N</th>
                <th rowspan="2">Nome</th>
                <th colspan="5" class="text-uppercase">I Trimestre</th>
                <th colspan="5" class="text-uppercase">II Trimestre</th>
                <th colspan="5" class="text-uppercase">III Trimestre</th>
                <th rowspan="2">MF</th>
            </tr>
            <tr>
                <th class="text-uppercase">Mac</th>
                <th class="text-uppercase">Npp</th>
                <th class="text-uppercase">Npt</th>
                <th class="text-uppercase">Mt</th>
                <th class="text-uppercase">Ex</th>
                <th class="text-uppercase">Mac</th>
                <th class="text-uppercase">Npp</th>
                <th class="text-uppercase">Npt</th>
                <th class="text-uppercase">Mt</th>
                <th class="text-uppercase">Ex</th>
                <th class="text-uppercase">Mac</th>
                <th class="text-uppercase">Npp</th>
                <th class="text-uppercase">Npt</th>
                <th class="text-uppercase">Mt</th>
                <th class="text-uppercase">Ex</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alunos as $aluno)
                @php
                    $first = getNotaTrimestre($aluno->id, $turmaDisciplinaHorario->turma->id,  $turmaDisciplinaHorario->disciplina->id, NumeroEnum::PRIMEIRO );
                    $second = getNotaTrimestre($aluno->id, $turmaDisciplinaHorario->turma->id,  $turmaDisciplinaHorario->disciplina->id, NumeroEnum::SEGUNDO );
                    $three = getNotaTrimestre($aluno->id, $turmaDisciplinaHorario->turma->id,  $turmaDisciplinaHorario->disciplina->id, NumeroEnum::TERCEIRO );

                    $mt1 = isset($first->mac, $first->npt, $first->npt) ? round( ($first->mac+$first->npt+$first->npt) / 3)  : "";
                    $mt2 = isset($second->mac, $second->npt, $second->npt) ? round( ($second->mac+$second->npt+$second->npt) / 3)  : "";
                    $mt3 = isset($three->mac, $three->npt, $three->npt) ? round( ($three->mac+$three->npt+$three->npt) / 3)  : "";

                    $num_classe = $turmaDisciplinaHorario->turma->classe->num_classe;

                    if($num_classe == 7 || $num_classe == 12){
                        $mt =  0;  if(is_numeric($mt1) && is_numeric($mt2) && is_numeric($mt3))  $mt = round(($mt1 + $mt2 + $mt3 ) / 3) * 0.4;

                        $npt = isset($first->exame, $second->exame, $three->exame)
                                ? round(($first->exame + $second->exame + $three->exame ) / 3) * 0.6
                                : 0;
                        $nota = round($mt + $npt);
                    }else{
                        $nota = round(($mt1 + $mt2 + $mt3 ) / 3) ;
                    }

                @endphp
                <tr>
                    <td class="w-m">{{ $loop->index + 1 }}</td>
                    <td class="">{{ $aluno->user->name }}</td>
                    <td class="td-note">{{ $first->mac ?? "-" }}</td>
                    <td class="td-note">{{ $first->npp ?? "-" }}</td>
                    <td class="td-note">{{ $first->npt ?? "-" }}</td>
                    <td class="td-note">{{ $mt1 }}</td>
                    <td class="td-note">{{ $first->exame ?? "-" }}</td>
                    <td class="td-note">{{ $second->mac ?? "-" }}</td>
                    <td class="td-note">{{ $second->npp ?? "-" }}</td>
                    <td class="td-note">{{ $second->npt ?? "-" }}</td>
                    <td class="td-note">{{ $mt2 }}</td>
                    <td class="td-note">{{ $second->exame ?? "-" }}</td>
                    <td class="td-note">{{ $three->mac ?? "-" }}</td>
                    <td class="td-note">{{ $three->npp ?? "-" }}</td>
                    <td class="td-note">{{ $three->npt ?? "-" }}</td>
                    <td class="td-note">{{ $mt3 }}</td>
                    <td class="td-note">{{ $three->exame ?? "-" }}</td>
                    <td class="td-note">{{ $nota }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="assinatura">
        <div>O Sub-Director pedagógico</div>
        <div>____________________________</div>
    </div>
</body>
</html>
