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
            <div class="card">
                <div class="card-header">
                    <h4>{{ __('Edit Role') }}: {{ $role->name }}</h4>
                </div>
                <div class="card-body">

                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        <label for="permission">{{ __('Permission') }}</label>
                        <br/>
                        @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                        @endforeach
                    </div>

                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">{{ __('Save') }}</button>
                        <a class="btn btn-warning" href="{{ route('roles.index') }}">{{ __('Cancel') }}</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
