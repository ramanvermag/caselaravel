<?php $__env->startSection('title', '| Users'); ?>

<?php $__env->startSection('content'); ?>

       <div class="overlay">
       <div class="loader-holder">
           
     <div class="loader"></div> 
       </div>
</div>


    <div class="col-lg-11 col-lg-offset-0">

        <form action="/search" method="POST" role="search">
            <?php echo e(csrf_field()); ?>


            <div class="search-box-part">               
                
                <input type="text" name="keyword" placeholder="Search..." class="search-box-users">

            </div>

      

            <div class="search-box-part">
                <span>&nbsp;&nbsp;Filter By Role&nbsp;&nbsp;</span>
                <select name="search_by_role">
                    <option value="">All</option>            
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
                        <option value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
     

            <span class="select-box-part">
                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </form>
    </div>
    <div class="col-lg-1 col-lg-offset-0">

        <a href="<?php echo e(route('users.create')); ?>">Add user</a>
    </div>
  

<div class="col-lg-12 col-lg-offset-0">
    <br>



    <?php echo Form::open(['method' => 'POST', 'action' => 'UserController@BulkAction']); ?>


    
    <div class="table-responsive">
        <table class="table table-bordered table-striped">

            <thead style="">
                <tr>
                    
                    <th><input id="select_all" type="checkbox" name="select"><!-- &nbsp;Select all --></th>
                    <th>Sr.</th>
                    <th>Id</th>
                    <th>Image</th>

                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Pincode</th>

                    <th>Date/Time Added</th>
                    <th>Roles</th>
                    <th>Status</th>
                    <th>Activate | Deactivate</th>
                    <th>Edit | Delete</th>
                </tr>
            </thead>

            <tbody>

            <?php $sr = 0; ?>

                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php $sr++; ?>
                <?php  ?>

                <tr>

                    <td><input type="checkbox" class="check-user" name="user_ids[]" value="<?php echo e($user->id); ?>" ></td>
                    <td><?php echo e($sr); ?></td>
                    <td><?php echo e($user->id); ?></td>
                    <td>

                        <?php if( !$user->profile_picture ): ?>
                            <center>
                                <img class="user-img" src="<?php echo e(asset('img')); ?>/profil-dummy.png">
                            </center>
                        <?php else: ?>
                            <center>
                                <img class="user-img" src="<?php echo e(asset('user_profile_pics')); ?>/<?php echo e($user->id); ?>/profile/<?php echo e($user->profile_picture); ?>">
                            </center>
                        <?php endif; ?>                   
                    </td>

                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->gender); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->phone); ?></td>
                    <td><?php echo e($user->residential_address); ?></td>
                    <td><?php echo e($user->pincode); ?></td>
                    <td>
                        <?php 
                            $utc =  $user->created_at;
                            $dt = new DateTime($utc);
                            $tz = new DateTimeZone('Asia/Kolkata');
                            $dt->setTimezone($tz);
                            echo $dt->format('D d M Y h:i:s a'), PHP_EOL;
                        ?>
                    </td>
                    <td>
                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php echo e($user_role->name); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td>
                    <?php if($user->status == "active"): ?>
                        <span style="color:green" id="user-status">Active</span>
                    <?php else: ?>
                        <span style="color:red" id="user-status">Inactive</span>
                    <?php endif; ?>
                    </td>
                    <td>   

                    <?php if($user->status == "active"): ?>
                       <a href="<?php echo e(URL::to('deactivateUser/' . $user->id)); ?>" id="deactivate_user" class="btn-act-dact" >Deactivate</a>
                    <?php else: ?>
                       <a href="<?php echo e(URL::to('activateUser/' . $user->id)); ?>" id="activate_user" class="btn-act-dact" >Activate </a>
                    <?php endif; ?>              
                  
                    </td>                 
                    <td>                    
	                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="user-action-btn" >Edit</a>
	                    <a href="<?php echo e(URL::to('delete/' . $user->id)); ?>" class="user-action-btn del" >Delete</a>                    
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>

    <?php $currunt_rout = \Request::route()->getName();      ?>

        <?php echo e(Form::select('BulkAction', array('se' => 'Select Action', 'delete' => 'Delete', 'activate' => 'Activate', 'deactivate' => 'Deactivate', ), null, array('class' => 'bulk-action-dropdown', 'disabled' => 'disabled', 'id' => 'bulk_action'))); ?>


        <?php echo Form::submit('Apply Action', ['class' => 'btn-disabled', "id" => 'apply_action', "disabled"]); ?>




        <?php echo Form::close(); ?>


        <?php if($currunt_rout =="users.index"): ?>

            <?php echo $users->appends(['oc' => '1'])->render(); ?>   

        <?php endif; ?>

        <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>
        <div>
            <h4>Utilities</h4>
            <a class="active" href="#">Clean Database</a>
        </div>
        <?php endif; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>