<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Case Law')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
    </script>
    <script src="https://use.fontawesome.com/9712be8772.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Case law')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        
                        <?php if(!Auth::guest()): ?>

                            <?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   Admin operations
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li><a class="active admin-operation-link" href="<?php echo e(route('roles.index')); ?>">Roles</a></li>
                                    <li><a class="active admin-operation-link" href="<?php echo e(route('roles.create')); ?>">Create Roles</a></li>
                                    <li><a class="active admin-operation-link" href="<?php echo e(route('permissions.index')); ?>">Permissions</a></li>
                                    <li><a class="active admin-operation-link" href="<?php echo e(route('permissions.create')); ?>">Create Permissions</a></li>
                                    <li><a class="active admin-operation-link" href="<?php echo e(route('users.index')); ?>">Users</a></li>
                                    <li><a class="active admin-operation-link" href="<?php echo e(route('users.create')); ?>">Add User</a></li>
                                  
                                </ul>

                            </li>
                            <!-- <li><a class="active" href="<?php echo e(route('posts.create')); ?>">Create Posts</a></li> -->
                            
                            <?php endif; ?>

                            <?php if(auth()->check() && auth()->user()->hasRole('Simpleuser')): ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Post')): ?>

                                   
                                    <li><a class="active" href="<?php echo e(route('posts.create')); ?>">Create Posts</a></li>

                                        
                                <?php endif; ?>                               
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Roles')): ?>

                                    <li><a class="active admin-operation-link" href="<?php echo e(route('roles.create')); ?>">Create Roles</a></li>

                                <?php endif; ?>
                                
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('View Roles')): ?>
                                
                                    <li><a class="active admin-operation-link" href="<?php echo e(route('roles.index')); ?>">Roles</a></li>

                                <?php endif; ?>

                            <?php endif; ?>


                         <?php endif; ?>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->


                        <?php if(Auth::guest()): ?>

                        <!--
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            
                         -->
                        <?php else: ?>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="<?php echo e(url('profile')); ?>">Profile</a></li>

                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>

                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
 


        <?php if(Session::has('flash_message')): ?>
            <!-- <div class="container">    -->   
                <div class="alert alert-success"><em> <?php echo session('flash_message'); ?></em>
                </div>
            <!-- </div> -->
        <?php endif; ?> 
        <div class="container">
            
        <div class="row">
            <div class="col-md-8 col-md-offset-2">              
                <?php echo $__env->make('errors.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
            </div>
        </div>
        </div>

        <?php echo $__env->yieldContent('content'); ?>

    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo e(asset('js/functions.js')); ?>"></script>

</body>
</html>
