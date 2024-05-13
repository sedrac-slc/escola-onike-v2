@extends('layouts.doc')
@section('body')
    @php $auth =  auth()->user(); @endphp
    @php $page = isset($painel) ? $painel : "" ; @endphp
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ asset('img/logo.png') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">EscolaOnilka</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ isset($auth->image) ? url('storage/' . $auth->image) : asset('img/profile-img.jpg') }}"
                            alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $auth->abreviarNome() }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $auth->name }}</h6>
                            <span>utilizador</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('home') }}">
                                <i class="bi bi-person"></i>
                                <span>Perfil</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Ajuda?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center text-danger" type="submit">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sair</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

    </header>

    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed @if ($page == 'home') active @endif" href="{{ route('home') }}">
                    <i class="bi bi-person-circle"></i>
                    <span>Perfil</span>
                </a>
            </li>
            @if ($auth->isDirectorOrSecretario())
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#forms-user" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-people"></i>
                        <span>Usuarios</span>
                        <i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-user" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="#">
                                <i class="bi bi-circle"></i><span>Alunos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-circle"></i><span>Professores</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="bi bi-circle"></i><span>Funcionário</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed @if ($page == 'curso') active @endif"
                        href="{{ route('cursos.index') }}">
                        <i class="bi bi-calendar-plus"></i>
                        <span>Curso</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed @if ($page == 'turma') active @endif"
                        href="{{ route('turmas.index') }}">
                        <i class="bi bi-archive"></i>
                        <span>Turmas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed @if ($page == 'trimestre') active @endif"
                        href="{{ route('trimestres.index') }}">
                        <i class="bi bi-calendar"></i>
                        <span>Trimestre</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed @if ($page == 'horario') active @endif"
                        href="{{ route('horarios.index') }}">
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Horario</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed @if ($page == 'disciplina') active @endif"
                        href="{{ route('disciplinas.index') }}">
                        <i class="bi bi-book"></i>
                        <span>Disciplinas</span>
                    </a>
                </li>
            @endif
        </ul>

    </aside>

    <main id="main" class="main">
        @include('components.erros')

        @yield('content')

    </main>

    @if (isset($footer) && $footer)
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by
                <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </footer>
    @endif

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
@endsection
