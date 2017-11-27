@extends('dashboard.main')

@section('title', '| Edit Role')

@section('content-of-user')




<div class="content-wrapper">
    <section class="content-header">
        <h1> Roles <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Role :<b> {{$role->name}}</b></h3>
                
            </div>
            @if(Session::get('message'))
                
                <div class="callout callout-success">
                    
                    <h4>{{ Session::get('message') }}</h4>
                
                </div>
                
            @endif
            <div class="box-body">
                <div class="col-lg-12">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                       
                        <div class='col-lg-12'>
                            <h3></h3>

                            {{-- @include ('errors.list')--}}
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

                            {{ Form::submit('Update Role', array('class' => 'btn btn-success')) }}
                            <a class="btn btn-default" href="{{url('roles')}}">Cancle</a>

                            {{ Form::close() }}    
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="box-footer"> Footer </div>
        </div>
    </section>
</div>












   

@endsection