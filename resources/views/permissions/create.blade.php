@extends('dashboard.main')

@section('title', '| Create Permission')

@section('content-page')

<div class='col-lg-6 col-lg-offset-2'>

    {{-- @include ('errors.list') --}}


        <?php 
            foreach ($route_list as  $singleAppRouteData) 
            {	
                $appRouteName    = $singleAppRouteData['uri'];
                $appRouteMethods = $singleAppRouteData['method'];

                foreach ($appRouteMethods as $methodName) 
                {
                    $appCompleteRouteNames[] = $appRouteName."@".$methodName;
                }
            }
        ?>




    <h3>Create Permission</h3>





     
            
            <!-- {{ Form::label('name', ' Select allowed Route(s)') }} -->

            <div class="route-list-wrapper">
                <div class="col-md-12">
                    <div class="row">
                    <h5>All available Routes</h5>

                    <ul class="routlist">
                        <li>

                            <input class="route-name-input" type="checkbox" id="selectallroutscheckbox" name="selectAll">

                            <label class="route-name" for="selectallroutscheckbox">

                            <span>Select All </span>

                            </label>

                        </li>
                    </ul>
                    <a class="all-permissions-view" href="{{url('permissions')}}">All Permission</a>
                        {{ Form::open(array('url' => 'permissions')) }}


                        {{ Form::label('name', 'Permission Name') }}

                        {{ Form::text('name', '', array('class' => 'form-control', 'placeholder'=>"Enter Permission name...")) }}

                        <ul class="routlist">
                            <?php 

                                $sr =  0;
                                foreach ($appCompleteRouteNames as $key => $value) 
                                {
                                    $sr++;
                                    $routeData = explode('@', $value);
                                    $routeName   = $routeData[0]; 
                                    $routeMethod = $routeData[1];
                                    ?>
                                    <li>
                                        <span class="sr-no-route">[<?php echo $sr; ?>] </span>

                                        <input id="{{$value}}" class="route-name-input" id="{{$value}}"  type="checkbox" name="{{$value}}">
                                        <label class="route-name" for="{{$value}}"><span> {{$routeName}}</span> <em>{{$routeMethod}}</em></label>
                                    </li>
                                    <?php
                                }
                            ?>
                        </ul>

                        {{ Form::submit('Create Permission', array('id'=>"create-permission-submit", 'class' => 'btn btn-primary create-permission-submit')) }}
                        {{ Form::close() }}


                    </div>
                </div>
            </div>
      



</div>
@endsection