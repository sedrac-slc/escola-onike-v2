@extends('layouts.dash')
@section('content')
    @php $auth = auth()->user(); @endphp
    @php $funcao =  $auth->funcao(); @endphp
    <div class="pagetitle">
        <h1>Bem vindo!</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Usuário</li>
                <li class="breadcrumb-item active">Perfil</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ $auth->image ? url('storage/'.$auth->image) : asset('img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <a href="#" class="text-info text-sm" data-bs-toggle="modal" data-bs-target="#modalFoto">
                            Alterar foto de perfil
                        </a>
                        <h2>{{ $auth->name }}</h2>
                        <h3>{{ $funcao }}</h3>
                    </div>
                </div>
                @if (true)

                @endif
            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">

                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                                    <i class="bi bi-person"></i>
                                    <span>Dados pessoas</span>
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>Editar</span>
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                                    <i class="bi bi-key"></i>
                                    <span>Palavra-passe</span>
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                @isset($auth->user_detalhe->descricao)
                                    <h5 class="card-title">Sobre</h5>
                                    <p class="small fst-italic">{{ $auth->user_detalhe->descricao }}</p>
                                @endisset

                                <h5 class="card-title">Seus dados</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="bi bi-person"></i>
                                        <span>Nome</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8">{{ $auth->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="bi bi-building"></i>
                                        <span>Companhia</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8">Escola Onike, Lobito</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="bi bi-person-lines-fill"></i>
                                        <span>Ocupação</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8">{{ $funcao }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="bi bi-gender-ambiguous"></i>
                                        <span>Gênero</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8">{{ $auth->genero() }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="bi bi-calendar"></i>
                                        <span>Data nascimento</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8">{{ $auth->data_nascimento }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">
                                        <i class="bi bi-envelope"></i>
                                        <span>Email</span>
                                    </div>
                                    <div class="col-lg-9 col-md-8">{{ $auth->email }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">
                                        <span>Foto de perfil</span>
                                    </label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="{{ asset('img/profile-img.jpg') }}" alt="Profile">
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm"
                                                title="Upload new profile image">
                                                <i class="bi bi-upload"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm"
                                                title="Remove my profile image">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <form action="{{ route('usuarios.update', $auth->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="">
                                        <label for="password_up" class="form-label">
                                            <i class="bi bi-shield-lock"></i>
                                            <span>Digita a sua senha:</span>
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input type="password" name="password_up" id="password_up" class="form-control"
                                            required>
                                    </div>
                                    <hr />
                                    @include('components.form.utilizador', [
                                        'hidden_password' => true,
                                        'user' => $auth,
                                    ])
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <span>
                                        Atenção, efectuando a troca de palavra passe, será necessário fazer o processo
                                        de autenticação com a novas credências.
                                    </span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('senha.update', $auth->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="form-label">
                                            <i class="bi bi-person-lock"></i>
                                            <span>Senha corrente</span>
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input name="password" type="password" class="form-control" id="currentPassword"
                                            required>
                                    </div>
                                    <hr />
                                    <div class="row mb-3">
                                        <label for="newPassword" class="form-label">
                                            <i class="bi bi-lock"></i>
                                            <span>Senha nova</span>
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input name="newpassword" type="password" class="form-control" id="newPassword"
                                            required>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-form-label">
                                            <i class="bi bi-shield-lock"></i>
                                            <span>Confirma a senha</span>
                                            <small class="text-danger">*</small>
                                        </label>
                                        <input name="renewpassword" type="password" class="form-control"
                                            id="renewPassword" required>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <span>alterar</span>
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    @include('components.modal.foto',[
        'user_id' => Auth::user()->id
    ])
@endsection
