@extends('layouts.main')
@section('main-section')
@push('title')
<title>Dashboard</title>
@endpush

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
      @include('layouts.sidebar')
    <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.topbar')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <form action="{{ route('provider.dashboard')}}" method="post">
                <div class="container-fluid px-5 mob-p-0">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0">Dashboard</h4>
                        </div>
                    <div class="row">
                        <div class="col-12 info-card mb-4">
                            <div class="card h-100 py-2 border-0 shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-14 fw-500 mb-1">
                                                Current bookings</div>
                                            <div class="font-26 mb-0 fw-bold">100</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="circle-icon">
                                                <i class="bi bi-chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 info-card mb-4">
                            <div class="card h-100 py-2 border-0 shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-14 fw-500 mb-1">
                                                Current Dates Booked</div>
                                            <div class="font-26 mb-0 fw-bold">100</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="circle-icon">
                                                <i class="bi bi-chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 info-card mb-4">
                            <div class="card h-100 py-2 border-0 shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-14 fw-500 mb-1">
                                                Past Bookings</div>
                                            <div class="font-26 mb-0 fw-bold">100</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="circle-icon">
                                                <i class="bi bi-chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 info-card mb-4">
                            <div class="card h-100 py-2 border-0 shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-14 fw-500 mb-1">
                                                Pending Bookings</div>
                                            <div class="font-26 mb-0 fw-bold">100</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="circle-icon">
                                                <i class="bi bi-chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 info-card mb-4">
                            <div class="card h-100 py-2 border-0 shadow">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col mr-2">
                                            <div class="font-14 fw-500 mb-1">
                                                Ratings and Review</div>
                                            <div class="font-26 mb-0 fw-bold">100</div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="circle-icon">
                                                <i class="bi bi-chevron-right"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <h4 class="mb-0 py-4">Reports</h4>
                        </div>
                        <div class="col-lg-8 py-1">
                            <div class="card shadow border-0 pb-4">
                                <div class="card-header bg-white py-3 border-0">
                                    <p class="blue-text font-20 fw-bold mb-1">Your earning overview of this year</p>
                                    <p class="mb-0 font-12 gray-text">Last updated Thursday, August 22 at 12:00 AM (PT)
                                    </p>
                                </div>
                                <div class="card-body">
                                    <canvas id="chLine"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card h-100 shadow border-0">
                                <div class="card-header bg-white py-3 fw-bold blue-text">Recently Activity</div>
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush fw-semibold font-14 px-3">
                                        <li class="list-group-item">John Joe Clinic Hired You</li>
                                        <li class="list-group-item">Sarah Clinic Hired You</li>
                                        <li class="list-group-item">Robert Clinic Hired You</li>
                                        <li class="list-group-item">Sarah Clinic Hired You</li>
                                        <li class="list-group-item">Robert Clinic Hired You</li>
                                        <li class="list-group-item">Robert Clinic Hired You</li>
                                        <li class="list-group-item">Sarah Clinic Hired You</li>
                                        <li class="list-group-item">Robert Clinic Hired You</li>
                                        <li class="list-group-item">John Joe Clinic Hired You</li>
                                        <li class="list-group-item">Sarah Clinic Hired You</li>
                                        <li class="list-group-item">Robert Clinic Hired You</li>
                                        <li class="list-group-item">Sarah Clinic Hired You</li>
                                        <li class="list-group-item">Robert Clinic Hired You</li>
                                        <li class="list-group-item">Robert Clinic Hired You</li>
                                        <li class="list-group-item">Robert Clinic Hired You</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-9">
                                    <p class="fw-bold font-20 my-4">Current Dates Booked</p>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-lg-8 ms-auto">
                                        <input type="text" name="daterange" value="" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            @foreach($Practice as $datalists)
                                <div class="col-lg-4 col-4 my-3">
                                    <div class="card border-0">
                                        <div class="card-header bg-white px-3">
                                            <div class="row">
                                                <div class="col-2">
                                                    <div class="border d-flex justify-content-center align-items-center rounded-circle">
                                                    @if(!empty($datalists->image))    
                                                    <img src="{{asset('/Practiceprofile/'.$datalists->image) }}" class="rounded-circle"alt=""
                                                            style="width:100%; height: 100%; object-fit:fill;">

                                                    @else
                                                    <img src="{{asset('provider/img/logo-wide.png') }}" alt=""
                                                            style="width:100%; height: 100%; object-fit:fill;">
                                                    @endif
                                                    </div>
                                                </div>
                                                <div class="col-10 my-auto">
                                              
                                                    <h3 class="font-16 mb-0 fw-bold">@if(!empty($datalists->clinicName)){{$datalists->clinicName}}@endif</h3>
                                                    <p class="font-12 mb-0 fw-semibold"><span>4.8 </span>
                                                    <img src="{{asset('provider/img/star.png') }}" width="10"/></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                         
                                            <p class="font-12 mb-2 border-bottom py-3">@if(!empty($datalists->bio)){{substr($datalists->bio, 0,100)}} . . .@endif</p>
                                           

                                          
                                        <div class="row mb-1 font-15 fw-bold">
                                                <div class="col-5 d-flex align-items-center">
                                                    <img src="{{asset('provider/img/circle-list.svg') }}" alt="#" class="me-2 w-15">
                                                    <p class="mb-0 text-fade">Practice Type</p>
                                                </div>
                                                <div class="col-2">:</div>
                                                <div class="col-5">@if(!empty($datalists->practiceType)){{$datalists->practiceType}}@endif </div>
                                            </div>
                                            <div class="row mb-1 font-15 fw-bold">
                                                <div class="col-5 d-flex align-items-center">
                                                    <img src="{{ asset('provider/img/circle-list.svg') }}" alt="#" class="me-2 w-15">
                                                    <p class="mb-0 text-fade">Position Type</p>
                                                </div>
                                                <div class="col-2"> : </div>
                                                <div class="col-5">@if(!empty($datalists->positionType)){{$datalists->positionType}}@endif</div>
                                            </div>
                                            <div class="row mb-1 font-15 fw-bold">
                                                <div class="col-5 d-flex align-items-center">
                                                    <img src="{{ asset('provider/img/map.svg') }}" alt="#" class="me-2 w-15">
                                                    <p class="mb-0 text-fade">location</p>
                                                </div>
                                                <div class="col-2"> : </div>
                                                <div class="col-5">@if(!empty($datalists->location)){{$datalists->location}}@endif</div>
                                            </div>
                                            <div class="row mb-1 font-15 fw-bold">
                                                <div class="col-5 d-flex align-items-center">
                                                    <img src="{{asset('provider/img/clock.svg') }}" alt="#" class="me-2 w-15">
                                                    <p class="mb-0 text-fade">Working hours</p>
                                                </div>
                                                <div class="col-2 fw-bold">:</div>
                                                <div class="col-5">@if(!empty($datalists->workingHours)){{$datalists->workingHours}}@endif</div>
                                            </div>
                                            <div class="row mb-1 font-15 fw-bold">
                                                <div class="col-5 d-flex align-items-center">
                                                    <img src="{{asset('provider/img/date.svg') }}" alt="#" class="me-2 w-15">
                                                    <p class="mb-0 text-fade">Requirments</p>
                                                </div>
                                                <div class="col-2">:</div>
                                                <div class="col-5">@if(!empty($datalists->workingHours)){{$datalists->workingHours}}@endif</div>
                                            </div>
                                        </div>
                                      
                                        <div class="card-footer text-center bg-white py-3">
                                            <a href="{{ route('profileclinic.get', $datalists->id)}}" class="btn btn-primary col-lg-5 mx-auto shadow card_button">View</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach



                                
                            </div>
                        </div>
                    </div>
                </div>
</form>
            </div>
        </div>
    </div>
    
    
</body>


@endsection

