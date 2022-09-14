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
                                <p class="fs-5 text-white mb-2">
                                    <a href="setting.html">Settings</a> > Payment Method > Add New Card
                                </p>
                                <p class="text-grey">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                </p>
                            </div>
                            <p class="fs-5 text-white pt-md-5 pt-3 pb-3">
                                Saved Cards
                            </p>
    
                            <form class="col-md-9 pb-md-5 pb-3" action="{{ url('/user/settings/payment_method/store_card') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="oldPwd" class="form-label text-white">Card Holder Name</label>
                                        <input name="name" type="text" class="form-control" placeholder="Tony123@#$" id="oldPwd" aria-describedby="">
                                    </div>
                                    <div class="mb-3 col">
                                        <label for="newPwd" class="form-label text-white">Card Number</label>
                                        <input name="number" type="text" class="form-control" placeholder="Tony123@#$" id="newPwd">
                                    </div>
                                </div>
                                <div class="row row-cols-md-2">
                                    <div class="mb-3 col">
                                        <label for="dateExp" class="form-label text-white">Expiration:</label>
                                        <input name="exp_date" type="month" class="form-control" placeholder="" id="dateExp">
                                    </div>
                                    <div class="mb-3 form-check col">
                                        <label for="newPwd" class="form-label text-white">cvc/CVV: </label>
                                        <input name="cvc" type="text" maxlength="3" class="form-control" placeholder="Tony123@#$" id="newPwd">
                                    </div>
                                    <div class="col-12 pt-md-4 pt-3">
                                        <button type="submit" class="btn-1 px-5 py-3">Add Card</button>
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