<?php $__env->startSection('title', '| Roles'); ?>

<?php $__env->startSection('content'); ?>

<div class="col-lg-10 col-lg-offset-1">
    <h3>All Roles
<!-- 
    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-default pull-right">Users</a>
    <a href="<?php echo e(route('permissions.index')); ?>" class="btn btn-default pull-right">Permissions</a> --></h3>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
            <?php $sr=0; ?>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $sr++; ?>
                <tr>
                    <td><?php echo e($sr); ?></td>
                    <td><?php echo e($role->name); ?></td>

                    <td><?php echo e($role->permissions()->pluck('name')->implode(' ,  ')); ?></td>
                    <td>
                    <a href="<?php echo e(URL::to('roles/'.$role->id.'/edit')); ?>" class="btn-edit-cl btn-info" style="margin-right: 3px;">Edit</a>

                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn-delete-cl btn btn-danger']); ?>

                    <?php echo Form::close(); ?>


                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>

    <a href="<?php echo e(URL::to('roles/create')); ?>" class="btn btn-success">Add Role</a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>