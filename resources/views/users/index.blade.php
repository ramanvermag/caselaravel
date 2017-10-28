@extends('dashboard.main')

@section('title', '| Users')

@section('content-page')







      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Listing of users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
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
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </form>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Select</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date/Time Added</th>
                    <th>Roles</th>
                    <th>Status</th>
                    <th>Activate | Deactivate</th>
                    <th>Edit | Delete</th>
                </tr>
                </thead>
                <tbody>


                <?php $sr = 0; ?>

                @foreach ($users as $user)

                <?php $sr++; ?>
                <?php  ?>

                <tr>

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
                            $utc =  $user->created_at;
                            $dt = new DateTime($utc);
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
                        <span style="color:green" id="user-status">Active</span>
                    @else
                        <span style="color:red" id="user-status">Inactive</span>
                    @endif
                    </td>
                    <td>   

                    @if($user->status == "active")
                       <a href="{{ URL::to('deactivateUser/' . $user->id) }}" id="deactivate_user" class="btn-act-dact" >Deactivate</a>
                    @else
                       <a href="{{ URL::to('activateUser/' . $user->id) }}" id="activate_user" class="btn-act-dact" >Activate </a>
                    @endif              
                  
                    </td>                 
                    <td>                    
                        <a href="{{ route('users.edit', $user->id) }}" class="user-action-btn" >Edit</a>
                        <a href="{{ URL::to('delete/' . $user->id) }}" class="user-action-btn del" >Delete</a>                    
                    </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                    <th>select</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date/Time Added</th>
                    <th>Roles</th>
                    <th>Status</th>
                    <th>Activate | Deactivate</th>
                    <th>Edit | Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->








    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">



    <div class="overlay">
    <div class="loader-holder">

    <div class="loader"></div> 
    </div>
    </div>


<!--     <div class="col-lg-11 col-lg-offset-0">

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
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </form>
    </div> -->
<!--     <div class="col-lg-1 col-lg-offset-0">

        <a href="{{ route('users.create') }}">Add user</a>
    </div> -->
  

<div class="col-lg-12 col-lg-offset-0">
    <br>



    {!! Form::open(['method' => 'POST', 'action' => 'UserController@BulkAction']) !!}


<!-- 

    <table class="users-table">
        <tr>
            <th><input id="select_all" type="checkbox" name="select"> &nbsp;Select all</th>
                    <th>Sr.</th>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Pincode</th>
                    <th>Date/Time Added</th>
                    <th>Roles</th>
                    <th>Status</th>
                    <th>Activate | Deactivate</th>
                    <th>Edit | Delete</th>
            
        </tr>

                <?php $sr = 0; ?>

                @foreach ($users as $user)

                <?php $sr++; ?>
                <?php  ?>

                <tr>

                    <td><input type="checkbox" class="check-user" name="user_ids[]" value="{{ $user->id }}" ></td>
                    <td>{{ $sr }}</td>
                    <td>{{ $user->id }}</td>
                    <td>

                        @if( !$user->profile_picture )
                            <center>
                                <img class="user-img" src="{{asset('img')}}/profil-dummy.png">
                            </center>
                        @else
                            <center>
                                <img class="user-img" src="{{asset('user_profile_pics')}}/{{ $user->id }}/profile/{{ $user->profile_picture}}">
                            </center>
                        @endif                   
                    </td>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->residential_address }}</td>
                    <td>{{ $user->pincode }}</td>
                    <td>
                        <?php 
                            $utc =  $user->created_at;
                            $dt = new DateTime($utc);
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
                        <span style="color:green" id="user-status">Active</span>
                    @else
                        <span style="color:red" id="user-status">Inactive</span>
                    @endif
                    </td>
                    <td>   

                    @if($user->status == "active")
                       <a href="{{ URL::to('deactivateUser/' . $user->id) }}" id="deactivate_user" class="btn-act-dact" >Deactivate</a>
                    @else
                       <a href="{{ URL::to('activateUser/' . $user->id) }}" id="activate_user" class="btn-act-dact" >Activate </a>
                    @endif              
                  
                    </td>                 
                    <td>                    
                        <a href="{{ route('users.edit', $user->id) }}" class="user-action-btn" >Edit</a>
                        <a href="{{ URL::to('delete/' . $user->id) }}" class="user-action-btn del" >Delete</a>                    
                    </td>
                </tr>
                @endforeach



    </table> 
 -->


    <?php $currunt_rout = \Request::route()->getName();      ?>

        {{ Form::select('BulkAction', array('se' => 'Select Action', 'delete' => 'Delete', 'activate' => 'Activate', 'deactivate' => 'Deactivate', ), null, array('class' => 'bulk-action-dropdown', 'disabled' => 'disabled', 'id' => 'bulk_action')) }}

        {!! Form::submit('Apply Action', ['class' => 'btn-disabled', "id" => 'apply_action', "disabled"]) !!}



        {!! Form::close() !!}

        @if($currunt_rout =="users.index")

            {!! $users->appends(['oc' => '1'])->render() !!}   

        @endif

        @role('Admin')
        <div>
            <h4>Utilities</h4>
            <a class="active" href="#">Clean Database</a>
        </div>
        @endrole

</div>

</div>
</section>
</div>


@endsection