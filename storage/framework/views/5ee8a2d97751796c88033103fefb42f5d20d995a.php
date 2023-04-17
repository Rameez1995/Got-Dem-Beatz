<?php $__env->startSection('page_title', 'Edit Drum Kits / Loops'); ?>

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
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/categories')); ?>">Drum Kits / Loops</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- Messages -->
          <?php echo $__env->make('dashboard.admin.includes.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Drum Kits / Loops</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo e(url('/admin/drum_kits_loops/'.$drum_loop_kit->id)); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputTitle">Name *</label>
                  <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Enter name"
                    value="<?php echo e($drum_loop_kit->title); ?>">
                </div>           

                <div class="form-group">
                  <label for="editor">Description</label>
                  <textarea name="desc" id="editor" rows="3" class="form-control"><?php echo e($drum_loop_kit->desc); ?></textarea>
                </div>

                
                <div class="form-group">
                  <label for="inputFile">Image *</label><br>
                  <figure class="figure">
                    <img src="<?php echo e(url('/storage/drum_kit_loops/'.$drum_loop_kit->image)); ?>"
                      class="figure-img img-fluid rounded img-thumbnail" alt="Profile photo">
                  </figure>
                  <input type="file" name="image" class="form-control" id="inputFile">
                </div>

                <div class="form-group">
                  <label for="inputFile">File *</label><br>
                  <figure class="figure">
                    <img src="<?php echo e(url('/storage/songs/mp3logo.png')); ?>"
                      class="figure-img img-fluid rounded img-thumbnail" alt="Profile photo">
                  </figure>
                  <input type="file" name="song_file" class="form-control" id="inputFile">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Strikethrough Price </label>
                  <input type="text" name="strikethrough_price" value="<?php echo e($drum_loop_kit->strikethrough_price); ?>" class="form-control" id="inputTitle" placeholder="Enter title">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Price</label>
                  <input type="text" name="price" value="<?php echo e($drum_loop_kit->price); ?>" class="form-control" id="inputTitle" placeholder="Enter title">
                </div>

                <div class="form-group">
                  <label for="inputStatus">Type</label>
                  <select class="form-control" name="type" id="inputStatus">
                    <option value="1" <?php if($drum_loop_kit->type == 1): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Coming Soon</option>
                    <option value="2" <?php if($drum_loop_kit->type == 2): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Sale</option>
                    <option value="3" <?php if($drum_loop_kit->type == 3): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Hot</option>
                    <option value="4" <?php if($drum_loop_kit->type == 4): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>New Release</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select class="form-control" name="status" id="inputStatus">
                    <option value="1" <?php if($drum_loop_kit->status == 1): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Active</option>
                    <option value="0" <?php if($drum_loop_kit->status == 0): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo e(url('/admin/drum_kits_loops')); ?>" class="btn btn-default float-right">Cancel</a>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
<script>
  // CKEditor configuration //
  ClassicEditor.create(document.querySelector("#editor"))
      .then((editor) => {
          console.log(editor);
      })
      .catch((error) => {
          console.error(error);
      });
  // END / CKEditor configuration //
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/dashboard/admin/drum_kit_loops/edit.blade.php ENDPATH**/ ?>