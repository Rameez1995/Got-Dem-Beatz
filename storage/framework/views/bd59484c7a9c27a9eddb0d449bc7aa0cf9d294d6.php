<?php $__env->startSection('page_title', 'Membership Images'); ?>

<?php $__env->startSection('head_style'); ?>
<!-- Datatables -->
<link rel="stylesheet" href="<?php echo e(asset('admin_dashboard/assets/css/dataTables.bootstrap4.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin_dashboard/assets/css/responsive.bootstrap4.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('admin_dashboard/assets/css/buttons.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Hi Admin Welcome Back</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Membership Images</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- Messages -->
          <?php echo $__env->make('dashboard.admin.includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Membership Images</h3>
              <div class="card-tools">
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>First Image</th>
                    <th>second Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(isset($membership)): ?>   
                  <tr>
                    <td><img src="../storage/membership/first_image/<?php echo e($membership->first_image); ?>" width="100px" height="50px"></td>
                    <td><img src="../storage/membership/second_image/<?php echo e($membership->second_image); ?>" width="100px" height="50px"></td>
                    <td style="width: 11rem">
                      <a href="<?php echo e(url('/admin/membership/edit/'.$membership->id)); ?>" class="btn btn-info btn-sm"><i
                          class="fas fa-edit mr-2"></i> Edit</a>
                    </td>
                  </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
<script src="<?php echo e(asset('admin_dashboard/assets/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_dashboard/assets/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_dashboard/assets/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin_dashboard/assets/js/responsive.bootstrap4.min.js')); ?>"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/dashboard/admin/membership/index.blade.php ENDPATH**/ ?>