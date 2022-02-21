@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">{{ __('Forgot Password?') }}</p>

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                @if($errors->any())
                    {!! implode('', $errors->all(' <div class="alert alert-danger">:message</div>')) !!}
                @endif


                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="{{ __('Email Address') }}">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-sm btn-primary btn-block">
                            {{ __('Send') }}
                        </button>
                    </div>
                </div>
                <!-- /.col -->
            </form>
            <hr>
            <p class="mb-1">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="text-center"> {{ __('Login') }}</a>
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
