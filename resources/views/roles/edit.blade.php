@extends('dashboard.main')

@section('title', '| Edit Role')

@section('content-page')

<div class='col-lg-8 col-lg-offset-2'>
    <h3>Edit Role: {{$role->name}}</h3>
    
    {{-- @include ('errors.list')
 --}}
    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Role Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5>
    @foreach ($permissions as $permission)

        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

    @endforeach
    <br>
    {{ Form::submit('Edit Role', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}    
</div>

@endsection