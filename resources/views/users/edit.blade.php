@extends('layouts.private')


@section('content')
    <div class="row">
        <div class="col-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class='row'>
                <div class='col-lg-7 col-md-7 col-sm-7'>
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ __('Edit User') }}: {{ $user->name }}</h4>
                        </div>
                        <div class="card-body">

                            {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}

                            <div class="form-group">
                                <label for="name">{{ __('Full Name') }}</label>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('E-Mail') }}</label>
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                <label for="confirm-password">{{ __('Confirm Password') }}</label>
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>

                            <div class="form-group">
                                <label for="roles">{{ __('Roles') }}</label>
                                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control select2', 'multiple']) !!}
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                                <a class="btn btn-warning" href="{{ route('users.index') }}">{{ __('Cancel') }}</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <div class='col-lg-5 col-md-5 col-sm-5'>
                    <div class="card">
                        <div class="card-header">
                            <h4>User Statistics</h4>
                        </div>
                        <div class="card-body">
                            <p><b>Last Visit</b>: Unknow</p>
                            <p><b>Registration Date</b>: 2020-03-01 23:00:00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(".select2").select2({
                multiple: true,
            });
        </script>
    @endpush

@endsection
