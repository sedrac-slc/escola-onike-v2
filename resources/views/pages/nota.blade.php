@extends('layouts.dash')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}" />
    <style>
        .min-w{ min-width: 250px; }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="pagetitle m-2">
            <h1>Notas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Perfil</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('notas.index') }}">Notas</a>
                    </li>
                </ol>
            </nav>
        </div>
        <span id="formadd" class="d-none fr" data-url="{{ route('notas.store') }}">
            <i class="bi bi-plus h2"></i>
        </span>
        <div class="card-body">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                @if (auth()->user()->isProfessor())
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <i class="bi bi-card-checklist"></i>
                                <span>Formulário</span>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample" style="">
                            <form action="{{ route('notas.store') }}" method="POST" id="form">
                                @csrf
                                @method('POST')
                                @include('components.form.nota')
                            </form>
                        </div>
                    </div>
                @endif
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
                        @include('components.table.nota')
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if (auth()->user()->isProfessor())
        @include('components.modal.delete')
    @endif
@endsection
@section('script')
    @parent
    @if (auth()->user()->isProfessor())
        <script>
            const btnDels = document.querySelectorAll('.btn-del');
            const btnUps = document.querySelectorAll('.btn-up');

            const method = document.querySelector('[name="_method"]');
            const span = document.querySelector('#formadd');
            const form = document.querySelector('#form');

            function selectDefault(value, id) {
                let select = document.querySelector('#' + id);
                let children = select.childNodes;
                children.forEach(option => {
                    if (option.value == value) {
                        option.selected = true;
                    }
                });
            }

            function text(...arg) {
                selectDefault(arg[0], 'aluno_id');
                selectDefault(arg[1], 'pauta_id');
                selectDefault(arg[2], 'trimestre_id');
                selectDefault(arg[3], 'disciplina_id');
                document.querySelector('#mac').value = arg[4];
                document.querySelector('#npp').value = arg[5];
                document.querySelector('#npt').value = arg[6];
                document.querySelector('#span-nota').innerHTML = arg[7];
            }

            span.addEventListener('click', function(e) {
                form.action = span.dataset.url;
                if (!span.classList.contains('d-none')) span.classList.add('d-none');
                text("", "", "", "", "", "", "", "Cadastra");
                method.value = "POST";
            });

            btnUps.forEach(item => {
                item.addEventListener('click', function(e) {
                    let row = item.parentNode.parentNode;
                    let tds = row.querySelectorAll('td');
                    form.action = item.dataset.up;
                    if (span.classList.contains('d-none')) span.classList.remove('d-none');
                    text(
                        tds[0].dataset.value,
                        tds[1].dataset.value,
                        tds[2].dataset.value,
                        tds[3].dataset.value,
                        tds[4].innerHTML,
                        tds[5].innerHTML,
                        tds[6].innerHTML,
                        "Actualizar"
                    );
                    method.value = "PUT";
                });
            });

            btnDels.forEach(item => {
                item.addEventListener('click', function(e) {
                    let formDelete = document.querySelector('#formDelete');
                    formDelete.action = item.dataset.del;
                });
            });
        </script>
    @endif
@endsection
