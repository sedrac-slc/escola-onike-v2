@php
    use App\Enum\DiaSemanaEnum;
    use App\Enum\PeriodoEnum;
    $isNoite = $isAll || PeriodoEnum::NOITE == $period;
@endphp
@if ($isNoite)
    <div class="mt-40px">
        <div class="text-center">
            <span>Período: Noite</span>
            <span class="space-enter">Entrada: 18h:00m</span>
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
                    <td>18h:00m</td>
                    <td>18h:40m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '18h:00m', '18h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '18h:00m', '18h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '18h:00m', '18h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '18h:00m', '18h:40m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '18h:00m', '18h:40m') }}
                    </td>
                </tr>
                <tr>
                    <td>18h:45m</td>
                    <td>19h:25m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '18h:45m', '19h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '18h:45m', '19h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '18h:45m', '19h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '18h:45m', '19h:25m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '18h:45m', '19h:25m') }}
                    </td>
                </tr>
                <tr>
                    <td>19h:30m</td>
                    <td>20h:10m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '19h:30m', '20h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '19h:30m', '20h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '19h:30m', '20h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '19h:30m', '20h:10m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '19h:30m', '20h:10m') }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">20h:10m às 20h:20m</td>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td>20h:20m</td>
                    <td>21h:00m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '20h:20m', '21h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '20h:20m', '21h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '20h:20m', '21h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '20h:20m', '21h:00m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '20h:20m', '21h:00m') }}
                    </td>
                </tr>
                <tr>
                    <td>21h:05m</td>
                    <td>21h:45m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '21h:05m', '21h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '21h:05m', '21h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '21h:05m', '21h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '21h:05m', '21h:45m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '21h:05m', '21h:45m') }}
                    </td>
                </tr>
                <tr>
                    <td>21h:50m</td>
                    <td>22h:20m</td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEGUNDA_FEIRA, '21h:50m', '22h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::TERCA_FEIRA, '21h:50m', '22h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUARTA_FEIRA, '21h:50m', '22h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::QUINTA_FEIRA, '21h:50m', '22h:20m') }}
                    </td>
                    <td>{{ horarioDisc($curso, PeriodoEnum::MANHA, DiaSemanaEnum::SEXTA_FEIRA, '21h:50m', '22h:20m') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endif
