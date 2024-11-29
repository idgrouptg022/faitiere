<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FCT | Login</title>
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auths/login.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    @yield('extra-styles')
</head>
<body>
    <main>
        <div class="login-container">
            <form action="{{ route('auth:login') }}" method="POST" class="login-form">
                @csrf
                <div class="login-form-header">
                    <h2>Connexion ADMIN</h2>
                    <p>Renseignez vos identifiants de connexion</p>
                </div>
                <div class="login-form-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Votre email...">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Mot de passe">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit">Se connecter</button>
                    </div>
                </div>
                <div class="login-form-footer">
                    <p>Copyright &copy; 2024, Tous droits reservés</p>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
