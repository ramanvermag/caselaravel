@extends('layouts.app')

@section('title', '| Edit User')

@section('content')

<div class='col-lg-8 col-lg-offset-2'>
            <div class="adduserform">
            <div class="col-md-12">
            <h3> Edit {{$user->name}}  </h3>
            </div>
            {{-- @include ('errors.list') --}}

<?php //print_r($user); ?>

            <div class="col-md-12">
                    <div class="form-group">

                        <div class="old-user-img-perview">


                            @if(!$user->profile_picture)

                                <img class="old-user-image-perview-pic"  src="{{asset('img')}}/profil-dummy.png">


                            @else
                                <img  class="old-user-image-perview-pic" 
                                      src="{{asset('user_profile_pics')}}/{{$user->id}}/profile/{{ $user->profile_picture }} ">

                            @endif



                        <span class="change-image"><i class="fa fa-camera" aria-hidden="true"></i></span>
                        </div>
                        <span class="user-id-badge">
                            
                        User Id: {{$user->id}}
                        </span>

                    </div>
            </div>

            
                

             {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT', 'enctype' =>'multipart/form-data')) }} 
             {{-- Form model binding to automatically populate our fields with user data --}}
      
                <div class="col-md-9">
                    <div class="form-group">
                        

                        <img style="display: none;" class="user-image-perview" id="preview" src="#" alt="Pofile Picture" />
                        
                            {!! Form::file('profile_picture', array('id' => 'fileUploader', 'style'=>'display: none;')) !!}
                        
                    </div>
                </div>
           

                <div class="col-md-6">
                    <div class="form-group">

                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                      

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        {{ Form::label('name', 'Email') }}
                        {{ Form::text('email', null, array('class' => 'form-control')) }}
                      

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">

                        {{ Form::label('name', 'Phone') }}
                        {{ Form::text('phone', null, array('class' => 'form-control')) }}
                      

                    </div>
                </div>

                <div class="col-md-6">                    
                    <div class="form-group">
                        {{ Form::label('name', 'Gender') }}

                        {{ Form::select('gender', ['male' => 'Male',   'female' => 'Female'],  null, array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('name', 'Address') }}

                        {{ Form::textarea('residential_address', null, array('id' => 'address', 'class' => 'form-control address-field', 'placeholder' => 'Residential address')) }}
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('name', 'Pincode') }}

                        {{ Form::text('pincode', null, array('id' => 'pincode', 'class' => 'form-control','maxlength' => '6', 'placeholder' => 'Pincode (Eg. 110005)')) }}
                    </div>
                </div>

               
        

                <div class="col-md-6">                    
                    <div class="form-group">

                        {{ Form::label('name', 'D.O.B') }}
                        <div class='input-group date'>

                    {{ Form::text('dob', null, array('name'=>'dob', "id"=>"datepicker", 'class' => 'form-control', 'placeholder' => 'D.O.B')) }}                    
                         
                            <span class="input-group-addon datepicker-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      
                    </div>
                </div>

             @if($user->id != Auth::user()->id)
             


                 <div class="col-md-12">
                    <div class='form-group'>
                        <p> <b>Roles</b> </p>
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                        @endforeach
                        <em class="user-msg">if you not asign any Role to user then default user role would be <b>User</b></em>
                    </div>
                </div>

            @endif
                
                <div class="col-md-12">
                    <div class="form-group">    
                        {{ Form::submit('Update User', array('class' => 'btn btn-primary', 'id' => 'create-user-account')) }}
                    </div>
                </div>

            {{ Form::close() }}

            </div>
            </div>
@endsection