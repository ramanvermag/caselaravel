<?php $__env->startSection('title', '| Edit User'); ?>

<?php $__env->startSection('content-page'); ?>

<div class='col-lg-12'>
            <div class="adduserform">
            <div class="col-md-12">
            <h3> Edit <?php echo e($user->name); ?>  </h3>
            </div>
            



            <div class="col-md-12">
                    <div class="form-group">

                        <div class="old-user-img-perview">


                            <?php if(!$user->profile_picture): ?>

                                <img class="old-user-image-perview-pic"  src="<?php echo e(asset('img')); ?>/profil-dummy.png">


                            <?php else: ?>
                                <img  class="old-user-image-perview-pic" 
                                      src="<?php echo e(asset('user_profile_pics')); ?>/<?php echo e($user->id); ?>/profile/<?php echo e($user->profile_picture); ?> ">

                            <?php endif; ?>



                        <span class="change-image"><i class="fa fa-camera" aria-hidden="true"></i></span>
                        </div>
                        <span class="user-id-badge">
                            
                        User Id: <?php echo e($user->id); ?>

                        </span>

                    </div>
            </div>

            
                

             <?php echo e(Form::model($user, array('route' => array('profile.update', $user->id), 'method' => 'PUT', 'enctype' =>'multipart/form-data'))); ?> 
             
      
                <div class="col-md-9">
                    <div class="form-group">
                        

                        <img style="display: none;" class="user-image-perview" id="preview" src="#" alt="Pofile Picture" />
                        
                            <?php echo Form::file('profile_picture', array('id' => 'fileUploader', 'style'=>'display: none;')); ?>

                        
                    </div>
                </div>
           

                <div class="col-md-6">
                    <div class="form-group">

                        <?php echo e(Form::label('name', 'Name')); ?>

                        <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                      

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">

                        <?php echo e(Form::label('name', 'Email')); ?>

                        <?php echo e(Form::text('email', null, array('class' => 'form-control'))); ?>

                      

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">

                        <?php echo e(Form::label('name', 'Phone')); ?>

                        <?php echo e(Form::text('phone', null, array('class' => 'form-control'))); ?>

                      

                    </div>
                </div>

                <div class="col-md-6">                    
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Gender')); ?>


                        <?php echo e(Form::select('gender', ['male' => 'Male',   'female' => 'Female'],  null, array('class' => 'form-control'))); ?>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Address')); ?>


                        <?php echo e(Form::textarea('residential_address', null, array('id' => 'address', 'class' => 'form-control address-field', 'placeholder' => 'Residential address'))); ?>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Pincode')); ?>


                        <?php echo e(Form::text('pincode', null, array('id' => 'pincode', 'class' => 'form-control','maxlength' => '6', 'placeholder' => 'Pincode (Eg. 110005)'))); ?>

                    </div>
                </div>

               
        

                <div class="col-md-6">                    
                    <div class="form-group">

                        <?php echo e(Form::label('name', 'D.O.B')); ?>

                        <div class='input-group date'>

                    <?php echo e(Form::text('dob', null, array('name'=>'dob', "id"=>"datepicker", 'class' => 'form-control', 'placeholder' => 'D.O.B'))); ?>                    
                         
                            <span class="input-group-addon datepicker-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      
                    </div>
                </div>

             <?php if($user->id != Auth::user()->id): ?>
             


                 <div class="col-md-12">
                    <div class='form-group'>
                        <p> <b>Roles</b> </p>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e(Form::checkbox('roles[]',  $role->id )); ?>

                            <?php echo e(Form::label($role->name, ucfirst($role->name))); ?><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <em class="user-msg">if you not asign any Role to user then default user role would be <b>simpleuser</b></em>
                    </div>
                </div>

            <?php endif; ?>
                
                <div class="col-md-12">
                    <div class="form-group">    
                        <?php echo e(Form::submit('Update Profile', array('class' => 'btn btn-primary', 'id' => 'create-user-account'))); ?>

                    </div>
                </div>

            <?php echo e(Form::close()); ?>


            </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>