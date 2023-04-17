<?php $__env->startSection('page_title', 'Add Song'); ?>

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
            <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/beats')); ?>">Beats</a></li>
            <li class="breadcrumb-item active">Add</li>
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
              <h3 class="card-title">Add Beat</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo e(url('/admin/song/save')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="card-body">
                <div class="form-group">
                  <label for="inputTitle">Title *</label>
                  <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Enter title">
                </div>

                <div class="form-group">
                  <label for="editor">Description</label>
                  <textarea name="desc" id="" rows="3" class="form-control"></textarea>
                </div>

                <div class="form-group">
                <label for="editor">Duration *</label>
                <br>
                <input name="min" type="number" class="min-duration" style="width:70px;" placeholder="Min"  />
                <input name="sec" type="number" class="sec-duration" style="width:70px;" placeholder="Sec" />
                </div>
                

                <div class="form-group">
                  <label for="inputTitle">BPM</label>
                  <input type="number" name="bpm" class="form-control" id="inputTitle" placeholder="Enter BPM">
                </div>

                <div class="">
                  <label for="inputTitle">Producer *</label>
                  <select class="form-control w-100" name="producer_id">
                  <?php $__currentLoopData = $producers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($producer->id); ?>"><?php echo e($producer->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                  </select>
                </div>

        
                <div class="">
                  <label for="inputTitle">Tags</label>
                  <select class="js-example-tokenizer w-100" name="tags[]" multiple="multiple">
                  </select>
                </div>  

                <div class="form-group">
                  <label for="editor">lyrics</label>
                  <textarea name="lyrics" id="editor" rows="3" class="form-control"></textarea>
                </div>

                <div class="form-group">
                  <label for="inputFile">Image *</label>
                  <input type="file" name="image" class="form-control" id="inputFile">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Price *</label>
                  <input type="number" name="price" class="form-control" id="inputTitle" placeholder="Enter price">
                </div>

                <div class="form-group">
                  <label for="inputFile">Beat *</label>
                  <input type="file" name="song_file" class="form-control" id="inputFile">
                </div>

                 <div class="form-group">
                  <label for="inputStatus">Sorting *</label>
                  <input type="number" name="sorting" class="form-control" min="1" id="inputFile">
                </div>
              
                <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select class="form-control" name="status" id="inputStatus">
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="<?php echo e(url('/admin/categories')); ?>" class="btn btn-default float-right">Cancel</a>
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

<script type="text/javascript">
  
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
<?php echo $__env->make('dashboard.admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/dashboard/admin/songs/add.blade.php ENDPATH**/ ?>