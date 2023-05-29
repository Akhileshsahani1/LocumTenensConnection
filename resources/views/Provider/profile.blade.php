@extends('layouts.main')
@section('main-section')
@push('title')
<title>Profile</title>
@endpush

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
                <div style="height: 200px;">
                    <img src="{{ asset('provider/img/profileBanner.png') }}" alt="" class="img-fluid w-100 h-100">
                </div>
                <div class="container-fluid pe-xl-5 pe-0 ps-lg-5">
                    <div class="d-flex position-relative mb-5 pb-5">
                        <div class="border bg-white rounded-circle p-1 position-absolute"
                            style="width: 190px; height: 190px; top:-60px;">
                            <img src="{{ asset('provider/uploads/upload_photo')}}/{{$user->upload_Photo}}" alt=""
                                style="width:100%; height: 100%; object-fit:fill; border-radius: 50%;">
                        </div>



                        <div class="person_name">
                            <h3 class="font-30 fw-semibold mb-3">{{$user->firstName}}</h3>
                            <span class="px-2 bg-white py-1 me-2 shadow-2 border rounded-2">
                                <span class="font-14 mb-0 fw-semibold">{{$user->practitioner_Type}}</span>
                            </span>
                            <span class="px-2 bg-white py-1 me-2 border shadow-2 rounded-2">
                                <span class="font-14 mb-0 fw-semibold">{{$user->professional_Experience}} years
                                    experience</span>
                            </span>
                        </div>
                        <fiv class="ms-auto"><a href="{{ route('profile.edit') }}"
                                class="btn btn-outline-secondary btn-sm mt-2"><i class="bi bi-pencil-square"></i>
                                Edit</a></fiv>

                    </div>
                    <div class="">
                        <div class="col-xl-12 col-12">
                            <div class="card mb-3 p-3">
                                <div class="card-body pb-0">
                                    <h4 class="fw-semibold mb-3">Personal Details</h4>
                                    <div>
                                        <p class="m-0 font-13 gray lh-base">
                                            @if(!empty($user->description)){{$user->description}}@endif
                                        </p>
                                    </div>
                                    <div class="my-3">
                                        <div class="row ">
                                            <div class="col-md-6 font-14">
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Email ID</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->email)){{$user->email}}@endif</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Phone</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->phone)){{$user->phone}}@endif</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">State</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @foreach($state as $state_data)
                                                            @if($state_data->id == $user->state)
                                                                @if(!empty($state_data->state)){{$state_data->state}}@endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">City</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                    @foreach($city as $city_data)
                                                            @if($city_data->id == $user->city)
                                                                @if(!empty($city_data->city)){{$city_data->city}}@endif
                                                            @endif
                                                    @endforeach
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Zipcode</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->zipcode)){{$user->zipcode}}@endif</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Position type</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->position_Type)){{$user->position_Type}}@endif
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Availability Start Date</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->start_Date)){{$user->start_Date}}@endif</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">End Date</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->end_Date)){{$user->end_Date}}@endif</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Primary Handedness</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->primary_Handedness)){{$user->primary_Handedness}}@endif
                                                    </div>
                                                </div>

                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Distance to travel</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->distance_Willing_To_Travel_One_Way)){{$user->distance_Willing_To_Travel_One_Way}}@endif
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Daily working hours</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->peferred_Daily_Working_Hours)){{$user->peferred_Daily_Working_Hours}}@endif
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Daily patient volume</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->preferred_Daily_Patient_Volume)){{$user->preferred_Daily_Patient_Volume}}@endif
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Experience</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($user->professional_Experience)){{$user->professional_Experience}}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-5 px-3">
                                <div class="card-body pb0">
                                    <h4 class="fw-semibold mb-3">Advanced Degree Licenses</h4>
                                    <div class="my-3">
                                        <div class="row">
                                      
                                            <div class="col-md-3">
                                                <div class="row">
                                                @foreach(explode(',',$user->advanced_Degree_Licences) as $degree_licences)
                                                    <div class="col-md-6">
                                                        <div class="my-4">
                                                            <img src="{{ asset('provider/img/edu.png') }}" alt="">
                                                            <span
                                                                class="ms-2 font-14 fw-semibold">@if(!empty($degree_licences)){{$degree_licences}}@endif</span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection