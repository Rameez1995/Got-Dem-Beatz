@extends('dashboard.front.layouts.app')

@section('page_title', 'Dashboard')

@section('content')
<div class="main_content ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="rounded-30 p-xxl-5 p-xl-3 p-3 mb-3 row tracks mx-2 row" style="background: rgb(25 28 35 / 40%) !important;">
                            <div class="col-md-9">
                                @if(session('success'))
                                <div class="alert alert-success">
                                {{ session('success') }}
                                </div>
                                @endif 
                                <p class="fs-5 text-white mb-2">
                                    <a href="setting.html">Settings</a> > Profile
                                </p>
                                <p class="d-flex align-item-center justify-content-between">
                                    <span class="fs-5 text-white pt-md-5 pt-3 pb-3 fw-bold">Username</span>
                                    <a class="fs-5 pt-md-5 pt-3 pb-3 text-orange" href="javascript:void(0)">
                                        <svg fill="#fe8e44" class="tickmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M490.3 40.4C512.2 62.27 512.2 97.73 490.3 119.6L460.3 149.7L362.3 51.72L392.4 21.66C414.3-.2135 449.7-.2135 471.6 21.66L490.3 40.4zM172.4 241.7L339.7 74.34L437.7 172.3L270.3 339.6C264.2 345.8 256.7 350.4 248.4 353.2L159.6 382.8C150.1 385.6 141.5 383.4 135 376.1C128.6 370.5 126.4 361 129.2 352.4L158.8 263.6C161.6 255.3 166.2 247.8 172.4 241.7V241.7zM192 63.1C209.7 63.1 224 78.33 224 95.1C224 113.7 209.7 127.1 192 127.1H96C78.33 127.1 64 142.3 64 159.1V416C64 433.7 78.33 448 96 448H352C369.7 448 384 433.7 384 416V319.1C384 302.3 398.3 287.1 416 287.1C433.7 287.1 448 302.3 448 319.1V416C448 469 405 512 352 512H96C42.98 512 0 469 0 416V159.1C0 106.1 42.98 63.1 96 63.1H192z"/></svg>
                                        <span class="ps-2">Edit Details</span></a>
                                </p>
                            </div>

                            

                            <form class="col-md-9 pb-md-5 pb-3" action="{{ url('/user/settings/update_profile/'.Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col">
                                        <label for="" class="form-label text-white">First Name</label>
                                        <input name="first_name" type="text" value="{{ Auth::user()->first_name }}" class="form-control" placeholder="First Name" id="" aria-describedby="">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="" class="form-label text-white">Last Name</label>
                                        <input name="last_name" type="text" value="{{ Auth::user()->last_name }}" class="form-control" placeholder="Last Name" id="">
                                    </div>
                                </div>
                                <div class="row row-cols-md-2 py-md-5 py-3">
                                    <div class="col-12">
                                        <label for="" class="form-label text-white fs-5 fw-bold">Contact Info</label>
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="" class="form-label text-white">Contact Number</label>
                                        <input name="contact_no" type="text" value="{{ Auth::user()->contact_no }}" class="form-control" placeholder="" id="">
                                    </div>
                                    <div class="mb-3  col">
                                        <label for="" class="form-label text-white">Email Address </label>
                                        <input name="email" type="email" value="{{ Auth::user()->email }}" maxlength="3" class="form-control" placeholder="" id="">
                                    </div>
                                </div>
                                <div class="row row-cols-md-2">
                                    <div class="col-12">
                                        <label for="" class="form-label text-white fs-5 fw-bold">Residential Info</label>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="" class="form-label text-white">Address</label>
                                        <input name="address" type="text" value="{{ Auth::user()->address }}" class="form-control" placeholder="" id="">
                                    </div>
                                    <div class="mb-3  col">
                                        <label for="" class="form-label text-white">State</label>
                                        <input name="state" type="text" value="{{ Auth::user()->state }}" maxlength="3" class="form-control" placeholder="" id="">
                                    </div>
                                    <div class="mb-3  col">
                                        <label for="" class="form-label text-white">City</label>
                                        <input name="city" type="text" value="{{ Auth::user()->city }}" maxlength="3" class="form-control" placeholder="" id="">
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="" class="form-label text-white">Zip</label>
                                        <input name="zip" type="text" value="{{ Auth::user()->zip }}" class="form-control" placeholder="" id="">
                                    </div>
                                    <div class="col-12 pt-md-4 pt-3 ">
                                        <button type="submit " class="btn-1 px-5 py-3 ">Update</button>
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