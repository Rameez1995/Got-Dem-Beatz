@extends('dashboard.front.layouts.app')

@section('page_title', 'Dashboard')

@section('content')

<div class="main_content ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="rounded-30 p-xxl-5 p-xl-3 p-3 mb-3 row tracks mx-2 row" style="background: rgb(25 28 35 / 40%) !important;">
                            <div class="col-12">
                                @if(session('success'))
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                                @endif
                                @if (count($errors))
                                <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                                </div>
                                @endif
                                <p class="fs-5 text-white mb-2">
                                    <a href="setting.html">Settings</a> > Change Your Password ?
                                </p>
                                <p class="text-grey">
                                    Forgot your password? No worries as you can change your password from here lorem eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                                    sea takimata sanctus est Lorem ipsum dolor
                                </p>
                            </div>

                            <form class="col-md-10 py-5" action="{{ url('/user/settings/update_password') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="oldPwd" class="form-label text-white">Old Password</label>
                                        <input name="current_password" type="password" class="form-control" placeholder="Tony123@#$" id="oldPwd" aria-describedby="">
                                    </div>
                                </div>
                                <div class="row row-cols-md-2">
                                    <div class="mb-3 col">
                                        <label for="newPwd" class="form-label text-white">New Password</label>
                                        <input name="new_password" type="password" class="form-control" placeholder="Tony123@#$" id="newPwd">
                                    </div>
                                    <div class="mb-3 form-check col">
                                        <label for="newPwd" class="form-label text-white">Confirm New Password</label>
                                        <input name="confirm_password" type="password" class="form-control" placeholder="Tony123@#$" id="newPwd">
                                    </div>
                                    <div class="col-12 pt-md-4 pt-3">
                                        <button type="submit" class="btn-1 px-5 py-3">Reset My Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
@endsection

@section('bottom_script')
@endsection