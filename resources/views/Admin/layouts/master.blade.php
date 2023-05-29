<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @include('Admin.layouts.header')
</head>

<body>
    <section>
        <div class="d-flex">
            @include('Admin.layouts.sidebar')
            <div class="admin_dashboard_wrapper">
                <div class="row commn_admin_header mx-0 px-5 justify-content-between align-items-center">
                    <div class="col-10 px-0">
                    <?php

                    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
                        $url = "https://";   
                    }else{
                        $url = "http://";   
                    }   
                    $path =   $url.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    ?>
                        @if($path == $url.$_SERVER['HTTP_HOST']."/Admin/dashboard")
                        <p class="mb-0 title" id="dashboard">Dashboard</p>
                        @elseif($path == $url.$_SERVER['HTTP_HOST']."/Admin/resolutions")
                        <p class="mb-0 title" id="provider">Resolutions Cases</p>
                        @elseif($path == $url.$_SERVER['HTTP_HOST']."/Admin/provider")
                        <p class="mb-0 title" id="practice">Provider</p>
                        @elseif($path == $url.$_SERVER['HTTP_HOST']."/Admin/practice")
                        <p class="mb-0 title" id="allpages">Practice</p>
                        @elseif($path == $url.$_SERVER['HTTP_HOST']."/Admin/allpages")
                        <p class="mb-0 title" id="changePassword">Landing Page</p>
                        @elseif($path == $url.$_SERVER['HTTP_HOST']."/Admin/changePassword")
                        <p class="mb-0 title" id="dashboard">Setting</p>
                        @endif
                    </div>
                    <div class="col-2 text-end px-0">
                        <div class="profile_wrapper d-flex align-items-center justify-content-end">
                            <div class="profile_image">
                                <?php $pick =Session::get('Admin_pic');?>

                                @if(!empty($pick))
                                <img src="{{ asset('Admin/uploadprofile/'.$pick) }}" style="border-radius:50%;" alt="Profile Pick"/>
                                @else
                                <img src="{{asset('Admin/images/profile.png') }}" style="border-radius:50%;" alt="Profile Pick"/>
                                @endif
                            </div>
                            <div class="dropdown dropedown_wrapper">
                                <button class="btn btm_white dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Session::get('admin'); }}
                                </button>
                                <ul class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item" href="{{route('profileLoadPage')}}">My Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#logoutModal"
                                            href="#">Log Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </section>
    <!-- modal logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  ">
            <div class="modal-content logout_modal_content">
                <!-- <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div> -->
                <div class="modal-body login_form logout_modal py-5">
                    <div class="row">
                        <div class="col-lg-12 text-center mb-3">
                            <p class="mb-2 heading">Log Out</p>
                            <p class="sub_heading">Are you sure you want to log out?</p>
                        </div>
                        <div class="col-12 text-center">
                            <a href="{{route('logoutAdmin')}}">
                                <button type="submit" class="btn new_btn_commn_sm  me-3">LOG OUT</button>
                            </a>
                            <button type="submit" class="btn btn_gray_commn_sm" data-bs-dismiss="modal">CANCEL</button>
                        </div>
                    </div>
                    <div class="stroke">
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> -->
            </div>
        </div>
    </div>
    <!-- modal end logout -->
    @include('Admin.layouts.footer')
    @yield('scripts')
</body>

</html>