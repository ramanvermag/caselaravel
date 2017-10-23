@extends('layouts.app')

@section('title', '| Users')

@section('content')

       <div class="overlay">
       <div class="loader-holder">
           
     <div class="loader"></div> 
       </div>
</div>


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
    <div class="col-lg-1 col-lg-offset-0">

        <a href="{{ route('users.create') }}">Add user</a>
    </div>
  

<div class="col-lg-12 col-lg-offset-0">
    <br>



    {!! Form::open(['method' => 'POST', 'action' => 'UserController@BulkAction']) !!}

    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead style="">
                <tr>
                    
                    <th><input id="select_all" type="checkbox" name="select"><!-- &nbsp;Select all --></th>
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
            </thead>

            <tbody>

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
            </tbody>

        </table>
    </div>

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

@endsection