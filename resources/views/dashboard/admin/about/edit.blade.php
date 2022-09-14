@extends('dashboard.admin.layouts.app')

@section('page_title', 'Edit Pages')

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
            <li class="breadcrumb-item"><a href="{{ url('/admin/abouts') }}">About Us</a></li>
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
          @include('dashboard.admin.includes.messages')

          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit About Us</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('/admin/about/'.$about->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="inputTitle">Heading</label>
                  <input type="text" name="heading" class="form-control" id="inputTitle" placeholder="Enter name"
                    value="{{ $about->heading }}">
                </div>           

                <div class="form-group">
                  <label for="editor">Page Description</label>
                  <textarea name="desc" id="editor" rows="3" class="form-control">{{ $about->desc }}</textarea>
                </div>
                
                <div class="form-group">
                  <label for="inputFile">Image</label><br>
                  <figure class="figure">
                    <img src="{{ url('/storage/aboutus/'.$about->image) }}"
                      class="figure-img img-fluid rounded img-thumbnail" alt="Profile photo">
                  </figure>
                  <input type="file" name="image" class="form-control" id="inputFile">
                </div>
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ url('/admin/about') }}" class="btn btn-default float-right">Cancel</a>
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