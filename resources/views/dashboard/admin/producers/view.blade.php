@extends('dashboard.admin.layouts.app')

@section('page_title', 'Songs')

@section('head_style')
<!-- Datatables -->
<link rel="stylesheet" href="{{ asset('admin_dashboard/assets/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('admin_dashboard/assets/css/responsive.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('admin_dashboard/assets/css/buttons.bootstrap4.css') }}">
@endsection

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
            <li class="breadcrumb-item active">Songs</li>
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
          @include('dashboard.admin.includes.messages')

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Album Songs</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Song</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($songs as $key=>$song)
                  <tr>
                    <td>{{ ++$key }}. </td>
                    <td>{{ $song->title }}</td>
                    <td><img src="../../../storage/songs/{{ $song->image }}" width="100px" height="50px"></td>
                    <td>{{ Str::limit($song->desc, 100) }}</td>
                    <td><audio controls>
                    <source src="../../../storage/songs/{{ $song->song_file }}" type="audio/ogg">
                    <source src="../../../storage/songs/{{ $song->song_file }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio></td>
                    <td>
                      @if ($song->status == 1)
                      <span class="badge bg-success">{{ __('Active') }}</span>
                      @else
                      <span class="badge bg-danger">{{ __('Deactive') }}</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
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
@endsection

@section('bottom_script')
<script src="{{ asset('admin_dashboard/assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin_dashboard/assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin_dashboard/assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin_dashboard/assets/js/responsive.bootstrap4.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    });
  });
</script>
@endsection