@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">Add Banner</p>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-lg-3 px-0">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('error')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif      
                <form class="login_form" action="{{route('submitBanner')}}" method="POST" enctype="multipart/form-data">
        
                @csrf
                <div class="mb-4 form_filed">
                    <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" name="logo">

                    <lable id="passerror" class="text-danger"><label>
                </div>
                <div class="mb-4 form_filed">
                    <label for="firstheading" class="form-label">First Heading</label>
                    <textarea type="text" class="form-control " name="firstHeading" id="firstHeading" placeholder="Enter First Heading" maxlength="100">{{ !empty($banner_data_edit->firstHeading) ? $banner_data_edit->firstHeading: NULL }}</textarea>
                    <p class='text-grey text-start'><span id="count_first_heading"></span></p>
                </div>
             
                <div class="mb-4 form_filed">
                    <label for="lastheading" class="form-label">Last Heading:</label>
                    <textarea type="text" class="form-control" name="lastHeading" id="lastHeading"placeholder="Enter Last Heading" maxlength="100">{{!empty($banner_data_edit->lastHeading)? $banner_data_edit->lastHeading: NULL }}</textarea>
                    <p class='text-grey text-start'><span id="count_last_heading"></span></p>
                </div>
               
                <button type="submit" class="btn btn_commn_sm mb-4">Save</button>
               
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

    var max_length = 100;
    var data = $("#firstHeading").val();
    $("#firstHeading").keyup(function() {
        var len = max_length - $(this).val().length;
        // alert(len);
        if (len > 0) {
            $("#count_first_heading").removeClass('text-danger');
            $("#count_first_heading").addClass('text-grey');
            $("#count_first_heading").text(
                'First Heading should not be of maximum 100 characters length');
        } else {
            $("#count_first_heading").removeClass('text-grey');
            $("#count_first_heading").addClass('text-danger');
            $("#count_first_heading").text('Dont exceed more than 100 characters');
        }
    });

    var data = $("#lastHeading").val();
    $("#lastHeading").keyup(function() {
        var len = max_length - $(this).val().length;
        // alert(len);
        if (len > 0) {
            $("#count_last_heading").removeClass('text-danger');
            $("#count_last_heading").addClass('text-grey');
            $("#count_last_heading").text(
                'First Heading should not be of maximum 100 characters length');
        } else {
            $("#count_last_heading").removeClass('text-grey');
            $("#count_last_heading").addClass('text-danger');
            $("#count_last_heading").text('Dont exceed more than 100 characters');
        }
    });
});
</script>

@endsection