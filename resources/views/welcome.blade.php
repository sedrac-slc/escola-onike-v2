@extends('layouts.doc')
@section('body')
    <div hidden>  <h1>Escola Onike</h1> </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">EscolaOnike</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="bi bi-house"></i>
                            <span>Página inicial</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-info ">
        <div class="p-2">
            <div class="row">
                <div class="col-md-7 text-center text-light">
                    <div class="m-2">
                        <hgroup class="mt-3 mb-3">
                            <h2>Seja bem vindo!</h2>
                            <h3>ao website da escola Onika</h3>
                        </hgroup>
                        <p class="border-top pt-3 h5">
                            Neste website irás encontra informações relacionada com a escola privada Onike.
                        </p>
                        <p class="text-justify pt-3 h4">
                            A instituição ofereçe serviços de qualidade para a educação de criança e adolescente,
                            é uma escola de ensino primário e secundário (com cursos técncos) com uma mensalidade
                            accessível.
                        </p>

                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <a href="{{ url('/home') }}" class="btn btn-success btn-lg rounded-pill">
                                        <i class="bil bi-house"></i>
                                        <span>Painel de control</span>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-light btn-lg rounded-pill">
                                        <i class="bil bi-key"></i>
                                        <span>Autenticação</span>
                                    </a>
                                @endauth
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-md-5">
                    <img src="{{ asset('img/online-graduation.svg') }}" alt="">
                </div>
            </div>
        </div>
    </header>
@endsection
