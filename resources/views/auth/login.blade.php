<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <link rel="icon" href="{{ asset('assets/img/logo.jpg') }}" type="image/x-icon"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Agus | PT. ICS') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/auth-app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/auth-app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="margin-top: 3%;">
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('layouts.message-flash')
                        <div class="card">
                            <div class="card-header text-center">
                                {{ __('Login') }}
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    @if (session('authorization'))
                                        <div class="alert alert-success notifiy">
                                            {{ session('authorization') }}
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label for="login" class="col-sm-4 col-form-label text-md-right">
                                            {{ __('Username or Email') }}
                                        </label>
                                        <div class="col-md-6">
                                            <input id="login" type="text" autocomplete="off" 
                                                class="form-control{{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="login" value="{{ old('username') ?: old('email') }}" required autofocus
                                            >
                                            @if ($errors->has('username') || $errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0 mt-2">
                                        <div class="col-md-8 offset-md-4">
                                            <a href="{{ url('/register') }}">Register</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <p class="text-center">&copy;<script>document.write(new Date().getFullYear());</script> by Agus | PT. ICS</a>
</body>
</html>