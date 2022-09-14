@extends('dashboard.front.layouts.app')

@section('page_title', 'Dashboard')

@section('content')
<div class="main_content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="rounded-30 p-xxl-5 p-xl-3 p-3 mb-3 row tracks mx-2" style="background: rgb(25 28 35 / 40%) !important;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h2 class="fs-4 text-white mb-4">
                                        Settings
                                    </h2>
                                    <ul class="setting-nav">
                                        <li class="border-bottom pb-3 mb-3">
                                            <a href="{{ route('user.edit_profile') }}" class="d-inline-flex align-items-center text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22.608" height="20.502" viewBox="0 0 22.608 20.502">
                                                    <path id="Icon_awesome-user-edit" data-name="Icon awesome-user-edit" d="M10.5,12a6,6,0,1,0-6-6A6,6,0,0,0,10.5,12Zm4.2,1.5h-.783a8.16,8.16,0,0,1-6.834,0H6.3A6.3,6.3,0,0,0,0,19.8v1.95A2.251,2.251,0,0,0,2.25,24H15.136a2.251,2.251,0,0,1-.122-1l.319-2.855.056-.52.37-.37,3.623-3.623A6.236,6.236,0,0,0,14.7,13.5Zm3.123,6.811L17.5,23.17a.746.746,0,0,0,.825.825l2.855-.319,6.464-6.464-3.361-3.361ZM30.671,12.6l-1.777-1.777a1.123,1.123,0,0,0-1.584,0L25.538,12.6l-.192.192,3.366,3.361,1.959-1.959a1.129,1.129,0,0,0,0-1.589Z" transform="translate(0.75 0.75)" fill="none" stroke="#fff" stroke-width="1.5"/>
                                                  </svg>
                                                <span class="ms-2">Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="border-bottom pb-3 mb-3">
                                            <a href="{{ route('user.get_password') }}" class="d-inline-flex align-items-center text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="25.5" viewBox="0 0 22.5 25.5">
                                                    <path id="Icon_awesome-lock" data-name="Icon awesome-lock" d="M18.75,10.5H17.625V7.125a7.125,7.125,0,0,0-14.25,0V10.5H2.25A2.251,2.251,0,0,0,0,12.75v9A2.251,2.251,0,0,0,2.25,24h16.5A2.251,2.251,0,0,0,21,21.75v-9A2.251,2.251,0,0,0,18.75,10.5Zm-4.875,0H7.125V7.125a3.375,3.375,0,0,1,6.75,0Z" transform="translate(0.75 0.75)" fill="none" stroke="#fff" stroke-width="1.5"/>
                                                </svg><span class="ms-2">Reset Password</span>
                                            </a>
                                        </li>
                                        <li class="border-bottom pb-3 mb-3">
                                            <a href="{{ route('user.cards') }}" class="d-inline-flex align-items-center text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="27.214" height="21.5" viewBox="0 0 27.214 21.5">
                                                    <path id="Icon_awesome-credit-card" data-name="Icon awesome-credit-card" d="M0,20.107A2.143,2.143,0,0,0,2.143,22.25H23.571a2.143,2.143,0,0,0,2.143-2.143V12.25H0Zm9.571-3.036a.537.537,0,0,1,.536-.536h5.071a.537.537,0,0,1,.536.536v1.786a.537.537,0,0,1-.536.536H10.107a.537.537,0,0,1-.536-.536Zm-6.714,0a.537.537,0,0,1,.536-.536H6.607a.537.537,0,0,1,.536.536v1.786a.537.537,0,0,1-.536.536H3.393a.537.537,0,0,1-.536-.536ZM25.714,4.393V6.536H0V4.393A2.143,2.143,0,0,1,2.143,2.25H23.571A2.143,2.143,0,0,1,25.714,4.393Z" transform="translate(0.75 -1.5)" fill="none" stroke="#fff" stroke-width="1.5"/>
                                                  </svg><span class="ms-2">Payment Method</span>
                                            </a>
                                        </li>
                                        <!-- <li class="border-bottom pb-3 mb-3">
                                            <a href="javascript:;" class="d-inline-flex align-items-center text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="31.587" height="25.661" viewBox="0 0 31.587 25.661">
                                                    <path id="Icon_awesome-user-slash" data-name="Icon awesome-user-slash" d="M29.71,21.473,16.984,11.639A5.985,5.985,0,1,0,9.052,5.5L2.134.159A.753.753,0,0,0,1.079.291L.16,1.472a.747.747,0,0,0,.131,1.05L27.873,23.836a.753.753,0,0,0,1.055-.131l.919-1.186a.743.743,0,0,0-.136-1.045ZM4.5,19.8v1.95A2.251,2.251,0,0,0,6.751,24H23.166L9.723,13.608A6.291,6.291,0,0,0,4.5,19.8Z" transform="translate(0.833 0.833)" fill="none" stroke="#fff" stroke-width="1.5"/>
                                                  </svg><span class="ms-2">Deactivate Account</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('bottom_script')
@endsection