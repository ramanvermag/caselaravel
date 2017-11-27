<?php //die('dfhdjhdfkjhgkjdhfghdfk'); ?>
<?php $__env->startSection('title', '| View Post'); ?>

<?php $__env->startSection('content-of-user'); ?>
   
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Bar Acts <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        
                    <a href="<?php echo e(url('baract')); ?>">                      
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                    
                    </div>
                    <div class="box-body">                      


                            <p><h4><b><?php echo e($baract->title); ?></b></h4></p>
                            <h5 >Chapters</h5>
                            
                            <div class="list-group">
                                
                                
                                  
                            <?php $__currentLoopData = $chapter_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($chapter=="No chapters"): ?>
                            
                            <div class="list-group-item">
                                
                                There's no chapter in this bar act yet. go to <b><a href="<?php echo e(url('chapter/create')); ?>">Create Chapters</a></b> to add chapters in this bar act.
                            </div>
                            
                            <?php else: ?>
                            
                            <a class="list-group-item" href="<?php echo e(url('chapter')); ?>/<?php echo e($chapter[0]); ?>">Chapter No : <span class=""><b><?php echo e($chapter[2]); ?></b></span>&nbsp;&nbsp; <?php echo e($chapter[1]); ?> </a>
                            
                            <?php endif; ?>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                            </div>
                            
                            
                            
                            
                        <!-- </div> -->
                        <p></p>
                        <a class="btn btn-info pull-right" href="<?php echo e(URL::to('/baract')); ?>/<?php echo e($baract->id); ?>/edit">Edit</a>

                       

                        <form action="<?php echo e(route('baract.destroy', $baract->id)); ?>" method="POST">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button class="btn btn-danger pull-right del-message">Delete</button>
                        </form>

                        <!-- <a href="<?php echo e(url('baract')); ?> " class="btn btn-default">Back to Bar Acts</a> -->
                            
                        </div>
                    <div class="box-footer text-muted "> Bar Acts </div>
                </div>
            </section>
        </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>