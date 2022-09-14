@extends('dashboard.admin.layouts.app')

@section('page_title', 'Add Drum Kits / Loops')

@section('content')
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
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/categories') }}">Drum Kits / Loops</a></li>
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
          @include('dashboard.admin.includes.messages')

          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Add Drum Kits / Loops</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('/admin/drum_kits_loops/save') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="inputTitle">Name *</label>
                  <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Enter title">
                </div>

                <div class="form-group">
                  <label for="editor">Description</label>
                  <textarea name="desc" rows="3" class="form-control"></textarea>
                </div>

                <div class="form-group">
                  <label for="inputFile">Image *</label>
                  <input type="file" name="image" class="form-control" id="inputFile">
                </div>

                <div class="form-group">
                  <label for="inputFile">File *</label>
                  <input type="file" name="file" class="form-control" id="inputFile">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Strikethrough  Price </label>
                  <input type="text" name="strikethrough_price" class="form-control" id="inputTitle" placeholder="Enter Strikethrough Price">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Price</label>
                  <input type="text" name="price" class="form-control" id="inputTitle" placeholder="Enter Price">
                </div>

                <div class="form-group">
                  <label for="inputStatus">Type</label>
                  <select class="form-control" name="type" id="inputStatus">
                    <option value="1">Coming Soon</option>
                    <option value="2">Sale</option>
                    <option value="3">Hot</option>
                    <option value="4">New Release</option>
                  </select>
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
                <a href="{{ url('/admin/drum_kits_loops') }}" class="btn btn-default float-right">Cancel</a>
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
@endsection

@section('bottom_script')

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
@endsection