@extends('layouts.dash')
@php
    $isnotCanChangeNp = !auth()->user()->isProfessor();
    $isnotCanChangeMt = !auth()->user()->isCoordenador();
    $isCanLancarNota = auth()->user()->isCoordenador() || auth()->user()->isProfessor();
    $isPrint = auth()->user()->isDirector();
@endphp
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}" />
    <style>
        .form-control.disabled { background: #ccc;}
    </style>
    @if ($isPrint)
        <style>
            @page { size: landscape; }
            @media print { .print-none {display: none !important;} }
        </style>
    @endif
@endsection
@section('content')
    <div class="card">
        <div class="pagetitle m-2">
            <h1>Alunos</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Perfil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('notas.index') }}">Lançar</a></li>
                    <li class="breadcrumb-item active">
                        <a href="#">Alunos</a>
                    </li>
                </ol>
            </nav>
        </div>
        <span id="formadd" class="d-none fr" data-url="#">
            <i class="bi bi-plus h2"></i>
        </span>
        <form id="nota-alunos" class="card-body" @if ($isCanLancarNota) action="{{ route('notas.lancar') }}" method="POST" @endif>
            @csrf
            <div class="position-absolute top-0 p-3" style="right: 0%;">
                <div>
                    <div class="pagetitle">
                        <h1 style="font-size: 14pt;">Disciplina: {{ $turmaDisciplinaHorario->disciplina->nome }}</h1>
                        <h1 style="font-size: 14pt; color: #989ebd;">Curso:
                            {{ $turmaDisciplinaHorario->turma->curso->nome }}/{{ $turmaDisciplinaHorario->turma->curso->numeroClasse() }}
                        </h1>
                        <input type="hidden" name="turma_disciplina_horario" id="turma_disciplina_horario"
                            value="{{ $turmaDisciplinaHorario->id }}" />
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-icone">
                                    <i class="bi bi-person"></i>
                                    <span>Aluno</span>
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
                        @foreach ($alunos as $aluno)
                            @php $nota = nota($aluno, $turmaDisciplinaHorario); @endphp
                            <tr>
                                <td>
                                    {{ $aluno->user->name }}
                                    <input type="hidden" name="alunos[]" value="{{ $aluno->id }}" class="form-control">
                                </td>
                                <td>
                                    <input type="number" name="npt[]" value="{{ $nota->npt ?? null }}" min="0"
                                        max="20"
                                        class="form-control @if ($isnotCanChangeNp) disabled @endif"
                                        @if ($isnotCanChangeNp) readonly @endif>
                                </td>
                                <td>
                                    <input type="number" name="npp[]" value="{{ $nota->npp ?? null }}" min="0"
                                        max="20"
                                        class="form-control @if ($isnotCanChangeNp) disabled @endif"
                                        @if ($isnotCanChangeNp) readonly @endif>
                                </td>
                                <td>
                                    <input type="number" name="mac[]" value="{{ $nota->mac ?? null }}" min="0"
                                        max="20"
                                        class="form-control @if ($isnotCanChangeNp) disabled @endif"
                                        @if ($isnotCanChangeNp) readonly @endif>
                                </td>
                                <td>
                                    <input type="number" name="mt1[]" id="mt1-{{ $loop->index }}"
                                        value="{{ $nota->mt1 ?? null }}" min="0" max="20"
                                        class="form-control nota-mt @if ($isnotCanChangeMt) disabled @endif"
                                        @if ($isnotCanChangeMt) readonly @endif
                                        data-index="{{ $loop->index }}">
                                </td>
                                <td>
                                    <input type="number" name="mt2[]" id="mt2-{{ $loop->index }}"
                                        value="{{ $nota->mt2 ?? null }}" min="0" max="20"
                                        class="form-control nota-mt @if ($isnotCanChangeMt) disabled @endif"
                                        @if ($isnotCanChangeMt) readonly @endif
                                        data-index="{{ $loop->index }}">
                                </td>
                                <td>
                                    <input type="number" name="mt3[]" id="mt3-{{ $loop->index }}"
                                        value="{{ $nota->mt3 ?? null }}" min="0" max="20"
                                        class="form-control nota-mt @if ($isnotCanChangeMt) disabled @endif"
                                        @if ($isnotCanChangeMt) readonly @endif
                                        data-index="{{ $loop->index }}">
                                </td>
                                <td>
                                    <input type="number" name="mf[]" id="mf-{{ $loop->index }}"
                                        value="{{ $nota->mf ?? null }}" min="0" max="20"
                                        class="form-control disabled" readonly>
                                </td>
                                <td>
                                    <input type="number" name="mfd[]" value="{{ $nota->mfd ?? null }}"
                                        min="0" max="20"
                                        class="form-control @if ($isnotCanChangeMt) disabled @endif"
                                        @if ($isnotCanChangeMt) readonly @endif>
                                </td>
                                <td>
                                    <input type="number" name="exame[]" value="{{ $nota->exame ?? null }}"
                                        min="0" max="20"
                                        class="form-control @if ($isnotCanChangeMt) disabled @endif "
                                        @if ($isnotCanChangeMt) readonly @endif>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($isCanLancarNota)
                <button type="submit" class="btn btn-sm btn-primary print-none">
                    <i class="bi bi-plus"></i>
                    <span>lançar</span>
                </button>
            @endif
            @if ($isPrint)
                <button type="button" class="btn btn-sm btn-primary print-none" onclick="print()">
                    <i class="bi bi-printer"></i>
                    <span>imprimir</span>
                </button>
            @endif
        </form>
    </div>
@endsection
@section('script')
    @parent
    @if (!$isnotCanChangeMt)
        <script>
            const inputNotaMt = document.querySelectorAll('.nota-mt');

            inputNotaMt.forEach(item => {
                item.addEventListener('change', (e) => {
                    let index = item.dataset.index;
                    let mt1 = getNota('mt1', index);
                    let mt2 = getNota('mt2', index);
                    let mt3 = getNota('mt3', index);
                    let mf = Math.round((mt1 + mt2 + mt3) / 3);
                    document.querySelector(`#mf-${index}`).value = mf;
                });
            });

            function getNota(code, index) {
                let idCode = `#${code}-${index}`;
                let input = document.querySelector(idCode);
                if (input.value) return parseInt(input.value);
                return 0;
            }
        </script>
    @endif
    @if ($isPrint)
        <script>

        </script>
    @endif
@endsection
