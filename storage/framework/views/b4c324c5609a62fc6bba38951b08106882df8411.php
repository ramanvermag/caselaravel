<?php //die; ?>
<?php $__env->startSection('title', '| Create baract'); ?>

<?php $__env->startSection('content-of-user'); ?>
<?php //die; ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Bar Act <small>it all starts here</small> </h1>
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
                <div class="alert alert-success alert-dismissible">
                    
                    
                     
                         
                    <?php echo e(Session::get('message')); ?>

                     
                    
                
                </div>
                <?php endif; ?>

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create new Bar Act</h3>
                        <div class="box-tools pull-right">
                            <span class="btn btn-link"><a href="<?php echo e(url('baract')); ?>">View all</a></span>
                        </div>
                    </div>
                   
                    <div class="box-body"> 
                        
                        <div class="row">
                            <div class="col-md-12 ">

                                

                                

                                <?php echo e(Form::open(array('route' => 'baract.store'))); ?> 

                                    <div class="form-group">
                                        <p>
                                            
                                        
                                        <?php echo e(Form::label('title', 'Bar Act title')); ?>


                                        <?php echo e(Form::text('title', null, array('class' => 'form-control bar-act-name', 'placeholder' => 'Enter title of Bar Act'))); ?>

                                        </p>

                                        <p>                                           
                                            <span class="text-muted eg-text">
                                                <em>After creating bar act go to 
                                                    <b>chapters</b> to add chapters in Bar Act.
                                                </em>
                                            </span>
                                        </p>

                                        <p>
                                            
                                            <?php echo e(Form::submit('Save', array('class' => 'btn btn-success'))); ?>

                                        
                                        </p>
                                        
                                    </div>

                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>


                     </div>
                    <div class="box-footer"> Footer </div>
                </div>
            </section>
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>