 
@extends('layouts.app')

    @section('title', '| user profile')

        @section('content-of-user')



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

              <div class='col-lg-12'>
                    <!-- <h3>User profile</h3> -->

                    <div class="user-profile-wrapper">

                        <div class="row">

                            <div class="col-md-2">

                                <div class="">

                                    <?php //print_r($properties); die; ?>

                                    <span class="property-profile-pic">
                                        

                                        @if(isset($properties['profile_picture']))
                                            
                                            <img  src="{{asset('user_profile_pics')}}/{{ $properties['id'] }}/profile/{{ $properties['profile_picture'] }}">

                                        @else
                                            
                                            <img class="user-dummy-pic"  src="img/profil-dummy.png">

                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-2 col-md-offset-8">

                                <div class="">
                                      
                                        <a href="{{url('profile/')}}/{{$properties['id']}}/edit" class="profile-edit-btn" id="edit-profile">Edit Profile</a>
                                </div>
                            </div>

                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Id</span>
                            <span class="property-value">{{ $properties['id'] }}</span>
                            
                            
                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Name</span>
                            <span class="property-value">{{ $properties['name'] }}</span>
                            
                        </div>
                         <div class="property-row">
                            
                            <span class="property-label">Gender</span>
                            <span class="property-value">{{ $properties['gender'] }}</span>
                            
                        </div>

                         <div class="property-row">
                            
                            <span class="property-label">Role(s)</span>
                            <span class="property-value">{{ implode(", ",$properties['roles'])  }}</span>
                            
                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Email</span>
                            <span class="property-value">{{ $properties['email'] }}</span>
                            
                        </div>


                        <div class="property-row">
                            
                            <span class="property-label">Phone</span>
                            <span class="property-value">{{ $properties['phone'] }}</span>
                            
                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Address</span>
                            <span class="property-value">{{ $properties['address'] }}</span>
                            
                        </div>
                        <div class="property-row">
                            
                            <span class="property-label">Pincode</span>
                            <span class="property-value">{{ $properties['pincode'] }}</span>
                            
                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Created at</span>
                            <span class="property-value">

                               <?php 
                                    $utc = $properties['created_at'];
                                    $dt = new DateTime($utc);
                                    $tz = new DateTimeZone('Asia/Kolkata');
                                    $dt->setTimezone($tz);
                                    echo $dt->format('D d M Y h:i:s a'), PHP_EOL;
                                ?>

                            </span>
                            
                        </div>

                         <div class="property-row">
                            
                            <span class="property-label">Status</span>
                            <span class="property-value" style="color: green">{{ ucfirst($properties['status']) }}</span>
                            
                        </div>
                        
                    </div>
             
                </div>
    
   
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>








        
                
          
            

@endsection
                                        