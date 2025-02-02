@php
    use App\Enum\DiaSemanaEnum;
    use App\Enum\PeriodoEnum;
    $isManha = $isAll || PeriodoEnum::MANHA == $period;
@endphp
@if ($isManha)
    <div class="mt-40px">
        <div class="text-center">
            <span>Período: Manhã</span>
            <span class="space-enter">Entrada: 08h:00</span>
            <span class="space-ano-lectve">Ano lectivo: {{ $ano_lectivo ?? '' }}</span>
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
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '08h:00m', '08h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '08h:00m', '08h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '08h:00m', '08h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '08h:00m', '08h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '08h:00m', '08h:40m') }}
                    </td>
                </tr>
                <tr>
                    <td>08h:45m</td>
                    <td>09h:25m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '08h:45m', '09h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '08h:45m', '09h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '08h:45m', '09h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '08h:45m', '09h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '08h:45m', '09h:25m') }}
                    </td>
                </tr>
                <tr>
                    <td>09h:30m</td>
                    <td>10h:10m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '09h:30m', '10h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '09h:30m', '10h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '09h:30m', '10h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '09h:30m', '10h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '09h:30m', '10h:10m') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">10h:10m às 10h:20m</td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td>10h:20m</td>
                    <td>11h:00m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '10h:20m', '11h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '10h:20m', '11h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '10h:20m', '11h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '10h:20m', '11h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '10h:20m', '11h:00m') }}
                    </td>
                </tr>
                <tr>
                    <td>11h:05m</td>
                    <td>11h:45m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '11h:05m', '11h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '11h:05m', '11h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '11h:05m', '11h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '11h:05m', '11h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '11h:05m', '11h:45m') }}
                    </td>
                </tr>
                <tr>
                    <td>11h:50m</td>
                    <td>12h:20m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '11h:50m', '12h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '11h:50m', '12h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '11h:50m', '12h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '11h:50m', '12h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '11h:50m', '12h:20m') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endif
