 
<?php $__env->startSection('title','Create caselaw'); ?> 
<?php $__env->startSection('content-of-user'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1> Bar Acts <small>it all starts here</small> </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">

        <?php if(Session::get('message')): ?>
        
        <div class="alert alert-success alert-dismissible" role="alert">
            <?php echo e(Session::get('message')); ?>


        </div>
        <?php endif; ?>
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Bar Acts Listing.</h3>

            </div>
            <div class="box-body min-height">

                <div class="box-body table-responsive no-padding">

                    <?php if ($total > 0): ?>

                        <table class="table table-permissions-listing">
                            <tbody>
                                <tr>
                                    <th scope="col" style="width: 3%"><input type="checkbox" name=""></th>
                                    <!-- <th scope="col" style="width: 3%">#</th> -->
                                    <th scope="col" style="width: 80%">Name of Bar Act</th>
                                    <th scope="col" class="text-center" style="width: 17%">Action</th>
                                </tr>
                                <?php $sr=0; ?>

                                    <?php if (isset($baracts)): ?>

                                        <?php 
                                            foreach ($baracts as $key => $value) 
                                            { 
                                                 ?>

                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="">
                                                </td>
                                                <!-- <td><?php echo e($value['id']); ?> </td> -->

                                                <td><?php echo e(str_limit( $value['title'],80)); ?></td>
                                                <td class="text-center">

                                                    <a class="btn btn-default pull-left" href="<?php echo e(url('baract')); ?>/<?php echo e($value['id']); ?>">View</a>

                                                    <form class="pull-right" action="<?php echo e(route('baract.destroy', $value['id'])); ?>" method="POST">
                                                        <?php echo e(method_field('DELETE')); ?> <?php echo e(csrf_field()); ?>

                                                        <button class="btn btn-default del-message">Delete</button>
                                                    </form>

                                                </td>

                                            </tr>

                                            <?php
                                            }
                                            ?>
                                                <?php endif ?>

                            </tbody>
                        </table>
                        <?php echo e($baracts->links()); ?>


                        <?php else: ?>

                            <p class="">

                                No Bar Acts.

                            </p>

                            <?php endif ?>
                            <p></p>
                                <a href="<?php echo e(URL::to('baract/create')); ?>" class="btn btn-success">Add Bar Act</a>

                </div>
                <!-- /.box-body -->
            </div>
            <div class="box-footer"> Footer </div>
        </div>

    </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>