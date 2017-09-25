    <?php $__env->startSection('title', '| Add User'); ?>

        <?php $__env->startSection('content'); ?>

            <div class='col-lg-8 col-lg-offset-2'>
            <div class="adduserform">
            <div class="col-md-12">
            <h3> Add User</h3>
            </div>
            


        
            <?php echo e(Form::open(array('url' => 'users', 'id' => "create-user-form", 'enctype' => 'multipart/form-data'))); ?>


                <div class="col-md-4">
                    <div class="form-group">

                        <?php echo e(Form::text('name', '', array('id' => 'name', 'class' => 'form-control' ,'placeholder' => 'Name'))); ?>


                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo e(Form::email('email', '', array('id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email'))); ?>

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo e(Form::text('phone', '', array( 'id' => 'phone','maxlength' => '10', 'class' => 'form-control', 'placeholder' => 'Phone (Eg. 9876543210)'))); ?>

                    </div>
                </div>

                <div class="col-md-4">                    
                    <div class="form-group">
                        <?php echo e(Form::select('gender', ['male' => 'Male',   'female' => 'Female'],  null, array('class' => 'form-control'))); ?>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo e(Form::textarea('residential_address', '', array('id' => 'address', 'class' => 'form-control address-field', 'placeholder' => 'Residential address'))); ?>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo e(Form::text('pincode', '', array('id' => 'pincode', 'class' => 'form-control','maxlength' => '6', 'placeholder' => 'Pincode (Eg. 110005)'))); ?>

                    </div>
                </div>

                <div class="col-md-4">                    
                    <div class="form-group">


                        <div class='input-group date'>
                    <?php echo e(Form::text('dob', '', array('name'=>'dob', "id"=>"datepicker", 'class' => 'form-control', 'placeholder' => 'D.O.B'))); ?>                    
                           <!--  <input name="dob" id="datepicker" type='text' class="form-control" data-provide="datepicker" placeholder="D.O.B" /> -->
                            <span class="input-group-addon datepicker-icon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                      
                    </div>
                </div>

               
                <div class="col-md-4">                    
                    <div class="form-group">
                        <?php echo e(Form::password('password', array('id' => 'pwd','class' => 'form-control', 'placeholder' => 'Password'))); ?>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <?php echo e(Form::password('password_confirmation', array('id' => 'cpwd','class' => 'form-control', 'placeholder' => 'Confirm Password'))); ?>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <img class="user-image-perview" id="preview" src="#" alt="Pofile Picture" />
                        
                            <?php echo Form::file('profile_picture', array('id' => 'fileUploader')); ?>

                        
                    </div>
                </div>

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
                
                <div class="col-md-12">
                    <div class="form-group">    
                        <?php echo e(Form::submit('Add User', array('class' => 'btn btn-primary', 'id' => 'create-user-account'))); ?>

                    </div>
                </div>

            <?php echo e(Form::close()); ?>


            </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>