@extends('dashboard.front.layouts.app')

@section('page_title', 'Dashboard')

@section('content')
<div class="main_content ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="rounded-30 p-xxl-5 p-xl-3 p-3 mb-3 tracks" style="background: rgb(25 28 35 / 40%) !important;">
                            <p><svg class="headphone" fill="#fe8e44" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path    d="M256 32C112.9 32 4.563 151.1 0 288v104C0 405.3 10.75 416 23.1 416S48 405.3 48 392V288c0-114.7 93.34-207.8 208-207.8C370.7 80.2 464 173.3 464 288v104C464 405.3 474.7 416 488 416S512 405.3 512 392V287.1C507.4 151.1 399.1 32 256 32zM160 288L144 288c-35.34 0-64 28.7-64 64.13v63.75C80 451.3 108.7 480 144 480L160 480c17.66 0 32-14.34 32-32.05v-127.9C192 302.3 177.7 288 160 288zM368 288L352 288c-17.66 0-32 14.32-32 32.04v127.9c0 17.7 14.34 32.05 32 32.05L368 480c35.34 0 64-28.7 64-64.13v-63.75C432 316.7 403.3 288 368 288z"/></svg>
                                <span class="fs-5 text-grey ps-2">My Purchased Beats</span>
                            </p>

                            <div class="table-responsive my-4 text-white">
                                <table class="table">
                                    <thead class="">
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Duration</th>
                                            <th class="tag">Tags</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($songs as $key=>$song)
                                        <tr style="display: table-row;">
                                        <td>{{ $song->title }}</td>
                                        <td><img src="../storage/songs/{{ $song->image }}" width="100px" height="50px"></td>
                                        <td>{{ Str::limit($song->desc, 40) }}</td>
                                            <td class="td_size">04: 36</td>
                                            <!-- <td class="td_size"><svg fill="#888888" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path d="M256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512zM232 256C232 264 236 271.5 242.7 275.1L338.7 339.1C349.7 347.3 364.6 344.3 371.1 333.3C379.3 322.3 376.3 307.4 365.3 300L280 243.2V120C280 106.7 269.3 96 255.1 96C242.7 96 231.1 106.7 231.1 120L232 256z"></path>
                                            </svg></td> -->
                                            <td class="tag td_size_2">
                                                <div class="d-flex">
                                                    <div class="d-flex">
                                                        <a class="border py-2 px-2 rounded-3 mx-1" href="javscript:void(0)">Music</a>
                                                        <a class="border py-2 px-2 rounded-3 mx-1" href="javscript:void(0)">Music</a>
                                                    </div>
                                                    <div class="mx-5 d-flex">
                                                        <a class=" d-flex align-items-center border p-2 rounded-3 mx-1" href="javscript:void(0)"><svg fill="#e7a67cf0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg></a>
                                                        <a class=" d-flex align-items-center border p-2 rounded-3 mx-1" href="javscript:void(0)"><svg fill="#e7a67cf0" class="heart" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"> <path d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"></path> </svg></a>
                                                        <a class=" d-flex align-items-center border p-2 rounded-3 mx-1" href="javscript:void(0)"><svg fill="#e7a67cf0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M448 127.1C448 181 405 223.1 352 223.1C326.1 223.1 302.6 213.8 285.4 197.1L191.3 244.1C191.8 248 191.1 251.1 191.1 256C191.1 260 191.8 263.1 191.3 267.9L285.4 314.9C302.6 298.2 326.1 288 352 288C405 288 448 330.1 448 384C448 437 405 480 352 480C298.1 480 256 437 256 384C256 379.1 256.2 376 256.7 372.1L162.6 325.1C145.4 341.8 121.9 352 96 352C42.98 352 0 309 0 256C0 202.1 42.98 160 96 160C121.9 160 145.4 170.2 162.6 186.9L256.7 139.9C256.2 135.1 256 132 256 128C256 74.98 298.1 32 352 32C405 32 448 74.98 448 128L448 127.1zM95.1 287.1C113.7 287.1 127.1 273.7 127.1 255.1C127.1 238.3 113.7 223.1 95.1 223.1C78.33 223.1 63.1 238.3 63.1 255.1C63.1 273.7 78.33 287.1 95.1 287.1zM352 95.1C334.3 95.1 320 110.3 320 127.1C320 145.7 334.3 159.1 352 159.1C369.7 159.1 384 145.7 384 127.1C384 110.3 369.7 95.1 352 95.1zM352 416C369.7 416 384 401.7 384 384C384 366.3 369.7 352 352 352C334.3 352 320 366.3 320 384C320 401.7 334.3 416 352 416z"></path></svg></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="td_size_1">
                                                <div class="">
                                                    <a class="py-3 px-4 mx-1 btn-1" href="javscript:void(0)">Download</a>
                                                </div>
                                            </td>
                                        </tr>
                                      @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('bottom_script')
@endsection