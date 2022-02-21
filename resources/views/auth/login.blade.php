@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                @if($errors->any())
                    {!! implode('', $errors->all(' <div class="alert alert-danger">:message</div>')) !!}
                @endif

                <div class="input-group mb-3">
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror" name="email"
                           value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="{{ __('Email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password"
                           required autocomplete="current-password" placeholder="{{ __('Password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember"> {{ __('Remember Me') }}</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-sm btn-primary btn-block">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
            <hr>
            <p class="mb-1">
                @if (Route::has('password.request'))
                    <a class="text-center" href="{{ route('password.request') }}">
                        {{ __('I forgot my password') }}
                    </a>
                @endif
            </p>
            <p class="mb-0">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-center">{{ __('Register a new membership') }}</a>
                @endif
            </p>
        </div>
    </div>
@endsection
