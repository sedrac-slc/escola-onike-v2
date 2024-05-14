@php $generos = App\Enum\GeneroEnum::list(); @endphp
<div class="col-md-6 p-1">
    <label for="yourUsername" class="form-label">
        <i class="bi bi-person"></i>
        <span>Nome</span>
        <small class="text-danger">*</small>
    </label>
    <div class="input-group has-validation">
        <input type="text" name="name" class="form-control" id="nome" required
            value="{{ $user->name ?? old('name') }}">
        <div class="invalid-feedback">Verifica o nome inserido!</div>
    </div>
</div>
<div class="col-md-6 p-1">
    <label for="yourEmail" class="form-label">
        <i class="bi bi-envelope"></i>
        <span>Email</span>
        <small class="text-danger">*</small>
    </label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend">@</span>
        <input type="email" name="email" class="form-control" id="email" required
            value="{{ $user->email ?? old('email') }}">
        <div class="invalid-feedback">Verifica o email inserido!</div>
    </div>
</div>
@if(!isset($hidden_password))
<div class="col-md-6 p-1 item-password">
    <label for="yourPassword" class="form-label">
        <i class="bi bi-shield"></i>
        <span>Senha:</span>
    </label>
    <input type="password" name="password" class="form-control" id="yourPassword" required
        value="{{ old('password') }}">
    <div class="invalid-feedback">Verifica a senha inserido!</div>
</div>
<div class="col-md-6 p-1 item-password">
    <label for="yourPasswordConfirmation" class="form-label">
        <i class="bi bi-key"></i>
        <span>Confirma(senha):</span>
    </label>
    <input type="password" name="password_confirmation" class="form-control" id="yourPasswordConfirmation" required
        value="{{ old('password_confirmation') }}">
    <div class="invalid-feedback">Verifica a senha inserido!</div>
</div>
@endif
<div class="col-md-6 p-1">
    <label for="genero" class="form-label">
        <i class="bi bi-gender-ambiguous"></i>
        <span>Gênero</span>
        <small class="text-danger">*</small>
    </label>
    <select name="genero" class="form-control" id="genero">
        @foreach ($generos as $key => $value)
            <option value="{{ $key }}"> {{ $value }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6 p-1">
    <label for="yourBithday" class="form-label">
        <i class="bi bi-calendar"></i>
        <span>Data nascimento</span>
        <small class="text-danger">*</small>
    </label>
    <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" required
        value="{{ $user->data_nascimento ?? old('data_nascimento') }}">
    <div class="invalid-feedback">Verifica a data nascimento inserido!</div>
</div>
<div class="col-md-6 p-1">
    <label for="yourBi" class="form-label">
        <i class="bi bi-person-vcard"></i>
        <span>Bilhete de identidade</span>
        <small class="text-danger">*</small>
    </label>
    <input type="text" name="bilhete_identidade" class="form-control" id="bilhete_identidade" required
        value="{{ $user->bilhete_identidade ?? old('bilhete_identidade') }}">
    <div class="invalid-feedback">Verifica o bilhete de identidade inserido!</div>
</div>
