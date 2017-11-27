<?php $__env->startSection('title','Create caselaw'); ?>
<?php $__env->startSection('content-of-user'); ?>
                
        <div class="content-wrapper">
            <section class="content-header">
                <h1> Messages <small>it all starts here</small> </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Examples</a></li>
                    <li class="active">Blank page</li>
                </ol>
            </section>
            <section class="content">

                <?php if(Session::get('message')): ?>
                <div class="callout callout-success">
                    
                    <h4><?php echo e(Session::get('message')); ?></h4>
                
                </div>
                <?php endif; ?>
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Message Listing.</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
                            
                        </div>
                    </div>
                    <div class="box-body">
                      
                        <!-- /.box-header -->
                        
                        <div class="box-body table-responsive no-padding">

                           <?php if ($total > 0): ?>
                               


                            <table class="table table-hover table-permissions-listing">
                                <tbody>
                                    <tr>
                                        <th style="width: 3%"><input type="checkbox" name=""></th>
                                        <!-- <th style="width: 3%">#</th> -->
                                        <th style="width: 3%">#</th>
                                        <th style="width: 20%">Heading</th>
                                        <th style="width: 44%">Message</th>
                                        <th class="text-center" style="width: 15%">File link</th>
                                        <th class="text-center" style="width: 15%">Action</th>
                                    </tr>
                                    <?php $sr=0; ?>
                                        
                                        <?php if (isset($messages)): ?>
                                                
                                        <?php 
                                            foreach ($messages as $key => $value) 
                                            { 
                                                 ?>
                                                 
                                                     
                                                 <tr>                                                     
                                                    <td><input type="checkbox" name=""></td>                                                    
                                                    <td><?php echo e($value['id']); ?> </td>                                                    
                                                    <!-- <td><?php echo e($value['id']); ?></td>                                                     -->
                                                    <td><span class="align-middle"><?php echo e(str_limit( $value['heading'],30)); ?></span></td>                                                    
                                                    <td><?php echo e(str_limit( $value['message'],120)); ?></td>                                                   
                                                    <td><?php echo e($value['file_link']); ?></td>                                                   
                                                    <td class="text-center">

                                                    <a class="btn btn-default" href="<?php echo e(url('message')); ?>/<?php echo e($value['id']); ?>">View</a>                                         
                                                    
                                                    </td>                                                    
                                                 
                                                 </tr>
                                            
                                            <?php
                                            }
                                            ?>
                                            <?php endif ?>
                                        

                                </tbody>
                            </table>
                            <?php echo e($messages->links()); ?>

                           
                           <?php else: ?>

                            <p class="">
                                
                                no messages.
                                
                            </p>

                           <?php endif ?>
                           <a href="<?php echo e(URL::to('message/create')); ?>" class="btn btn-success">Add new message</a>



                            

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="box-footer"> Footer </div>
                </div>
                
            </section>
        </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>