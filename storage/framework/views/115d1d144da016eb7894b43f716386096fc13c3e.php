<?php $__env->startSection('title', '| Permissions'); ?>

<?php $__env->startSection('content-of-user'); ?>

<div class="content-wrapper">
            <section class="content-header">
                <h1> Baract edit <small>it all starts here</small> </h1>
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
                         <a href="<?php echo e(url('baract')); ?>">
                        
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                        <div class="box-tools pull-right">
                            <!-- <span class="btn"><a href="<?php echo e(url('baract')); ?>">Back to baract</a></span> -->
                        </div>
                    </div>
                   
                    <div class="box-body"> 
                        
                    <div class="row">
                        <div class="col-md-12">

                        

                        
                        
                        <?php echo e(Form::model($baract, array('route' => array('baract.update', $baract->id), 'method' => 'PUT'))); ?>

                        


                        <div class="form-group">
                            <?php echo e(Form::label('title', 'Title')); ?>

                            <?php echo e(Form::text('title', null, array('class' => 'form-control'))); ?>

                            <br>
                            
                                
                            <div class="row">
                                
                                <div class="col-md-12">

                                    
                                    <?php if(empty($chapter_data)): ?>
                                    
                                    <p>There's no chapter(s) in this baract go to <b><a href="<?php echo e(url('chapter/create')); ?>">Create chapter</a></b> to add chpter in this baract.</p>
                                    <?php else: ?>
                                    <p>Click on the chapter(s) to <b>remove</b> from Baract.</p>

                                    <?php endif; ?>

                                </div>
                            </div>
                            
                            

                            <div class="row">
                                
                            <?php 

                                foreach ($chapter_data as $chapter) 
                                {
                                  // print_r($chapter);
                                  // echo "<br>";
                                  ?>
                                  <div class="col-md-2 col-sm-3">
                                      
                                  <input class="chapter-del-checkbox" id="<?php echo e($chapter[0]); ?>" type="checkbox" name="chapter[]" value="<?php echo e($chapter[0]); ?>">
                                  <label class="del-chkbox-lbl label label-info" for="<?php echo e($chapter[0]); ?>">Chapter no: <?php echo e($chapter[0]); ?></label>
                                  </div>
                                  <?php
                                }


                             ?>
                            </div>

                             <br>
                             <br>









                            

                            <?php echo e(Form::submit('Update Baract', array('class' => 'btn btn-success'))); ?>

                            <a class="btn btn-default" href="<?php echo e(url('baract')); ?> ">Cancle</a>
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