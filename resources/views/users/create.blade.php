@extends('layouts.app')

@section('title', '| Add Member')

@section('content-of-user')


<div class="content-wrapper">
    <section class="content-header">
        <h1> Members <small>...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{url('users')}}">Members</a></li>
            <li class="active">Add</li>
        </ol>
    </section>
    <section class="content">

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
        @endif
        
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add new member</h3>
                    
                

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
                    <!-- 
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
                     -->
                </div>
            </div>
            <div class="box-body"> 
                
                
    <!-- Content Header (Page header) -->


            <div class="adduserform">


            {{-- @include ('errors.list') --}}

    
        
            {{ Form::open(array('url' => 'users', 'id' => "create-user-form", 'enctype' => 'multipart/form-data')) }}
             {{ csrf_field() }}
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">

                        {{ Form::text('name', '', array('id' => 'name', 'class' => 'form-control' ,'placeholder' => 'Name')) }}

                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        {{ Form::email('email', '', array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email')) }}
                    </div>
                </div>


                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        {{ Form::text('phone', '', array( 'id' => 'phone','maxlength' => '10', 'class' => 'form-control', 'placeholder' => 'Phone (Eg. 9876543210)')) }}
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3">                    
                    <div class="form-group">
                        {{ Form::select('gender', ['male' => 'Male',   'female' => 'Female'],  null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        {{ Form::textarea('residential_address', '', array('id' => 'address', 'class' => 'form-control address-field', 'placeholder' => 'Residential address')) }}
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        {{ Form::text('pincode', '', array('id' => 'pincode', 'class' => 'form-control','maxlength' => '6', 'placeholder' => 'Pincode (Eg. 110005)')) }}
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3">                    
                    <div class="form-group">


                        <div class='input-group date'>
                    {{ Form::text('dob', '', array('name'=>'dob', "id"=>"datepicker", 'class' => 'form-control', 'placeholder' => 'D.O.B')) }}                    
                           <!--  
                            <input name="dob" id="datepicker" type='text' class="form-control" data-provide="datepicker" placeholder="D.O.B" /> -->
                            <span class="input-group-addon datepicker-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      
                    </div>
                </div>

               
                <div class="col-md-6 col-md-offset-3">                    
                    <div class="form-group">
                        {{ Form::password('password', array('id' => 'pwd','class' => 'form-control', 'placeholder' => 'Password')) }}
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        {{ Form::password('password_confirmation', array('id' => 'cpwd','class' => 'form-control', 'placeholder' => 'Confirm Password')) }}
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <img class="user-image-perview" id="preview" src="#" alt="Pofile Picture" />
                        
                            {!! Form::file('profile_picture', array('id' => 'fileUploader')) !!}
                        
                    </div>
                </div>

                 <div class="col-md-6 col-md-offset-3">
                    <div class='form-group'>
                        <p><b>Roles</b></p>
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                        @endforeach
                        <em class="user-msg">if you not asign any Role to user then default user role would be <b>User</b></em>
                    </div>
                </div>
                
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">    
                        {{ Form::submit('Add User', array('class' => 'btn btn-primary', 'id' => 'create-user-account')) }}
                    </div>
                </div>

            {{ Form::close() }}

            </div>
        
            
            </div>
            <div class="box-footer"> You can add new members from here. </div>
        </div>
    </section>
</div>























   
        
@endsection