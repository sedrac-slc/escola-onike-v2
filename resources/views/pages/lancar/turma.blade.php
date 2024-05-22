@extends('layouts.dash')
@php
   $isDirectorOrSecretario = auth()->user()->isDirectorOrSecretario();
@endphp
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}" />
@endsection
@section('content')
    <div class="card">
        <div class="pagetitle m-2">
            <h1>Turmas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Perfil</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#">Turmas</a>
                    </li>
                </ol>
            </nav>
        </div>
        <span id="formadd" class="d-none fr" data-url="#">
            <i class="bi bi-plus h2"></i>
        </span>
        <div class="card-body">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="true" aria-controls="flush-collapseTwo">
                            <i class="bi bi-list-check"></i>
                            <span>Lista</span>
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample" style="">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-icone">
                                                <i class="bi bi-calendar-plus"></i>
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
                                                <i class="bi bi-sun"></i>
                                                <span>Classe</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="th-icone">
                                                <i class="bi bi-calendar"></i>
                                                <span>Ano lectivo</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="th-icone">
                                                <i class="bi bi-brightness-high"></i>
                                                <span>Periodo</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="th-icone">
                                                <i class="bi bi-1-circle"></i>
                                                <span>Sala</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="th-icone">
                                                <i class="bi bi-hour"></i>
                                                <span>Horario</span>
                                            </div>
                                        </th>
                                        <th>
                                            <div class="th-icone">
                                                <i class="bi bi-123"></i>
                                                <span>Nota</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($turmaDisciplinaHorarios as $turmaDisciplinaHorario)
                                        <tr>
                                            <td>{{ $turmaDisciplinaHorario->turma->curso->nome }}</td>
                                            <td>{{ $turmaDisciplinaHorario->disciplina->nome }}</td>
                                            <td>{{ $turmaDisciplinaHorario->turma->curso->numeroClasse() }}</td>
                                            <td>{{ $turmaDisciplinaHorario->turma->ano_lectivo }}</td>
                                            <td>{{ $turmaDisciplinaHorario->turma->periodo() }}</td>
                                            <td>{{ $turmaDisciplinaHorario->turma->sala }}</td>
                                            <td>{{ $turmaDisciplinaHorario->horario->intervalo() }}</td>
                                            <td>
                                                <a href="{{ route('notas.alunos', $turmaDisciplinaHorario->id) }}"
                                                    class="btn @if($isDirectorOrSecretario) btn-outline-info @else btn-outline-warning @endif btn-sm rounded-pill">
                                                    <div class="th-icone">
                                                        @if($isDirectorOrSecretario)
                                                            <i class="bi bi-eye"></i>
                                                            <span>{{ "Visualizar" }}</span>
                                                        @else
                                                            <i class="bi bi-pencil-square"></i>
                                                            <span>{{ "Lançar" }}</span>
                                                        @endif
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @isset($turmaDisciplinaHorarios->total)
                            <div id="pag">
                                {{ $turmaDisciplinaHorarios->links() }}
                            </div>
                        @endisset
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
