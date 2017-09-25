<?php $__env->startSection('title', '| Add Role'); ?>

<?php $__env->startSection('content'); ?>

<div class='col-lg-4 col-lg-offset-4'>

    <h3>Create Role</h3>
    
    

    <?php echo e(Form::open(array('url' => 'roles'))); ?>


    <div class="form-group">
        <?php echo e(Form::label('name', 'Role Name')); ?>

        <?php echo e(Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Role Name'))); ?>

    </div>

    <h5><b>Assign Permissions</b></h5>

    <div class='form-group'>
        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e(Form::checkbox('permissions[]',  $permission->id )); ?>

            <?php echo e(Form::label($permission->name, ucfirst($permission->name))); ?><br>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php echo e(Form::submit('Create Role', array('class' => 'btn btn-primary'))); ?>


    <?php echo e(Form::close()); ?>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>