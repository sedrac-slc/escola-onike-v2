@php
    use App\Enum\DiaSemanaEnum;
    use  App\Enum\PeriodoEnum;
    $isAll = !isset($period);
    $isManha = $isAll || PeriodoEnum::MANHA == $period;
    $isTarde = $isAll || PeriodoEnum::TARDE == $period;
    $isNoite = $isAll || PeriodoEnum::NOITE == $period;
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
        .text-center{text-align: center;}
        .text-uppercase{text-transform:  uppercase;}
        .text-underline{text-decoration:  underline;}
        .space-enter{margin-left: 140px;}
        .space-ano-lectve{margin-left: 140px;}
        table, th, td{border-collapse: collapse;  border: 1px solid; width: 100%;}
    </style>
</head>
<body>
    <div>
        <div class="text-center text-underline">Complexo Escolar Privado Onilke</div>
        <div class="text-center text-uppercase mt-20px">Horário {{$curso->nome}}</div>
    </div>

    @if ($isManha)
        <div class="mt-40px">
            <div class="text-center">
                <span>Período: Manhã</span>
                <span class="space-enter">Entrada: 08h:00</span>
                <span class="space-ano-lectve">Ano lectivo: {{$curso->ano_lectivo}}</span>
            </div>
            <table class="text-center mt-10px">
                <thead>
                    <tr>
                        <th>Entrada</th>
                        <th>Saída</th>
                        <th>Segunda feira</th>
                        <th>Terça feira</th>
                        <th>Quarta feira</th>
                        <th>Quinta feira</th>
                        <th>Sexta feira</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>08h:00m</td>
                        <td>08h:40m</td>
                        <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, "08h:00m", "08h:40m") }}</td>
                        <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, "08h:00m", "08h:40m") }}</td>
                        <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, "08h:00m", "08h:40m") }}</td>
                        <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, "08h:00m", "08h:40m") }}</td>
                        <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, "08h:00m", "08h:40m") }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

</body>
</html>
