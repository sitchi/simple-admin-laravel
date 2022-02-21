@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">{{ __('Register a new membership') }}</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                @if($errors->any())
                    {!! implode('', $errors->all(' <div class="alert alert-danger">:message</div>')) !!}
                @endif

                <div class="input-group mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                           value="{{ old('name') }}" required autocomplete="name" autofocus
                           placeholder="{{ __('Name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email"
                           placeholder="{{ __('Email Address') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror" name="password" required
                           autocomplete="new-password" placeholder="{{ __('Password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="terms"
                                   id="terms" {{ old('terms') ? 'checked' : '' }}>
                            <label for="terms"> {{ __('I agree to therm') }}</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <hr>
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="text-center"> {{ __('I already have a membership') }}</a>
            @endif
        </div>
    </div>
@endsection
