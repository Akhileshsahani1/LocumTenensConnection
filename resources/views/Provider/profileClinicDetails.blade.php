@extends('layouts.main')
@section('main-section')
@push('title')
<title>Profile Clinic</title>
@endpush



<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- End of Topbar -->
                @include('layouts.topbar')

                <!-- Begin Page Content -->
                <div style="height: 200px;">
                    <img src="{{ asset('provider/img/profileBanner.png') }}" alt="" class="img-fluid w-100 h-100">
                </div>
                <div class="container-fluid pe-xl-5 pe-0 ps-lg-5">

                    <div class="d-flex position-relative mb-5 pb-5">
                        <div class="border bg-white rounded-circle p-1 position-absolute"
                            style="width: 190px; height: 190px; top:-60px;">

                            @if(!empty($practices->image))
                            <img src="{{ asset('/Practiceprofile/'.$practices->image)}}" alt=""
                                style="width:100%; height: 100%; object-fit:fill; border-radius: 50%;">
                            @else
                            <img src="{{ asset('/Practiceprofile/profile.png')}}" alt=""
                                style="width:100%; height: 100%; object-fit:fill; border-radius: 50%;">
                            @endif
                        </div>

                        <div class="person_name pt-1">
                            <!-- <h3 class="font-30 fw-semibold "></h3> -->

                            <div class="fs-3 mb-1 fw-semibold">
                                @if(!empty($practices->clinicName)){{$practices->clinicName}}@endif</div>
                            <div class="font-14 mb-0 fw-semibold">
                                @if(!empty($practices->state)){{$practices->state}}@endif,
                                @if(!empty($practices->city)){{$practices->city}}@endif,
                                @if(!empty($practices->zipCode)){{$practices->zipCode}}@endif</div>
                        </div>
                        <!-- <fiv class="ms-auto"><a href="editProfile.html" class="btn btn-outline-secondary btn-sm mt-2"><i class="bi bi-pencil-square"></i> Edit</a></fiv> -->

                    </div>
                    <div class="">

                        <div class="col-xl-12 col-12">
                            <div class="row mx-0">
                                <span class='border-bottom border-2 border-dark text-dark fw-semibold fs-6 py-2 px-0'
                                    style="width:auto;"><i class="bi bi-postcard me-2"></i> View Practice Details</span>
                            </div>
                            <div class="card mb-3 p-3">
                                <div class="card-body pb-0">
                                    <h4 class="fw-semibold mb-3">Description</h4>
                                    <div>
                                        <p class="m-0 font-12 gray">
                                            @if(!empty($practices->bio)){{$practices->bio}}@endif
                                        </p>
                                    </div>

                                    <div class="my-3">

                                        <div class="row ">

                                            <div class="col-md-6 font-14">
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Practice Type</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($practices->practiceDetails->practiceType)){{$practices->practiceDetails->practiceType}}@endif
                                                    </div>
                                                </div>

                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Position Type</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($practices->practiceDetails->positionType)){{$practices->practiceDetails->positionType}}@endif
                                                    </div>

                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Location</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($practices->practiceDetails->location)){{$practices->practiceDetails->location}}@endif
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Working Hours</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($practices->practiceDetails->workingHours)){{$practices->practiceDetails->workingHours}}@endif
                                                    </div>
                                                </div>

                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Requirements</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">8+</div>
                                                </div>

                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Expected daily Patient Volume</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($practices->practiceDetails->patientVolume)){{$practices->practiceDetails->patientVolume}}@endif
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Expected daily Working hours</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">
                                                        @if(!empty($practices->practiceDetails->workingHours)){{$practices->practiceDetails->workingHours}}@endif
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-5 fw-semibold">Primary handedness</div>
                                                    <div class="col-2">:-</div>
                                                    <div class="col-5 fw-semibold gray">Eastern Shore</div>
                                                </div>
                                                <!-- <div class="row my-3">
                                                        <div class="col-5 fw-semibold">Experience</div>
                                                        <div class="col-2">:-</div>
                                                        <div class="col-5 fw-semibold opacity-50">$30.00</div>
                                                    </div> -->
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

</body>
@endsection