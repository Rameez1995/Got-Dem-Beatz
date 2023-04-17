<!--<header class="dashbord_header">-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-9 col-12 mb-3 mb-sm-0">
                    <div class="position-relative">
                        <input type="text" class="form-control input_header" placeholder="Search here">
                        <i class="fa-solid fa-magnifying-glass position-absolute search_icon"></i>
                        <div class="filter-text d-flex position-absolute">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23.992" height="21.976" viewBox="0 0 23.992 21.976">
                                <g id="Group" transform="translate(0.5 0.5)">
                                  <path id="Vector" d="M4.9,2.412A2.431,2.431,0,0,1,2.449,4.825,2.431,2.431,0,0,1,0,2.412,2.431,2.431,0,0,1,2.449,0,2.431,2.431,0,0,1,4.9,2.412Z" transform="translate(14.022)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                  <path id="Vector-2" data-name="Vector" d="M0,0H4.085" transform="translate(18.907 2.412)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                  <path id="Vector-3" data-name="Vector" d="M0,0H14.022" transform="translate(0 2.412)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                  <path id="Vector-4" data-name="Vector" d="M4.9,2.412A2.431,2.431,0,0,1,2.449,4.825,2.431,2.431,0,0,1,0,2.412,2.431,2.431,0,0,1,2.449,0,2.431,2.431,0,0,1,4.9,2.412Z" transform="translate(4.382 8.076)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                  <path id="Vector-5" data-name="Vector" d="M0,0H13.713" transform="translate(9.279 10.488)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                  <path id="Vector-6" data-name="Vector" d="M0,0H4.395" transform="translate(0 10.488)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                  <path id="Vector-7" data-name="Vector" d="M4.9,2.412A2.431,2.431,0,0,1,2.449,4.825,2.431,2.431,0,0,1,0,2.412,2.431,2.431,0,0,1,2.449,0,2.431,2.431,0,0,1,4.9,2.412Z" transform="translate(14.022 16.151)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                  <path id="Vector-8" data-name="Vector" d="M0,0H4.085" transform="translate(18.907 18.564)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                  <path id="Vector-9" data-name="Vector" d="M0,0H14.022" transform="translate(0 18.564)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>
                                </g>
                            </svg>
                            <span class="text-white ms-3">Filters</span>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-sm-none">
                    <img src="images/logo.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-4 text-end align-self-center col-sm-2 col-6">
                    <ul class="d-flex justify-content-end">
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle dropdown_header dropdown_header_dot" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                   <i class="fa-solid fa-bell"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                              </ul>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle dropdown_header" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="<?php echo e(secure_url('/admin/user/edit/'. Auth::user()->id)); ?>"><i class="fas fa-user-edit mr-2"></i> Profile</a></li>
                                    <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="fas fa-users mr-2"></i>Logout</a><form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;"><?php echo csrf_field(); ?></form></li>
        
                                </ul>
                            </div>
                        </li>
                        <li class="text-center d-lg-none align-self-center">
                            <i class="fa-solid fa-bars-staggered mobile_menu_trigger "></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <!--</header>-->
<?php /**PATH /home/backendhostingla/public_html/webapp/beatpro/resources/views/dashboard/front/includes/header.blade.php ENDPATH**/ ?>