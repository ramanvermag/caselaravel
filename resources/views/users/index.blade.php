@extends('dashboard.main')
@section('title', '| Members')
@section('content-of-user')

<div class="content-wrapper">
    <section class="content-header">

        <h1> All Members <small>...</small> </h1>

        <ol class="breadcrumb">
        
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i>Dasboard</a></li>
            <li><a class="active">Members</a></li>
            <!-- <li class="active">Membesrs listing</li> -->

        </ol>

    </section>

    <section class="content">
        <div class="box">            
            <div class="box-header with-border">            
                <h3 class="box-title"><a href="#">Member's listing</a></h3>
                <div class="box-tools pull-right">                    
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> 
                        <i class="fa fa-minus"></i>
                    </button>                    
                    <!-- 
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">

                        <i class="fa fa-times"></i>
                    </button>
                     -->           
                </div>
            </div>

            <div class="box-body">
            
            @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
            @endif



            <div class="">
                <div class="box-header">
                <h3 class="box-title">Search members</h3>

                <div class="box-tools pull-right">
            
         
                </div>
                </div>
                <div class="box-body">
                  <div class="col-lg-11 col-lg-offset-0">
                    <form action="{{url('search')}}" method="POST" role="search">
                        {{ csrf_field() }}
                        
                        <div class="search-box-part">               
                            
                            <input type="text" name="keyword" placeholder="Search..." class="search-box-users">
                        
                        </div>

                        <div class="search-box-part">
                            
                            <span>&nbsp;&nbsp;Filter By Role&nbsp;&nbsp;</span>
                            
                            <select name="search_by_role">
                                
                                <option value="">All</option>            
                                
                                @foreach($roles as $role)            
                                
                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                
                                @endforeach
                            </select>

                        </div>


                        <span class="select-box-part">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </form>
                </div>
                </div>
                <!-- /.box-body -->
                    
                <!-- /.box-footer-->
            </div>
              

                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                               
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Select</th><th>Image</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Date/Time Added</th>
                                                <th>Roles</th>
                                                <th>Status</th>
                                                <th>Activate | Deactivate</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $sr = 0; ?>

                                            @foreach ($users as $user)

                                            <?php $sr++; ?>
                                            <?php  ?>

                                            <tr class="align-middle">

                                                <td><input type="checkbox" class="check-user" name="user_ids[]" value="{{ $user->id }}" ></td>
                                                <td>
                                                    @if( !$user->profile_picture )
                                                    <center>
                                                        <img class="user-img" src="{{asset('img')}}/profil-dummy.png" alt="user image">
                                                    </center>
                                                    @else
                                                    <center>
                                                        <img class="user-img" src="{{asset('user_profile_pics')}}/{{ $user->id }}/profile/{{ $user->profile_picture}}" alt="{{ $user->name }}">
                                                    </center>
                                                    @endif                   
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td>
                                                    <?php 
                                                    $utc = $user->created_at;
                                                    $dt  = new DateTime($utc);
                                                    $tz = new DateTimeZone('Asia/Kolkata');
                                                    $dt->setTimezone($tz);
                                                    echo $dt->format('D d M Y h:i:s a'), PHP_EOL;
                                                    ?>
                                                </td>

                                                <td>
                                                    @foreach ($user->roles as $user_role)
                                                    {{$user_role->name}}
                                                    @endforeach
                                                </td>

                                                <td>
                                                    @if($user->status == "active")
                                                    <span id="user-status" class="label bg-green">Active</span>
                                                    @else
                                                    <span id="user-status" class="label bg-red">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>   
                                                    @if($user->status == "active")
                                                    <a href="{{ URL::to('deactivateUser/' . $user->id) }}" id="deactivate_user" class="btn-act-dact" >Deactivate</a>
                                                    @else
                                                    <a href="{{ URL::to('activateUser/' . $user->id) }}" id="activate_user" class="btn-act-dact" >Activate </a>
                                                    @endif              
                                                </td>                 

                                                <td class="">
                                                    <a href="{{ route('users.edit', $user->id) }}" class="user-action-btn btn btn-block btn-flat btn-info" >Edit</a>
                                                    <a href="{{ URL::to('delete/' . $user->id) }}" class="user-action-btn del btn btn-block btn-danger btn-flat" >Delete</a>                    
                                                </td>

                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                            </div>
                        </div>
                    </div>
                </section>



                <section class="content">

                    <div class="row">

                    <div class="overlay"><div class="loader-holder"><div class="loader"></div></div></div>

                        <div class="col-lg-12 col-lg-offset-0">

                            {!! Form::open(['method' => 'POST', 'action' => 'UserController@BulkAction']) !!}

                            <?php $currunt_route = \Request::route()->getName();      ?>

                            {{ Form::select('BulkAction', array('se' => 'Select Action', 'delete' => 'Delete', 'activate' => 'Activate', 'deactivate' => 'Deactivate', ), null, array('class' => 'bulk-action-dropdown', 'disabled' => 'disabled', 'id' => 'bulk_action')) }}

                            {!! Form::submit('Apply Action', ['class' => 'btn-disabled', "id" => 'apply_action', "disabled"]) !!}

                            {!! Form::close() !!}

                            @if($currunt_route =="users.index")

                            {!! $users->appends(['oc' => '1'])->render() !!}   

                            @endif
                            <div>
                                <h4>Utilities</h4>
                                <a class="active" href="#">Clean Database</a>
                            </div>

                        </div>
                    
                    </div>


                </section>
            </div>
            
            <div class="box-footer"> Footer </div>
        
        </div>
    </section>
</div>


@endsection