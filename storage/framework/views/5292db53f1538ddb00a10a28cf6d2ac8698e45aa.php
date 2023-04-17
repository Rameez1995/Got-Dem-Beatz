<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo e(config('app.name', 'CMS')); ?> - <?php echo $__env->yieldContent('page_title'); ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" inte grity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="<?php echo e(asset('user_dashboard/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="<?php echo e(asset('user_dashboard/css/custom-style.css')); ?>" rel="stylesheet">
    
    
  <?php echo $__env->yieldContent('head_style'); ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="background-color:black;">
  <div class="wrapper">

    <!-- Preloader -->
  

    <!-- Navbar -->
    <header class="dashbord_header">
    <?php echo $__env->make('dashboard.front.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <div class="d-flex flex-wrap" style="background-color:black;">
    <?php echo $__env->make('dashboard.front.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->yieldContent('content'); ?>
    <!-- /.content-wrapper -->
    </div>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

  </div>
  <!-- ./wrapper -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="<?php echo e(asset('user_dashboard/js/music-list.js')); ?>"></script>
  <script src="<?php echo e(asset('user_dashboard/js/script.js')); ?>"></script>
  <script src="<?php echo e(asset('user_dashboard/js/custom.js')); ?>"></script>

  <?php echo $__env->yieldContent('bottom_script'); ?>

</body>

</html><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/dashboard/front/layouts/app.blade.php ENDPATH**/ ?>