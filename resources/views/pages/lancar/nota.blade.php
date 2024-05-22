@extends('layouts.dash')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}" />
@endsection
@section('content')
    <div class="card">
        <div class="pagetitle m-2">
            <h1>Notas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Perfil</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#">Notas</a>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-person"></i>
                                    <span>Curso</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-book"></i>
                                    <span>Disciplina</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-1-circle-fill"></i>
                                    <span>NPT</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-2-circle-fill"></i>
                                    <span>NPP</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-3-circle-fill"></i>
                                    <span>MAC</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-1-circle"></i>
                                    <span>MT1</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-2-circle"></i>
                                    <span>MT2</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-3-circle"></i>
                                    <span>MT3</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-clipboard"></i>
                                    <span>MF</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-clipboard2-minus"></i>
                                    <span>MFD</span>
                                </div>
                            </th>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-clipboard-fill"></i>
                                    <span>EXAME</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notas as $nota)
                            <tr>
                                <td>{{ $nota->turma->curso->nome }}</td>
                                <td>{{ $nota->disciplina->nome }}</td>
                                <td>{{ $nota->npt ?? '-' }}</td>
                                <td>{{ $nota->npp ?? '-' }}</td>
                                <td>{{ $nota->mac ?? '-' }}</td>
                                <td>{{ $nota->mt1 ?? '-' }}</td>
                                <td>{{ $nota->mt2 ?? '-' }}</td>
                                <td>{{ $nota->mt3 ?? '-' }}</td>
                                <td>{{ $nota->mf }}</td>
                                <td>{{ $nota->mfd ?? '-' }}</td>
                                <td>{{ $nota->exame ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="pag">
                {{ $notas->links() }}
            </div>
        </div>
    </div>
@endsection
