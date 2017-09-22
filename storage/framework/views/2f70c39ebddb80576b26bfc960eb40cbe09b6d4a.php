<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SkinTouch')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/forms-style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/master.css')); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
    <div id="master" class="container-fluid container-fluid-no-padding">
        <div class="container-fluid container-fluid-no-padding">
            <img src="<?php echo e(asset('img/skintouch-logo.png')); ?>">
        </div>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <!-- <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'SkinTouch')); ?>

                    </a> -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
        

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <!-- <?php if(Auth::guest()): ?> -->
                         <!--    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li> -->
                        <!-- <?php else: ?> -->
                        <li>
                             <a href="<?php echo e(route('logout')); ?>" class="dropdown-toggle" id="profile-name" data-toggle="dropdown" role="button"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out set" title="Sign Out"></i>
                             </a>

                              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                              </form>
                        </li>
                        <!-- <?php endif; ?> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid ">
                <div class="row">
                   <div class="col-md-3 full-height container-fluid-no-padding" id="sidebar">
                       <ul class="nav nav-pills nav-stacked">
                           <li><a href="/dashboard/view"><i class="fa fa-thumb-tack"></i> <span>Dashboard</span></a></li>
                           <li><a href="/stores/view"><i class="fa fa-sitemap"></i> <span>Stores</span></a></li>
                           <li><a href="/sales/view"><i class="fa fa-shopping-basket"></i> <span>Sales</span></a></li>
                           <li><a href="/products/view"><i class="fa fa-cubes"></i> <span>Products</span></a></li>
                       </ul>
                   </div>

                   <div class="col-md-9 full-height" id="content">
                        <?php echo $__env->yieldContent('content'); ?>
                   </div>
                </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script>
        function sidebar(e){
            e.stopPropagation();
            $('#sidebar').toggle(
                    function(){console.log('test1')},
                    function(){console.log('test2')},
                );
        }
    </script>
    <?php echo $__env->yieldContent('js'); ?>
</body>
</html>
