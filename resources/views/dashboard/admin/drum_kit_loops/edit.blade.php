@extends('dashboard.admin.layouts.app')

@section('page_title', 'Edit Drum Kits / Loops')

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
              <h3 class="card-title">Edit Drum Kits / Loops</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('/admin/drum_kits_loops/'.$drum_loop_kit->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="inputTitle">Name *</label>
                  <input type="text" name="title" class="form-control" id="inputTitle" placeholder="Enter name"
                    value="{{ $drum_loop_kit->title }}">
                </div>           

                <div class="form-group">
                  <label for="editor">Description</label>
                  <textarea name="desc" id="editor" rows="3" class="form-control">{{ $drum_loop_kit->desc }}</textarea>
                </div>

                
                <div class="form-group">
                  <label for="inputFile">Image *</label><br>
                  <figure class="figure">
                    <img src="{{ url('/storage/drum_kit_loops/'.$drum_loop_kit->image) }}"
                      class="figure-img img-fluid rounded img-thumbnail" alt="Profile photo">
                  </figure>
                  <input type="file" name="image" class="form-control" id="inputFile">
                </div>

                <div class="form-group">
                  <label for="inputFile">File *</label><br>
                  <figure class="figure">
                    <img src="{{ url('/storage/songs/mp3logo.png') }}"
                      class="figure-img img-fluid rounded img-thumbnail" alt="Profile photo">
                  </figure>
                  <input type="file" name="song_file" class="form-control" id="inputFile">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Strikethrough Price </label>
                  <input type="text" name="strikethrough_price" value="{{ $drum_loop_kit->strikethrough_price }}" class="form-control" id="inputTitle" placeholder="Enter title">
                </div>

                <div class="form-group">
                  <label for="inputTitle">Price</label>
                  <input type="text" name="price" value="{{ $drum_loop_kit->price }}" class="form-control" id="inputTitle" placeholder="Enter title">
                </div>

                <div class="form-group">
                  <label for="inputStatus">Type</label>
                  <select class="form-control" name="type" id="inputStatus">
                    <option value="1" @if($drum_loop_kit->type == 1) {{ __('selected') }} @endif>Coming Soon</option>
                    <option value="2" @if($drum_loop_kit->type == 2) {{ __('selected') }} @endif>Sale</option>
                    <option value="3" @if($drum_loop_kit->type == 3) {{ __('selected') }} @endif>Hot</option>
                    <option value="4" @if($drum_loop_kit->type == 4) {{ __('selected') }} @endif>New Release</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select class="form-control" name="status" id="inputStatus">
                    <option value="1" @if($drum_loop_kit->status == 1) {{ __('selected') }} @endif>Active</option>
                    <option value="0" @if($drum_loop_kit->status == 0) {{ __('selected') }} @endif>Deactive</option>
                  </select>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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