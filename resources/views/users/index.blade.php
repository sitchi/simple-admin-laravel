@extends('layouts.private')


@section('content')
    <div class="row">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">{{ __('Create a User') }}</a>
                </div>

                <div class="card-body">
                    <table class="table table-hover responsive" id="dataTables" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Full Name') }}</th>
                            <th>{{ __('Roles') }}</th>
                            <th>{{ __('CreatedAt') }}</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($data as $user)
                            <tr>
                                <td>{{ $user->id  }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-primary">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="">
                                        @can('user-edit')
                                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('user-delete')
                                            <a href="#" class="btn btn-danger" data-toggle="modal"
                                               data-target="#delete"
                                               onclick="deleteUser({{ $user->id }})"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer small text-muted">Updated {{ date("Y-m-d H:i:s") }}</div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="modal-delete"></div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('#dataTables').dataTable({
                responsive: true,
                stateSave: true,
                autoWidth: true,
                order: [[0, 'desc']],
            });
        </script>
    @endpush

@endsection
