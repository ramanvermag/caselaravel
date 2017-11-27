<?php $__env->startSection('title', '| Edit Role'); ?>

<?php $__env->startSection('content-of-user'); ?>




<div class="content-wrapper">
    <section class="content-header">
        <h1> Roles <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Role :<b> <?php echo e($role->name); ?></b></h3>
                
            </div>
            <?php if(Session::get('message')): ?>
                
                <div class="callout callout-success">
                    
                    <h4><?php echo e(Session::get('message')); ?></h4>
                
                </div>
                
            <?php endif; ?>
            <div class="box-body">
                <div class="col-lg-12">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                       
                        <div class='col-lg-12'>
                            <h3></h3>

                            
                            <?php echo e(Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT'))); ?>


                            <div class="form-group">
                                <?php echo e(Form::label('name', 'Role Name')); ?>

                                <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                            </div>

                            <h5><b>Assign Permissions</b></h5>
                            
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php echo e(Form::checkbox('permissions[]',  $permission->id, $role->permissions )); ?>

                                <?php echo e(Form::label($permission->name, ucfirst($permission->name))); ?><br>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <br>

                            <?php echo e(Form::submit('Update Role', array('class' => 'btn btn-success'))); ?>

                            <a class="btn btn-default" href="<?php echo e(url('roles')); ?>">Cancle</a>

                            <?php echo e(Form::close()); ?>    
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="box-footer"> Footer </div>
        </div>
    </section>
</div>












   

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>