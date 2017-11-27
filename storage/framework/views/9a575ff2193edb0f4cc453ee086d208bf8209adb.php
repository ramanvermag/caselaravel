<?php $__env->startSection('title', '| Create Message'); ?>

<?php $__env->startSection('content-of-user'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1> Chapters <small>it all starts here</small> </h1>
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
                        <h3 class="box-title">Add new chapter's in Bar Acts</h3>
                        <div class="box-tools pull-right">
                            <span class="btn"><a href="<?php echo e(url('chapter')); ?>">View all</a></span>
                        </div>
                    </div>
                   
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12 ">

                                

                                
                                
                                <?php echo e(Form::model($chapter, array('route' => array('chapter.update', $chapter->id), 'method' => 'PUT'))); ?> 

                                <div class="form-group">

                                    <?php echo e(Form::label('baracts', 'Bar Acts')); ?>

                                    
                                    <p>
                                        <?php echo e(Form::select('baract_id', $baracts, null, ['class' => 'form-control'])); ?>

                                    </p>


                                    <p>
                                        <?php echo e(Form::label('chapter_number', 'Chapter number')); ?>

                                        <?php echo e(Form::text('chapter_number', null, array('class' => 'form-control', 'placeholder' => 'Enter chapter number'))); ?>

                                    </p>

                                    <p>
                                        <?php echo e(Form::label('title', 'Chapter Name')); ?>

                                        <?php echo e(Form::text('title', null, array('class' => 'form-control','placeholder' => 'Enter chapter name'))); ?>

                                    <p>

                                        <span class="text-muted eg-text">
                                            
                                            <em>After adding <b>chapter</b> go to <b>section</b> to add sactions in a chapter.</em>

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