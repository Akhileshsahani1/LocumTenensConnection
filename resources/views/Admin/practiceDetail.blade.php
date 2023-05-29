@extends('Admin.layouts.master')
@section('content')
<div class="row profile_header mx-0" style="">
</div>
    <div class="container">
        <div class="row mx-0 pt-3 mb-5">
            <div class="view_profile_image ratio ratio-1x1 me-3">
                <img src="{{ asset('/Admin/images/viewprofile.png') }}" />
            </div>
            <div class="profile_title">
                <p class="title">{{$practice_details->clinicName }}</p>
                <div class="tag_wrapper d-flex">
                    <div class="tag_white">
                        <p class="mb-0">{{ucwords($practice_details->city).", ".$practice_details->zipCode }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-5 mx-0">
            <div class="col-lg-12">
                <p class="border_heading"><span class="border-btm"><img src="{{asset('./Admin/images/open_tsb.svg')}}" class="me-2" />View
                        Practice Details</span></p>
            </div>
        </div>
        <div class="py-4 mx-0 view_details_card custm_scroll">
            <div class="row">
                <div class="col-lg-12 title">
                    <p>Personal Details</p>
                </div>
                <div class="col-lg-12 about">
                    <p>
                    {{$practice_details->bio}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table table-borderless view_details_table">
                            <tbody>
                            <tr>
                                    <th scope="row">Clinic name</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->clinicName)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email ID</th>
                                    <td>:-</td>
                                    <td>{{$practice_details->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone Number</th>
                                    <td>:-</td>
                                    <td>{{$practice_details->phoneNumber}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->city)}}, {{ucwords($practice_details->zipCode)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Practice type</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->practiceType)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Position type</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->positionType)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Expected Daily Patient Valume</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->patientVolume)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Do you teat children ?</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->treat)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Expected daily working hours</th>
                                    <td>:-</td>
                                    <td>{{$practice_details->workingHours}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Location of the Delivery Systems</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->location)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Language</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->language)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Average Daily Amount</th>
                                    <td>:-</td>
                                    <td>{{number_format($practice_details->amount, 2)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Procedure Type</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->procedureType)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Qualities in a Locum Tenen</th>
                                    <td>:-</td>
                                    <td>{{ucwords($practice_details->qualities)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection