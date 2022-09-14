@extends('dashboard.front.layouts.app')

@section('page_title', 'Dashboard')

@section('content')
<div class="main_content ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="rounded-30 p-xxl-5 p-xl-3 p-3 mb-3 row tracks mx-2" style="background: rgb(25 28 35 / 40%) !important;">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h2 class="fs-4 text-white mb-4">
                                        Settings > Payment Method
                                    </h2>
                                    <p class="text-grey">
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                    </p>
                                    <h3 class="fs-5 text-white my-4">Saved Cards</h3>
                                    @foreach($cards as $card)
                                    <ul class="save-cards-nav">
                                        <li class="d-flex align-items-center px-md-5 py-md-3 p-2 rounded-30 mb-3">
                                            <img src="{{ asset('user_dashboard/images/visa-card.png')}}" alt="">
                                            <div class="ms-3">
                                                <h5 class="text-white">{{$card->name}}</h5>
                                                <p><svg xmlns="http://www.w3.org/2000/svg" width="12.857" height="10" viewBox="0 0 12.857 10">
                                                    <path id="Icon_awesome-credit-card" data-name="Icon awesome-credit-card" d="M0,11.179A1.072,1.072,0,0,0,1.071,12.25H11.786a1.072,1.072,0,0,0,1.071-1.071V7.25H0ZM4.286,9.661a.269.269,0,0,1,.268-.268H7.589a.269.269,0,0,1,.268.268v.893a.269.269,0,0,1-.268.268H4.554a.269.269,0,0,1-.268-.268Zm-2.857,0A.269.269,0,0,1,1.7,9.393H3.3a.269.269,0,0,1,.268.268v.893a.269.269,0,0,1-.268.268H1.7a.269.269,0,0,1-.268-.268ZM12.857,3.321V4.393H0V3.321A1.072,1.072,0,0,1,1.071,2.25H11.786A1.072,1.072,0,0,1,12.857,3.321Z" transform="translate(0 -2.25)" fill="#bcc2cf"/>
                                                  </svg><span class="ms-2 text-grey">{{$card->number}}</span></p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="{{ url('/user/settings/payment_method/edit_card/'.$card->id) }}" class="me-md-5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.648" height="17.648" viewBox="0 0 17.648 17.648">
                                                        <g id="Icon_feather-edit" data-name="Icon feather-edit" transform="translate(-2.25 -1.92)">
                                                          <path id="Path_4086" data-name="Path 4086" d="M10.158,6H4.591A1.591,1.591,0,0,0,3,7.591V18.725a1.591,1.591,0,0,0,1.591,1.591H15.725a1.591,1.591,0,0,0,1.591-1.591V13.158" transform="translate(0 -1.497)" fill="none" stroke="#bcc2cf" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                          <path id="Path_4087" data-name="Path 4087" d="M20.338,3.311a1.685,1.685,0,0,1,2.382,2.382l-7.544,7.544L12,14.032l.794-3.177Z" transform="translate(-4.214)" fill="none" stroke="#bcc2cf" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                                                        </g>
                                                      </svg>
                                                    <span class="text-decoration-underline text-grey">Edit Details</span>
                                                </a>
                                                <a href="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12.728" height="12.728" viewBox="0 0 12.728 12.728">
                                                        <g id="Icon_feather-plus" data-name="Icon feather-plus" transform="translate(-14.142 6.364) rotate(-45)">
                                                          <path id="Path_4084" data-name="Path 4084" d="M18,7.5v14" transform="translate(-3.5)" fill="none" stroke="#bcc2cf" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                          <path id="Path_4085" data-name="Path 4085" d="M7.5,18h14" transform="translate(0 -3.5)" fill="none" stroke="#bcc2cf" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
                                                        </g>
                                                    </svg>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                    @endforeach
                                    <a href="{{ route('user.get_card') }}" class="btn-gradient mt-4"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <g id="Icon_ionic-ios-add-circle-outline" data-name="Icon ionic-ios-add-circle-outline" transform="translate(-3.375 -3.375)">
                                          <path id="Path_4088" data-name="Path 4088" d="M19.761,14.761h-3.5v-3.5a.751.751,0,1,0-1.5,0v3.5h-3.5a.719.719,0,0,0-.751.751.727.727,0,0,0,.751.751h3.5v3.5a.728.728,0,0,0,.751.751.747.747,0,0,0,.751-.751v-3.5h3.5a.751.751,0,0,0,0-1.5Z" transform="translate(-2.137 -2.137)" fill="#fff"/>
                                          <path id="Path_4089" data-name="Path 4089" d="M13.375,4.721a8.65,8.65,0,1,1-6.12,2.534,8.6,8.6,0,0,1,6.12-2.534m0-1.346a10,10,0,1,0,10,10,10,10,0,0,0-10-10Z" fill="#fff"/>
                                        </g>
                                      </svg>
                                      Add Another Card</a>
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