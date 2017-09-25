@extends('layouts.app')

@section('title', '| Create Permission')

@section('content')

<div class='col-lg-8 col-lg-offset-2'>

    {{-- @include ('errors.list') --}}

    <h3>Create Permission</h3>
 
    {{ Form::open(array('url' => 'permissions')) }}

    <div class="form-group">
        {{ Form::label('name', 'Permission Name') }}
        {{ Form::text('name', '', array('class' => 'form-control', 'placeholder'=>"Enter Permission name...")) }}
    </div>
    <br>

    <div class="form-group">
        {{ Form::label('name', ' Select allowed Route(s)') }}
       <fieldset>

    <!--     <div class="col-md-12">
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="route-list-wrapper">
                    <h5>All available Routes</h5>
                        <select name="selectfrom" id="select-from" multiple size="10">

                            <?php foreach($route_list as $route): ?>

                                <option value="<?php  echo $route['uri']; ?>">

                                 <?php  echo $route['uri']." (";  echo $route['method'].")"; ?>
                                     
                                </option>
                            
                            <?php endforeach; ?>                        
                            
                        </select>
                        
                        <a href="JavaScript:void(0);" id="btn-add">Add &raquo;</a>
                    
                    </div>
                </div>
        </div>
 
        <div class="col-md-6">
            <div class="row">
                <div class="route-list-wrapper">

                    <h5>Allowed Routes</h5>



                    
                    <select name="selectto[]" id="select-to" multiple size="10">

                    </select>
                    
                    <a href="JavaScript:void(0);" id="btn-remove">&laquo; Remove </a>
                
                </div>
        </div> -->

                <div class="route-list-wrapper">
                    
                <div class="col-md-12">
                    <div class="row">
                    <h5>All available Routes</h5>

                        
                        

                            <?php foreach($route_list as $route): ?>
                                
                                <div class="col-md-4">
                                    <div class="row">
                                        

                                    <?php $route_name   = $route['uri']; $method = $route['method'];  ?>


                                    <input class="route-name-input" type="checkbox" name="<?php echo $route_name; ?>" id="{{ $route_name }}{{$method}}">
                                        
                                        <label class="route-name" for="{{ $route_name }}{{$method}}">
                                           {{ $route_name }}  <em>{{$method}}</em>
                                        </label>

                                    </div>



                                </div>

                            <?php endforeach; ?>                        
                            
                        
                        <!-- <a href="JavaScript:void(0);" id="btn-add">Add &raquo;</a> -->
                    
                    </div>
                </div>
        </div>
 

 
  </fieldset>
    </div>
   

    @if(!$roles->isEmpty())

        <h4>Assign Permission to Roles</h4>


        @foreach ($roles as $role)

            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach

    @endif

    
    <br>
    {{ Form::submit('Create Permission', array('class' => 'btn btn-primary create-permission-submit')) }}

    {{ Form::close() }}
    <br>

</div>

@endsection