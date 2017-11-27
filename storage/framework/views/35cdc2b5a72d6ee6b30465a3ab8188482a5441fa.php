<?php $__env->startSection('title', '| Create section'); ?>

<?php $__env->startSection('content-of-user'); ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1> sections <small>it all starts here</small> </h1>
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
                        <h3 class="box-title">Create new section</h3>
                        <div class="box-tools pull-right">
                            <span class="btn"><a href="<?php echo e(url('section')); ?>">View all</a></span>
                        </div>
                    </div>

                   
                    <div class="box-body">
                        <div class="row">
                        <div class="col-md-12 ">

                            

                        

                        
                        <?php echo e(Form::open(array('route' => 'section.store'))); ?> 

                        <div class="form-group">
                        <?php echo e(Form::label('baracts', 'Chapters')); ?>

                        <p>
                        <?php echo e(Form::select('baract_chapter_id', $chapters, null, ['class' => 'form-control'])); ?>

                        </p>
                        <p>
                                sections of this chapter
                            </p>
                            <p>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                                <a href="#"><span class="badge">section number</span></a>
                            </p>
                        <p>

                        <?php echo e(Form::label('section_number', 'Section number')); ?>

                        <?php echo e(Form::text('section_number', null, array('class' => 'form-control', 'placeholder' => 'section number'))); ?>


                        </p>

                        <p>

                        <?php echo e(Form::label('section_title', 'Section title')); ?>

                        <?php echo e(Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'section title'))); ?>


                        </p>


                        <p>                                
                        <?php echo e(Form::label('description', 'Description')); ?>

                        <?php echo e(Form::textarea('description', null, array('class' => 'form-control', 'placeholder' => 'Description'))); ?>

                        </p>

                        <p>
                        <?php echo e(Form::submit('Save section', array('class' => 'btn btn-success'))); ?>

                        </p>
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