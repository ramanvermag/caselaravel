@extends('dashboard.main')

@section('title', '| Create Permission')

@section('content-of-user')




<div class="content-wrapper">
    <section class="content-header">
        <h1> Blank page <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class='col-lg-12'>
    {{-- @include ('errors.list') --}}

    <h3>Edit Permission <b>{{$permission->name}}</b>  </h3>
    <ul class="routlist">
        <li>
            <input class="route-name-input" type="checkbox" id="selectallroutscheckbox" name="selectAll">
            <label class="route-name" for="selectallroutscheckbox">
            <span>Select All </span>
            <!-- <em>())</em> -->
            </label>
        </li>
    </ul>
                    <a class="all-permissions-view" href="{{url('permissions')}}">All Permission</a>
    <!-- {{ Form::open(array('url' => 'permissions')) }} -->
    
    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}

    <div class="form-group">
    {{ Form::label('name', 'Permission Name') }}
    {{ Form::text('name', $permission->name, array('class' => 'form-control', 'placeholder'=>"Enter Permission name...")) }}
    </div>
    <br>
    <!-- <div class="form-group"> -->
        
        {{ Form::label('name', ' Select allowed Route(s)') }}
        <div class="route-list-wrapper">
            <div class="col-md-12">
                <div class="row">
                    <h5>All available Routes</h5>
                    <ul class="routlist">
                    <?php

                    $appCompleteRouteNames     = [];
                    $allowedCompleteRouteNames = [];
                    foreach ($route_list as  $singleAppRouteData) 
                    {   
                        $appRouteName    = $singleAppRouteData['uri'];
                        $appRouteMethods = $singleAppRouteData['method'];
                        
                        foreach ($appRouteMethods as $methodName) 
                        {
                            $appCompleteRouteNames[] = $appRouteName."@".$methodName;
                        }
                    }

                    $allowedCompleteRouteNames = array_keys($allowed_routes);
                    $sr = 0;
                    foreach ($appCompleteRouteNames as $key => $value) 
                    {
                        $sr ++;

                        if (in_array($value, $allowedCompleteRouteNames)) 
                        {
                            $route_data = explode("@", $value);
                            ?>
                            <li>
                                <!-- <span class="sr-no-route">[<?php //echo $sr; ?>] </span> -->
                                <input class="route-name-input" type="checkbox" name="{{$value}}" checked>
                                <label class="route-name"><span>{{$route_data['0']}}</span> <em>{{$route_data['1']}}</em></label>   
                            </li>
                            <?php
                            }
                            else
                            {
                                $route_data = explode("@", $value);
                            ?>
                            <li>
                                <!-- <span class="sr-no-route">[<?php //echo $sr; ?>] </span> -->
                                <input class="route-name-input" type="checkbox" name="{{$value}}" >
                                <label class="route-name"><span>{{$route_data['0']}}</span> <em>{{$route_data['1']}}</em></label>   
                            </li>
                            <?php
                        }
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
        <br>
    <!-- </div> -->
    {{ Form::submit('Edit Permission', array('id'=>"edit-permission-submit", 'class' => 'btn btn-primary edit-permission-submit')) }}
    {{ Form::close() }}
    <br>
</div>
                
            </div>
            <div class="box-footer"> Footer </div>
        </div>
    </section>
</div>









    
    <!-- Main content -->


@endsection