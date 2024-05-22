@extends('layouts.dash')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}" />
    <style>
        .min-w{ min-width: 350px;  }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="pagetitle m-2">
            <h1>Coordenador de curso</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Perfil</a></li>
                    <li class="breadcrumb-item active">
                        <a href="{{ route('coordenador-curso.index') }}">Coordenadore de curso</a>
                    </li>
                </ol>
            </nav>
        </div>
        <span id="formadd" class="d-none fr" data-url="{{ route('coordenador-curso.store') }}">
            <i class="bi bi-plus h2"></i>
        </span>
        <div class="card-body">
            <div class="accordion accordion-flush" id="accordionFlushExample">
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
                        <form action="{{ route('coordenador-curso.store') }}" method="POST" id="form">
                            @csrf
                            @method('POST')
                            @include('components.form.coordenador')
                        </form>
                    </div>
                </div>
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
                        @include('components.table.coordenador')
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('components.modal.coordenador-curso-list')
    @include('components.modal.delete')
@endsection
@section('script')
    @parent
    <script src="{{ asset('js/coordenador-curso.js') }}"></script>
    <script>
        const btnDels = document.querySelectorAll('.btn-del');
        const btnUps = document.querySelectorAll('.btn-up');

        const method = document.querySelector('[name="_method"]');
        const span = document.querySelector('#formadd');
        const form = document.querySelector('#form');
        const inputsPassword = document.querySelectorAll('.item-password');

        function selectDefault(value, id) {
            let select = document.querySelector('#' + id);
            let children = select.childNodes;
            children.forEach(option => {
                if (option.value == value)  option.selected = true;
            });
        }

        function hiddenOrShowInputsPassword(openCase){
            if(openCase){
                inputsPassword.forEach( item => {
                    if(item.classList.contains('d-none'))  item.classList.remove('d-none');
                    let input = item.querySelector("input[type='password']");
                    if(!input.hasAttribute('required')) input.setAttribute('required', true)
                })
            }else{
                inputsPassword.forEach( item => {
                    if(!item.classList.contains('d-none'))  item.classList.add('d-none');
                    let input = item.querySelector("input[type='password']");
                    if(input.hasAttribute('required')) input.removeAttribute('required')
                })
            }
        }

        function text(...arg) {
            document.querySelector('#nome').value = arg[0];
            document.querySelector('#bilhete_identidade').value = arg[1];
            document.querySelector('#email').value = arg[2];
            selectDefault(arg[3], 'genero');
            document.querySelector('#data_nascimento').value = arg[4];
            document.querySelector('#span-coordenador').innerHTML = arg[5];
        }

        span.addEventListener('click', function(e) {
            form.action = span.dataset.url;
            if (!span.classList.contains('d-none')) span.classList.add('d-none');
            text("", "", "", "","", "Cadastra");
            hiddenOrShowInputsPassword(true);
            method.value = "POST";
        });

        btnUps.forEach(item => {
            item.addEventListener('click', function(e) {
                let row = item.parentNode.parentNode;
                let tds = row.querySelectorAll('td');
                form.action = item.dataset.up;
                if (span.classList.contains('d-none')) span.classList.remove('d-none');
                text(
                    tds[0].innerHTML,
                    tds[2].innerHTML,
                    tds[1].innerHTML,
                    tds[3].dataset.value,
                    tds[4].innerHTML,
                    "Actualizar"
                );
                hiddenOrShowInputsPassword(false);
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
@endsection
