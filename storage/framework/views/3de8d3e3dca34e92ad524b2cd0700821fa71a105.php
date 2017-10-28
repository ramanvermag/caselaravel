 


    <?php $__env->startSection('title', '| user profile'); ?>

        <?php $__env->startSection('content-page'); ?>



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
                                        

                                        <?php if(isset($properties['profile_picture'])): ?>
                                            
                                            <img  src="<?php echo e(asset('user_profile_pics')); ?>/<?php echo e($properties['id']); ?>/profile/<?php echo e($properties['profile_picture']); ?>">

                                        <?php else: ?>
                                            
                                            <img class="user-dummy-pic"  src="img/profil-dummy.png">

                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-2 col-md-offset-8">

                                <div class="">
                                      
                                        <a href="<?php echo e(url('profile/')); ?>/<?php echo e($properties['id']); ?>/edit" class="profile-edit-btn" id="edit-profile">Edit Profile</a>
                                </div>
                            </div>

                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Id</span>
                            <span class="property-value"><?php echo e($properties['id']); ?></span>
                            
                            
                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Name</span>
                            <span class="property-value"><?php echo e($properties['name']); ?></span>
                            
                        </div>
                         <div class="property-row">
                            
                            <span class="property-label">Gender</span>
                            <span class="property-value"><?php echo e($properties['gender']); ?></span>
                            
                        </div>

                         <div class="property-row">
                            
                            <span class="property-label">Role(s)</span>
                            <span class="property-value"><?php echo e(implode(", ",$properties['roles'])); ?></span>
                            
                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Email</span>
                            <span class="property-value"><?php echo e($properties['email']); ?></span>
                            
                        </div>


                        <div class="property-row">
                            
                            <span class="property-label">Phone</span>
                            <span class="property-value"><?php echo e($properties['phone']); ?></span>
                            
                        </div>

                        <div class="property-row">
                            
                            <span class="property-label">Address</span>
                            <span class="property-value"><?php echo e($properties['address']); ?></span>
                            
                        </div>
                        <div class="property-row">
                            
                            <span class="property-label">Pincode</span>
                            <span class="property-value"><?php echo e($properties['pincode']); ?></span>
                            
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
                            <span class="property-value" style="color: green"><?php echo e(ucfirst($properties['status'])); ?></span>
                            
                        </div>
                        
                    </div>
             
                </div>
    
   
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>








        
                
          
            

<?php $__env->stopSection(); ?>
                                        
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>