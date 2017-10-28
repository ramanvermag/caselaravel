<?php $__env->startSection('content-not-auth'); ?>
<div class="pwd-reset">






  <div class="col-md-6 col-sm-8 col-md-offset-3 col-sm-offset-2">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reset your password</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo e(csrf_field()); ?>

              <div class="box-body">
                 <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <!-- <input type="email" class="form-control" id="inputEmail3" placeholder="Email"> -->

                     <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required placeholder="Enter your email address">

                    <?php if($errors->has('email')): ?>
                    
                        <span class="help-block error-pwd-reset">
                            
                            <strong><?php echo e($errors->first('email')); ?></strong>
                        
                        </span>

                    <?php endif; ?>

                  </div>
                </div>
      
           
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <!-- <button type="submit" class="btn btn-info pull-right">Reset Password</button> -->
                <span class="back-to-login">
                    <a class="text-center" href="<?php echo e(url('/')); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to login</a>
                </span>
                <button type="submit" class="btn btn-info pull-right">Send password reset link</button>
              </div>
              
              <!-- /.box-footer -->
            </form>
          </div>
                
          <!-- /.box -->
   
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
















</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>