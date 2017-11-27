@extends('dashboard.main')

@section('title', '| Create Permission')

@section('content-of-user')





    <div class="content-wrapper">

        <section class="content-header">
            <h1> Permissions <small>it all starts here</small> </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Add permission</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Permission</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class='col-lg-12 '>        
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
                        <!-- {{ Form::label('name', ' Select allowed Route(s)') }} -->
                        
                        <div class="route-list-wrapper">
                            <div class="col-md-12">
                                <div class="row">
                                <!-- <h5>All available Routes</h5> -->
                            
                              <!--   <input class="route-name-input" type="checkbox" id="selectallroutscheckbox" name="selectAll">
                                <label class="route-name" for="selectallroutscheckbox">
                                <span>Select All </span>
                                </label>
                                -->

                                    


                                {{ Form::open(array('url' => 'permissions')) }}
                                {{ Form::label('name', 'Permission Name') }}
                                {{ Form::text('name', '', array('class' => 'form-control', 'placeholder'=>"Enter Permission name...")) }}
                            
                                    <!-- /.box-header -->
                                      <table class="table table-hover">
                                        <tbody>
                                            <tr class="text-center">
                                              <th style="width: 10px">#</th>
                                              <th class="text-left">Route Name</th>
                                              <th class="text-center">Create</th>
                                              <th class="text-center">View</th>
                                              <th class="text-center">Edit</th>
                                              <th class="text-center">Delete</th>
                                            </tr>
                                        
                                        <tr class="text-center">
                                            <td>1</td>
                                            <td class="text-left"><b>Permissions</b></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>2</td>
                                            <td class="text-left"><b>Roles</b></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>

                                        </tr>
                                        <tr class="text-center">
                                            <td>3</td>
                                            <td class="text-left"><b>Users</b></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>
                                            <td><input type="checkbox" name=""></td>

                                        </tr>
                                        
                                     
                                              



                                      </tbody>
                                  </table>
                                    <!-- /.box-body -->









                                                
                                        <?php
                                            $sr =  0;
                                            foreach ($appCompleteRouteNames as $key => $value) 
                                            {
                                                $sr++;

                                                $routeData = explode('@', $value);
                                                $routeName   = $routeData[0]; 
                                                $routeMethod = $routeData[1];
                                                ?>
                                                     
                                                    <!-- 
                                                    <input id="{{$value}}" class="" id="{{$value}}"  type="checkbox" name="{{$value}}">
                                                    <label class="" for="{{$value}}"><span> {{$routeName}}</span> <em>{{$routeMethod}}</em></label>
                                                     -->

                                                    
                                                <?php
                                                
                                            }
                                        ?>
                                                

                                    {{ Form::submit('Create Permission', array('id'=>"create-permission-submit", 'class' => 'btn btn-primary create-permission-submit')) }}
                                    {{ Form::close() }}
                                

                                </div>
                            </div>
                        </div>












                        <div class="route-list-wrapper">
                            <div class="col-md-12">
                                <div class="row">
                                <h5>All available Routes</h5>
                            
                                        <input class="route-name-input" type="checkbox" id="selectallroutscheckbox" name="selectAll">
                                        <label class="route-name" for="selectallroutscheckbox">
                                        <span>Select All </span>
                                        </label>
                               

                                    


                                    {{ Form::open(array('url' => 'permissions')) }}
                                    {{ Form::label('name', 'Permission Name') }}
                                    {{ Form::text('name', '', array('class' => 'form-control', 'placeholder'=>"Enter Permission name...")) }}




                            
                                    <!-- /.box-header -->
                                      <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                          <th>#</th>
                                          <th>Select</th>
                                          <th>Route</th>
                                          <th>Method</th>
                                          <th>Description</th>
                                          <th>Mark</th>
                                        </tr>
                                     
                                              <?php
                                            $sr =  0;
                                            foreach ($appCompleteRouteNames as $key => $value) 
                                            {
                                                $sr++;

                                                $routeData = explode('@', $value);
                                                $routeName   = $routeData[0]; 
                                                $routeMethod = $routeData[1];
                                                ?>
                                                   <tr>
                                          <td>{{$sr}}</td>
                                          <td>
                                                    <input id="{{$value}}" class="" id="{{$value}}"  type="checkbox" name="{{$value}}">
                                              
                                          </td>
                                          <td>{{$routeName}}</td>
                                          <td>
                                              <span>
                                                <span <?php 
                                                            if(strtolower($routeMethod) == 'get'){echo"class='label method-get'";}
                                                            if(strtolower($routeMethod) == 'post'){echo"class='label method-post'";}
                                                            if(strtolower($routeMethod) == 'delete'){echo"class='label method-delete'";}
                                                            if(strtolower($routeMethod) == 'head'){echo"class='label method-head'";} 
                                                            if(strtolower($routeMethod) == 'put'){echo"class='label method-put'";} 
                                                            if(strtolower($routeMethod) == 'patch'){echo"class='label method-patch'";} ?>>
                                                            {{$routeMethod}}
                                                </span>
                                                </span>
                                          </td>
                                          <td><span><?php 

                                          if(strtolower($routeMethod) == 'get'){echo"Can get data";}
                                          if(strtolower($routeMethod) == 'post'){echo"Can send data";}
                                          if(strtolower($routeMethod) == 'head'){echo"Can check data is latest or not";} 
                                          if(strtolower($routeMethod) == 'put'){echo"Can update data";} 
                                          if(strtolower($routeMethod) == 'patch'){echo"Can update parts of data";} 
                                          if(strtolower($routeMethod) == 'delete'){echo"Can delete data";} 
                                          ?></span></td>
                                          <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                                     
                                                        
                                                    <!-- <input id="{{$value}}" class="" id="{{$value}}"  type="checkbox" name="{{$value}}"> -->
                                                    <!-- <label class="" for="{{$value}}"><span> {{$routeName}}</span> <em>{{$routeMethod}}</em></label> -->

                                                    
                                                <?php
                                                
                                            }
                                        ?>



                                       <!--  <tr>
                                          <td>219</td>
                                          <td>Alexander Pierce</td>
                                          <td>11-7-2014</td>
                                          <td><span class="label label-warning">Pending</span></td>
                                          <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr>
                                          <td>657</td>
                                          <td>Bob Doe</td>
                                          <td>11-7-2014</td>
                                          <td><span class="label label-primary">Approved</span></td>
                                          <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr>
                                        <tr>
                                          <td>175</td>
                                          <td>Mike Doe</td>
                                          <td>11-7-2014</td>
                                          <td><span class="label label-danger">Denied</span></td>
                                          <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                        </tr> -->
                                      </tbody>
                                  </table>
                                    <!-- /.box-body -->









                                                
                                        <?php
                                            $sr =  0;
                                            foreach ($appCompleteRouteNames as $key => $value) 
                                            {
                                                $sr++;

                                                $routeData = explode('@', $value);
                                                $routeName   = $routeData[0]; 
                                                $routeMethod = $routeData[1];
                                                ?>
                                                     
                                                    <!-- 
                                                    <input id="{{$value}}" class="" id="{{$value}}"  type="checkbox" name="{{$value}}">
                                                    <label class="" for="{{$value}}"><span> {{$routeName}}</span> <em>{{$routeMethod}}</em></label>
                                                     -->

                                                    
                                                <?php
                                                
                                            }
                                        ?>
                                                

                                    {{ Form::submit('Create Permission', array('id'=>"create-permission-submit", 'class' => 'btn btn-primary create-permission-submit')) }}
                                    {{ Form::close() }}
                                

                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="box-footer"> Footer </div>
            </div>
        </section>
    </div>



@endsection