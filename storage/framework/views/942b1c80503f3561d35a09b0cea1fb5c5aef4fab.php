<?php //die('dfhdjhdfkjhgkjdhfghdfk'); ?>
<?php $__env->startSection('title', '| View Post'); ?>

<?php $__env->startSection('content-of-user'); ?>
   
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Edit message <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><b># <?php echo e($message->id); ?>  <?php echo e(str_limit($message->heading, 50)); ?></b></h3>
                        <div class="box-tools pull-right">
                            <!-- <a href="<?php echo e(url('message')); ?> " class="btn">Back to messages</a> -->

                           <!--  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> 
                                <i class="fa fa-minus"></i>
                            </button> -->

                            <!-- 
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"> 
                                <i class="fa fa-times"></i>
                            </button>
                             -->

                        </div>
                    </div>
                    <div class="box-body">                      


                        <div class="bs-callout">
                            <p><b>Heading</b></p>
                            <p><?php echo e($message->heading); ?></p>
                            <hr>
                            <p><b>Message</b></p>
                            <p><?php echo e($message->message); ?></p>
                            <hr>
                            <p><b>Link</b></p>
                            <a  href="<?php echo e($message->file_link); ?>"><?php echo e($message->file_link); ?></a>
                            
                        </div>
                        
                        <a class="btn btn-info pull-right" href="<?php echo e(URL::to('/message')); ?>/<?php echo e($message->id); ?>/edit">Edit</a>

                       

                        <form action="<?php echo e(route('message.destroy', $message->id)); ?>" method="POST">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button class="btn btn-danger pull-right del-message">Delete</button>
                        </form>

                        <a href="<?php echo e(url('message')); ?> " class="btn btn-default">Back to messages</a>
                            
                        </div>
                    <div class="box-footer text-muted "> Edit message </div>
                </div>
            </section>
        </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>