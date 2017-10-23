<?php $__env->startSection('title', '| Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-3">
            <div class="row">
                
                <div class="left-menu">
                        <ul>
                            <li><a href="#">menu item</a></li>
                            <li><a href="#">menu item</a></li>
                            <li><a href="#">menu item</a></li>
                            <li><a href="#">menu item</a></li>
                            <li><a href="#">menu item</a></li>
                            <li><a href="#">menu item</a></li>
                        </ul>
                </div>
                
            </div>
        </div>

        <div class="col-lg-10 col-sm-10 col-md-10 col-xs-9">
            <div class="row">
            <div class="right-content-area">
                    content content content content content content content content content 
            </div>
        </div>
        </div>
    </div>
</div>
   

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>