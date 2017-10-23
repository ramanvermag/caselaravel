<?php $__env->startSection('title', '| Create Permission'); ?>

<?php $__env->startSection('content'); ?>

    <div class='col-lg-8 col-lg-offset-2'>
    

    <h3>Edit Permission <b><?php echo e($permission->name); ?></b>  </h3>
    <ul class="routlist">
        <li>
            <input class="route-name-input" type="checkbox" id="selectallroutscheckbox" name="selectAll">
            <label class="route-name" for="selectallroutscheckbox">
            <span>Select All </span>
            <!-- <em>())</em> -->
            </label>
        </li>
    </ul>
                    <a class="all-permissions-view" href="<?php echo e(url('permissions')); ?>">All Permission</a>
    <!-- <?php echo e(Form::open(array('url' => 'permissions'))); ?> -->
    
    <?php echo e(Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT'))); ?>


    <div class="form-group">
    <?php echo e(Form::label('name', 'Permission Name')); ?>

    <?php echo e(Form::text('name', $permission->name, array('class' => 'form-control', 'placeholder'=>"Enter Permission name..."))); ?>

    </div>
    <br>
    <!-- <div class="form-group"> -->
        
        <?php echo e(Form::label('name', ' Select allowed Route(s)')); ?>

        <div class="route-list-wrapper">
            <div class="col-md-12">
                <div class="row">
                    <h5>All available Routes</h5>
                    <ul class="routlist">
                    <?php

                    $appCompleteRouteNames 	   = [];
                    $allowedCompleteRouteNames = [];
                    foreach ($route_list as  $singleAppRouteData) 
                    {	
                        $appRouteName    = $singleAppRouteData['uri'];
                        $appRouteMethods = $singleAppRouteData['method'];
                        
                        foreach ($appRouteMethods as $methodName) 
                        {
                            $appCompleteRouteNames[] = $appRouteName."@".$methodName;
                        }
                    }

                    $allowedCompleteRouteNames = array_keys($allowed_routes);
                    $sr = 0;
                    foreach ($appCompleteRouteNames as $key => $value) 
                    {
                        $sr ++;

                        if (in_array($value, $allowedCompleteRouteNames)) 
                        {
                            $route_data = explode("@", $value);
                            ?>
                            <li>
                                <span class="sr-no-route">[<?php echo $sr; ?>] </span>
                                <input class="route-name-input" type="checkbox" name="<?php echo e($value); ?>" checked>
                                <label class="route-name"><span><?php echo e($route_data['0']); ?></span> <em><?php echo e($route_data['1']); ?></em></label>	
                            </li>
                            <?php
                            }
                            else
                            {
                                $route_data = explode("@", $value);
                            ?>
                            <li>
                                <span class="sr-no-route">[<?php echo $sr; ?>] </span>
                                <input class="route-name-input" type="checkbox" name="<?php echo e($value); ?>" >
                                <label class="route-name"><span><?php echo e($route_data['0']); ?></span> <em><?php echo e($route_data['1']); ?></em></label>	
                            </li>
                            <?php
                        }
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </div>
        <br>
    <!-- </div> -->
    <?php echo e(Form::submit('Edit Permission', array('id'=>"edit-permission-submit", 'class' => 'btn btn-primary edit-permission-submit'))); ?>

    <?php echo e(Form::close()); ?>

    <br>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>