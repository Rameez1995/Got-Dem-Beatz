<?php $__env->startSection('page_title', 'Edit Songs'); ?>

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
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/songs')); ?>">Beats</a></li>
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
              <h3 class="card-title">Edit Beat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo e(url('/admin/song/'.$song->id)); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputTitle">Title *</label>
                  <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Enter name"
                    value="<?php echo e($song->title); ?>">
                </div>           

                <div class="form-group">
                  <label for="editor">Description</label>
                  <textarea name="desc" rows="3" class="form-control"><?php echo e($song->desc); ?></textarea>
                </div>
                
                <div class="form-group">
                <label for="editor">Duration *</label>
                <br>
                <input name="min" type="number" value="<?php echo e($song->min); ?>" class="min-duration" style="width:70px;" placeholder="Min"  />
                <input name="sec" type="number" value="<?php echo e($song->sec); ?>" class="sec-duration" style="width:70px;" placeholder="Sec" />
                </div>
                

                <div class="form-group">
                  <label for="inputTitle">BPM</label>
                  <input type="number" name="bpm" class="form-control" value="<?php echo e($song->bpm); ?>" id="inputTitle" placeholder="Enter BPM">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Price *</label>
                  <input type="number" name="price" class="form-control" value="<?php echo e($song->price); ?>" id="inputTitle" placeholder="Enter Price">
                </div>

                <div class="">
                  <label for="inputTitle">Producer *</label>
                  <select class="form-control w-100" name="producer_id">
                  <?php $__currentLoopData = $producers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($producer->id); ?>" <?php echo e($producer->id == $selected_producer_id ? 'selected' : ''); ?>><?php echo e($producer->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  </select>
                </div>

                <div class="">
                  <label for="inputTitle">Tags</label>
                  <select class="js-example-tokenizer w-100" name="tags[]" multiple="multiple">
                  <?php $__currentLoopData = $selected_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selected_tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($selected_tag); ?>" selected><?php echo e($selected_tag); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                </select>
                </div>  
                

                <div class="form-group">
                  <label for="editor">lyrics</label>
                  <textarea name="lyrics" id="editor" rows="3" class="form-control"><?php echo e($song->lyrics); ?></textarea>
                </div>

                <div class="form-group">
                  <label for="inputFile">Image *</label><br>
                  <figure class="figure">
                    <img src="<?php echo e(url('/storage/songs/'.$song->image)); ?>"
                      class="figure-img img-fluid rounded img-thumbnail" alt="Profile photo">
                  </figure>
                  <input type="file" name="image" class="form-control" id="inputFile">
                </div>

                <div class="form-group">
                  <label for="inputFile">Beat *</label><br>
                  <figure class="figure">
                    <img src="<?php echo e(url('/storage/songs/mp3logo.png')); ?>"
                      class="figure-img img-fluid rounded img-thumbnail" alt="Profile photo">
                  </figure>
                  <input type="file" name="song_file" class="form-control" id="inputFile">
                </div>
               
                <div class="form-group">
                  <label for="inputTitle">Sorting *</label>
                  <input type="number" name="sorting" class="form-control" value="<?php echo e($song->sorting); ?>" id="inputTitle" placeholder="Enter Sorting">
                </div>
                
                <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select class="form-control" name="status" id="inputStatus">
                    <option value="1" <?php if($song->status == 1): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Active</option>
                    <option value="0" <?php if($song->status == 0): ?> <?php echo e(__('selected')); ?> <?php endif; ?>>Deactive</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo e(url('/admin/drum_kit_loops')); ?>" class="btn btn-default float-right">Cancel</a>
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
  
   
  $(document).ready(() => {
        $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']
      })
  })

const minduration = document.querySelector(".min-duration");
 const secduration = document.querySelector(".sec-duration");
    
    ["keypress", "click"].map((event, i) => {
      minduration.addEventListener(event, function (e) {
        if (String(e.target.value).length === i) {
          e.target.value = "0" + e.target.value;
        }
        console.log(e.target.value);
      });
    });
    
     ["keypress", "click"].map((event, i) => {
      secduration.addEventListener(event, function (e) {
        if (String(e.target.value).length === i) {
          e.target.value = "0" + e.target.value;
        }
        console.log(e.target.value);
      });
    });
    
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/dashboard/admin/songs/edit.blade.php ENDPATH**/ ?>