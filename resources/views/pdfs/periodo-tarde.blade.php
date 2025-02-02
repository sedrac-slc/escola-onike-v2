@php
    use App\Enum\DiaSemanaEnum;
    use App\Enum\PeriodoEnum;
    $isTarde = $isAll || PeriodoEnum::TARDE == $period;
@endphp
@if ($isTarde)
    <div class="mt-40px">
        <div class="text-center">
            <span>Período: Tarde</span>
            <span class="space-enter">Entrada: 13h:00m</span>
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
                    <td>13h:00m</td>
                    <td>13h:40m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '13h:00m', '13h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '13h:00m', '13h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '13h:00m', '13h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '13h:00m', '13h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '13h:00m', '13h:40m') }}
                    </td>
                </tr>
                <tr>
                    <td>13h:45m</td>
                    <td>14h:25m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '13h:45m', '14h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '13h:45m', '14h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '13h:45m', '14h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '13h:45m', '14h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '13h:45m', '14h:25m') }}
                    </td>
                </tr>
                <tr>
                    <td>14h:30m</td>
                    <td>15h:10m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '14h:30m', '15h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '14h:30m', '15h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '14h:30m', '15h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '14h:30m', '15h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '14h:30m', '15h:10m') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">15h:10m às 15h:20m</td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td>15h:20m</td>
                    <td>16h:00m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '15h:20m', '16h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '15h:20m', '16h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '15h:20m', '16h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '15h:20m', '16h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '15h:20m', '16h:00m') }}
                    </td>
                </tr>
                <tr>
                    <td>16h:05m</td>
                    <td>16h:45m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '16h:05m', '16h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '16h:05m', '16h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '16h:05m', '16h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '16h:05m', '16h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '16h:05m', '16h:45m') }}
                    </td>
                </tr>
                <tr>
                    <td>16h:50m</td>
                    <td>17h:20m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '16h:50m', '17h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '16h:50m', '17h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '16h:50m', '17h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '16h:50m', '17h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '16h:50m', '17h:20m') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endif
