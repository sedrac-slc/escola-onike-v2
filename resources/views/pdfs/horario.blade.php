@php
    use App\Enum\DiaSemanaEnum;
    use  App\Enum\PeriodoEnum;
    $isAll = !isset($period);
    $isManha = $isAll || PeriodoEnum::MANHA == $period;
    $isTarde = $isAll || PeriodoEnum::TARDE == $period;
    $isNoite = $isAll || PeriodoEnum::NOITE == $period;
    $ano_lectivo = $curso->lectivo_ano;
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
        .pl-10px{padding-left: 10px;}
        .text-left{text-align: left;}
        .text-center{text-align: center;}
        .text-uppercase{text-transform:  uppercase;}
        .text-underline{text-decoration:  underline;}
        .space-enter{margin-left: 140px;}
        .space-ano-lectve{margin-left: 140px;}
         table, th, td{border-collapse: collapse;  border: 1px solid; width: 100%;}
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
        <img src="{{ public_path('img/logo.png') }}" class="logo">
    </div>
    <div>
        <div class="text-center text-underline">Complexo Escolar Privado Onilke</div>
        <div class="text-center text-uppercase mt-20px">Horário {{$curso->nome}}</div>
    </div>

    @include('pdfs.periodo-manha')

    @include('pdfs.periodo-tarde')

    @include('pdfs.periodo-noite')

</body>
</html>
