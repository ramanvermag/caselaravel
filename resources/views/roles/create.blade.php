@extends('dashboard.main')

@section('title', '| Add Role')

@section('content-of-user')

<div class="content-wrapper">

    <section class="content-header">
        
        <h1>Roles <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
        
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            
            <li>
                <a href="#">Examples</a>
            </li>
            
            <li class="active">Blank page</li>

        </ol>
    </section>

    <section class="content">
        
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
                
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                

            </div>
        @endif
        <div class="box">

        <div class="box-header with-border">
            <h3 class="box-title">Create Role</h3>
            
        </div>
        <div class="box-body">

            <div class='col-lg-12 '>

                {{-- @include ('errors.list') --}}
                {{ Form::open(array('url' => 'roles')) }}
                <div class="form-group">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Role Name')) }}
                </div>
                <h5><b>Assign Permissions</b></h5>
                <div class='form-group'>
                    @foreach ($permissions as $permission)

                        {{ Form::checkbox('permissions[]',  $permission->id ) }}
                        {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                    @endforeach
                </div>
                {{ Form::submit('Create Role', array('class' => 'btn btn-success pull-left create-role')) }}
                {{ Form::close() }}
                <a class="btn btn-default pull-left" href="{{url('roles')}} ">Cancle</a>
            </div>
        </div>

        <div class="box-footer"> Footer </div>
        </div>
    </section>

</div>



@endsection