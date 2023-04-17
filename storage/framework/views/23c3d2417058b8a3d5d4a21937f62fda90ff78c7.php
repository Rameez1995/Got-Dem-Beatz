<?php $__env->startSection('page_title', 'Users'); ?>

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
            <li class="breadcrumb-item active">Users</li>
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
              <h3 class="card-title">Manage Users</h3>
              <div class="card-tools">
                <a href="<?php echo e(secure_url('/admin/user/add')); ?>" class="btn btn-primary">
                  <i class="fa fa-user mr-2"></i> Register new user
                </a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
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
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      processing: true,
      serverSide: true,
      ajax: "<?php echo e(route('view.users')); ?>",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/dashboard/admin/user/index.blade.php ENDPATH**/ ?>