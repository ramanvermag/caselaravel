<?php $__env->startSection('title', '| Create Permission'); ?>

<?php $__env->startSection('content'); ?>

<div class='col-lg-8 col-lg-offset-2'>

    

    <h3>Create Permission</h3>
 
    <?php echo e(Form::open(array('url' => 'permissions'))); ?>


    <div class="form-group">
        <?php echo e(Form::label('name', 'Permission Name')); ?>

        <?php echo e(Form::text('name', '', array('class' => 'form-control', 'placeholder'=>"Enter Permission name..."))); ?>

    </div>
    <br>

    <div class="form-group">
        <?php echo e(Form::label('name', ' Select allowed Route(s)')); ?>

       <fieldset>

    <!--     <div class="col-md-12">
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="route-list-wrapper">
                    <h5>All available Routes</h5>
                        <select name="selectfrom" id="select-from" multiple size="10">

                            <?php foreach($route_list as $route): ?>

                                <option value="<?php  echo $route['uri']; ?>">

                                 <?php  echo $route['uri']." (";  echo $route['method'].")"; ?>
                                     
                                </option>
                            
                            <?php endforeach; ?>                        
                            
                        </select>
                        
                        <a href="JavaScript:void(0);" id="btn-add">Add &raquo;</a>
                    
                    </div>
                </div>
        </div>
 
        <div class="col-md-6">
            <div class="row">
                <div class="route-list-wrapper">

                    <h5>Allowed Routes</h5>



                    
                    <select name="selectto[]" id="select-to" multiple size="10">

                    </select>
                    
                    <a href="JavaScript:void(0);" id="btn-remove">&laquo; Remove </a>
                
                </div>
        </div> -->

                <div class="route-list-wrapper">
                    
                <div class="col-md-12">
                    <div class="row">
                    <h5>All available Routes</h5>

                        
                        

                            <?php foreach($route_list as $route): ?>
                                
                                <div class="col-md-4">
                                    <div class="row">
                                        

                                    <?php $route_name   = $route['uri']; $method = $route['method'];  ?>


                                    <input class="route-name-input" type="checkbox" name="<?php echo $route_name; ?>" id="<?php echo e($route_name); ?><?php echo e($method); ?>">
                                        
                                        <label class="route-name" for="<?php echo e($route_name); ?><?php echo e($method); ?>">
                                           <?php echo e($route_name); ?>  <em><?php echo e($method); ?></em>
                                        </label>

                                    </div>



                                </div>

                            <?php endforeach; ?>                        
                            
                        
                        <!-- <a href="JavaScript:void(0);" id="btn-add">Add &raquo;</a> -->
                    
                    </div>
                </div>
        </div>
 

 
  </fieldset>
    </div>
   

    <?php if(!$roles->isEmpty()): ?>

        <h4>Assign Permission to Roles</h4>


        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php echo e(Form::checkbox('roles[]',  $role->id )); ?>

            <?php echo e(Form::label($role->name, ucfirst($role->name))); ?><br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>

    
    <br>
    <?php echo e(Form::submit('Create Permission', array('class' => 'btn btn-primary create-permission-submit'))); ?>


    <?php echo e(Form::close()); ?>

    <br>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>