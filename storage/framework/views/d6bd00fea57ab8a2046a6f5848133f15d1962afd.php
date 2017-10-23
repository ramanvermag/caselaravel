<?php $__env->startSection('title', '| Create Permission'); ?>

<?php $__env->startSection('content'); ?>

<div class='col-lg-8 col-lg-offset-2'>

    


        <?php 
            foreach ($route_list as  $singleAppRouteData) 
            {	
                $appRouteName    = $singleAppRouteData['uri'];
                $appRouteMethods = $singleAppRouteData['method'];

                foreach ($appRouteMethods as $methodName) 
                {
                    $appCompleteRouteNames[] = $appRouteName."@".$methodName;
                }
            }
        ?>




    <h3>Create Permission</h3>





     
            
            <!-- <?php echo e(Form::label('name', ' Select allowed Route(s)')); ?> -->

            <div class="route-list-wrapper">
                <div class="col-md-12">
                    <div class="row">
                    <h5>All available Routes</h5>

                    <ul class="routlist">
                        <li>

                            <input class="route-name-input" type="checkbox" id="selectallroutscheckbox" name="selectAll">

                            <label class="route-name" for="selectallroutscheckbox">

                            <span>Select All </span>

                            </label>

                        </li>
                    </ul>
                    <a class="all-permissions-view" href="<?php echo e(url('permissions')); ?>">All Permission</a>
                        <?php echo e(Form::open(array('url' => 'permissions'))); ?>



                        <?php echo e(Form::label('name', 'Permission Name')); ?>


                        <?php echo e(Form::text('name', '', array('class' => 'form-control', 'placeholder'=>"Enter Permission name..."))); ?>


                        <ul class="routlist">
                            <?php 

                                $sr =  0;
                                foreach ($appCompleteRouteNames as $key => $value) 
                                {
                                    $sr++;
                                    $routeData = explode('@', $value);
                                    $routeName   = $routeData[0]; 
                                    $routeMethod = $routeData[1];
                                    ?>
                                    <li>
                                        <span class="sr-no-route">[<?php echo $sr; ?>] </span>

                                        <input id="<?php echo e($value); ?>" class="route-name-input" id="<?php echo e($value); ?>"  type="checkbox" name="<?php echo e($value); ?>">
                                        <label class="route-name" for="<?php echo e($value); ?>"><span> <?php echo e($routeName); ?></span> <em><?php echo e($routeMethod); ?></em></label>
                                    </li>
                                    <?php
                                }
                            ?>
                        </ul>

                        <?php echo e(Form::submit('Create Permission', array('id'=>"create-permission-submit", 'class' => 'btn btn-primary create-permission-submit'))); ?>

                        <?php echo e(Form::close()); ?>



                    </div>
                </div>
            </div>
      



</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>