@extends('Admin.layouts.master')
@section('content')
<div class="row admin_profile_header mx-0" style="background-image:url('{{ asset('../../Admin/uploadprofile/'.$admin_data->uploadBackgroundPhoto) }}') !important;background-repeat: no-repeat, repeat;">
    
</div>
<div class="container">
    <div class="row mx-0 pt-3 mb-5 d-flex justify-content-between align-itmes-center">
        <div class="view_profile_image_wrapper d-flex w-auto">
            <div class="view_profile_image ratio ratio-1x1 me-3" style="background-image:url('{{ asset('../../Admin/uploadprofile/'.$admin_data->uploadPhoto) }}') !important;"></div>
            <div class="profile_title">
                <p class="title">{{ucwords($admin_data->firstName) . " ". ucwords($admin_data->lastName)}}</p>
                <div class="tag_wrapper d-flex">
                    <!-- <div class="tag_white">
                        <p class="mb-0">Endodontist</p>
                        </div>
                        <div class="tag_white">
                        <p class="mb-0">6+ years experience</p>
                    </div> -->

                </div>
                
            </div> 
        </div>
        <div class="div profile_edit  w-auto">
            <a href="{{route('profileeditPage')}}">
                <img src="./images/profile_edit.svg"/>
            </a>
        </div> 
    </div>
    <!-- <div class="row mb-5 mx-0">
        <div class="col-lg-12">
            <p class="border_heading"><span class="border-btm"><img src="./images/open_tsb.svg" class="me-2"/>View Provider Details</span></p>     
        </div>
    </div> -->
    <div class="py-4 mx-0 view_details_card custm_scroll">
        <div class="row">
            <div class="col-lg-12 title">
                <p>Admin Details</p>
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
                            <td>{{$admin_data->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone Number</th>
                            <td>:-</td>
                            <td>{{$admin_data->phoneNumber}}</td>
                        </tr>
                       
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#certificateModal">
            Launch demo modal
        </button> -->
        
        <!-- Modal -->
        <div class="modal fade view_upload_modal" id="certificateModal" tabindex="-1" aria-labelledby="certificateModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="border-0">
                    <button type="button" class="btn-close cstm_btn_close" data-bs-dismiss="modal" aria-label="Close"></button>   
                </div>
                
                <div class="modal-body p-0 custm_scroll">
                    <div class="modal_inner">
                        <div class="view_upload_image mb-3">
                            <img src="./images/certificate1.png" class="img-fluid"/>
                        </div>
                        <div class="view_upload_image mb-3">
                            <img src="./images/certificate1.png" class="img-fluid"/>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div> 
@endsection