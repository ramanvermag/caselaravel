@extends('dashboard.main')

@section('title', '| Roles')

@section('content-page')

<div class="col-lg-12">
    <h3>All Roles
<!-- 
    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a> --></h3>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
            <?php $sr=0; ?>
                @foreach ($roles as $role)
                <?php $sr++; ?>
                <tr>
                    <td>{{ $sr }}</td>
                    <td>{{ $role->name }}</td>

                    <td>{{  $role->permissions()->pluck('name')->implode(' ,  ') }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>
                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn-edit-cl btn-info" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn-delete-cl btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

</div>

@endsection