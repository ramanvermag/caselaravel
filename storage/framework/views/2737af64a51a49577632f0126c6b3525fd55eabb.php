<?php $__env->startSection('title', '| Permissions'); ?>

<?php $__env->startSection('content-of-user'); ?>

<div class="content-wrapper">
            <section class="content-header">
                <h1> Message <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">
                 <?php if($errors->any()): ?>             
                
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    
                    <?php endif; ?>
                     <?php if(Session::get('message')): ?>
                <div class="callout callout-success">
                    
                    <h4><?php echo e(Session::get('message')); ?></h4>
                
                </div>
                <?php endif; ?>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit  <b><?php echo e(str_limit($message->heading,30)); ?></b></h3>
                        <div class="box-tools pull-right">
                            <!-- <span class="btn"><a href="<?php echo e(url('message')); ?>">Back to message</a></span> -->
                        </div>
                    </div>
                   
                    <div class="box-body"> 
                        
                    <div class="row">
                        <div class="col-md-12">

                        

                        
                        
                        <?php echo e(Form::model($message, array('route' => array('message.update', $message->id), 'method' => 'PUT'))); ?>

                        


                        <div class="form-group">
                            <?php echo e(Form::label('heading', 'Heading')); ?>

                            <?php echo e(Form::text('heading', null, array('class' => 'form-control'))); ?>

                            <br>

                            <?php echo e(Form::label('message', 'Message')); ?>

                            <?php echo e(Form::textarea('message', null, array('class' => 'form-control'))); ?>

                            <br>

                            <?php echo e(Form::label('file_link', 'File Link')); ?>

                            <?php echo e(Form::url('file_link', null, array('class' => 'form-control'))); ?>

                            <span class="text-muted eg-text"><small>http://www.example.com</small></span>
                            <br>

                            <?php echo e(Form::submit('Update', array('class' => 'btn btn-success'))); ?>

                            <a class="btn btn-default" href="<?php echo e(url('message')); ?> ">Cancle</a>
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