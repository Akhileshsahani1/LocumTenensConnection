@extends('Admin.layouts.master')
@section('content')
<div class="row profile_header mx-0" style="">
</div>
<div class="container">
    <div class="row mx-0 pt-3 mb-5">
        <div class="view_profile_image ratio ratio-1x1 me-3">
            <img src="{{ asset('provider/uploads/upload_photo/'.$get_provider_details_by_id->upload_Photo) }}" alt="{{$get_provider_details_by_id->upload_Photo}}">
        </div>
        <div class="profile_title">
            <p class="title">Dr.
                {{ucwords($get_provider_details_by_id->firstName). " ". ucwords($get_provider_details_by_id->lastName) }}
            </p>
            <div class="tag_wrapper d-flex">
                <div class="tag_white">
                    <p class="mb-0">{{ucwords($get_provider_details_by_id->practitioner_Type)}}</p>
                </div>
                <div class="tag_white">
                    <p class="mb-0">{{$get_provider_details_by_id->professional_Experience}} years experience</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5 mx-0">
        <div class="col-lg-12">
            <p class="border_heading"><span class="border-btm"><img src="{{asset('./Admin/images/open_tsb.svg')}}"
                        class="me-2" />View
                    Provider Details</span></p>
        </div>
    </div>
    <div class="py-4 mx-0 view_details_card custm_scroll">
        <div class="row">
            <div class="col-lg-12 title">
                <p>Personal Details</p>
            </div>
            <div class="col-lg-12 about">
                <p>
                {{$get_provider_details_by_id->description}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-borderless view_details_table">
                        <tbody>
                            <tr>
                                <th scope="row">Email ID</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->email}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone Number</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->phone}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address</th>
                                <td>:-</td>
                                <td>{{ucwords($get_provider_details_by_id->city)}},
                                    {{ucwords($get_provider_details_by_id->state)}},
                                    {{$get_provider_details_by_id->zipcode}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Practice type</th>
                                <td>:-</td>
                                <td>{{ucwords($get_provider_details_by_id->practitioner_Type)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Position type</th>
                                <td>:-</td>
                                <td>{{ucwords($get_provider_details_by_id->position_Type)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Availability Start Date</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->start_Date}}</td>
                            </tr>
                            <tr>
                                <th scope="row">End Date</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->end_Date}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Primary Handedness</th>
                                <td>:-</td>
                                <td>{{ucwords($get_provider_details_by_id->primary_Handedness)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Distance to travel</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->distance_Willing_To_Travel_One_Way}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Daily working hours</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->peferred_Daily_Working_Hours}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Daily Patient Volume</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->preferred_Daily_Patient_Volume}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Stay overnight</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->are_You_Willing_Overnight}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Experience</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->professional_Experience}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Availability requirements</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->booking_Availability_Requirements}}</td>
                            </tr>
                            <tr>
                                <th scope="row">List of Daily needs</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->daily_Needs}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Any special needs</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->special_Needs}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Preferred Region</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->preferred_Region}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Available Days</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->available_Days}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Procedure type</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->procedure_Type}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Advanced Degree Licenses</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->advanced_Degree_Licences}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Qualities for practice Environment</th>
                                <td>:-</td>
                                <td>{{$get_provider_details_by_id->qualities_Practice_Environment}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Average Daily Rate</th>
                                <td>:-</td>
                                <td>${{number_format($get_provider_details_by_id->average_Daily_Rate, 2)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Average Hour Rate</th>
                                <td>:-</td>
                                <td>${{number_format($get_provider_details_by_id->average_hour_rate,2)}}</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_profile_title mt-3">
                                        <p class="mb-0">Profile photo</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="view_Detailsprofile_photo">
                                        <img src="{{ asset('provider/uploads/upload_photo/'.$get_provider_details_by_id->upload_Photo) }}" alt="{{$get_provider_details_by_id->upload_Photo}}">
                                    </div>
                                </th>
                                <td>
                                </td>
                                <td>
                                    <div class="view_btn ">
                                        <button class="btn btn_commn_xs" data-bs-toggle="modal"
                                            data-bs-target="#profile_photo">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_profile_title mt-3">
                                        <p class="mb-0">Virginia Dental License</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex">
                                        <div class="view_Details_rectangle_profile me-3">
                                            <img src="{{ asset('provider/uploads/Virginia_Dental_File/'.$get_provider_details_by_id->Virginia_Dental_File) }}" alt="{{$get_provider_details_by_id->Virginia_Dental_File}}">
                                        </div>
                                        <div class="view_Details_rectangle_profile">
                                        </div>
                                    </div>
                                </th>
                                <td>
                                </td>
                                <td>
                                    <div class="view_btn ">
                                        <button class="btn btn_commn_xs" data-bs-toggle="modal"
                                            data-bs-target="#Virginia_Dental_License">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_profile_title mt-3">
                                        <p class="mb-0">Malpractices Certificate</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex">
                                        <div class="view_Details_rectangle_profile me-3">
                                        <img src="{{ asset('provider/uploads/malpractices_Certificate/'.$get_provider_details_by_id->malpractices_Certificate) }}" alt="{{$get_provider_details_by_id->malpractices_Certificate}}">
                                        </div>
                                        <div class="view_Details_rectangle_profile">
                                         
                                        </div>

                                    </div>
                                </th>
                                <td>
                                </td>
                                <td>
                                    <div class="view_btn ">
                                        <button class="btn btn_commn_xs" data-bs-toggle="modal"
                                            data-bs-target="#malpractices_certificate">View</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_profile_title mt-3">
                                        <p class="mb-0">DEA License</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex">
                                    <?php
                                        $aa=$get_provider_details_by_id->dea_License;
                                        $array_length =  count(array($aa));                               
                                        $aaa=explode(",",$aa);
                                    ?>
                                    @foreach ($aaa as $key => $aaaa)

                                        <div class="view_Details_rectangle_profile me-3">
                                        <img src="{{ asset('provider/uploads/dea_License/'.$aaaa) }}" alt="{{$aaaa}}">
                                        </div>
                                    @endforeach
                                    </div>
                                </th>
                                <td>
                                </td>
                                <td>
                                    <div class="view_btn " data-bs-toggle="modal" data-bs-target="#dea_license">
                                        <button class="btn btn_commn_xs">View all</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_profile_title mt-3">
                                        <p class="mb-0">W9 Form </p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="table_profile_title">
                                        <a class="mb-0">https://w9.form.example.com</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Profile photo -->

        <div class="modal fade view_upload_modal" id="profile_photo" tabindex="-1" aria-labelledby="certificateModal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="border-0">
                        <button type="button" class="btn-close cstm_btn_close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-0 custm_scroll">
                        <div class="modal_inner">
                            <div class="view_upload_image mb-3">
                            <img src="{{ asset('provider/uploads/upload_photo/'.$get_provider_details_by_id->upload_Photo) }}" alt="{{$get_provider_details_by_id->upload_Photo}}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Virginia Dental License -->

        <div class="modal fade view_upload_modal" id="Virginia_Dental_License" tabindex="-1"
            aria-labelledby="Virginia_Dental_License" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="border-0">
                        <button type="button" class="btn-close cstm_btn_close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 custm_scroll">
                        <div class="modal_inner">
                            <div class="view_upload_image mb-3">
                            <img src="{{ asset('provider/uploads/Virginia_Dental_File/'.$get_provider_details_by_id->Virginia_Dental_File) }}" alt="{{$get_provider_details_by_id->Virginia_Dental_File}}">
                            </div>
                            <div class="view_upload_image mb-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- malpractices_certificate start -->

        <div class="modal fade view_upload_modal" id="malpractices_certificate" tabindex="-1"
            aria-labelledby="malpractices_certificate" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="border-0">
                        <button type="button" class="btn-close cstm_btn_close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 custm_scroll">
                        <div class="modal_inner">
                            <div class="view_upload_image mb-3">
                            <img src="{{ asset('provider/uploads/malpractices_Certificate/'.$get_provider_details_by_id->malpractices_Certificate) }}" alt="{{$get_provider_details_by_id->malpractices_Certificate}}">
                            </div>
                            <div class="view_upload_image mb-3">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <!-- malpractices_certificate end -->
                 <!-- dea_license start -->

        <div class="modal fade view_upload_modal" id="dea_license" tabindex="-1" aria-labelledby="dea_license"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="border-0">
                        <button type="button" class="btn-close cstm_btn_close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0 custm_scroll">
                        <div class="modal_inner">
                                 <?php
                                $aa=$get_provider_details_by_id->dea_License;
                                $array_length =  count(array($aa));                               
                                $aaa=explode(",",$aa);
                            ?>
                            @foreach ($aaa as $key => $aaaa)

                            <div class="view_upload_image mb-3">
                          

                            <img src="{{ asset('provider/uploads/dea_License/'.$aaaa) }}" alt="{{$aaaa}}">
                            
                
                          
                        </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <!-- dea_license end -->
    </div>
</div>
@endsection