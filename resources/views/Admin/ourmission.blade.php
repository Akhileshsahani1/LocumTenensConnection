@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">Add Our Mission</p>
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
            <form class="login_form" action="{{route('submitMission')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 form_filed">
                    <label for="logo" class="form-label">Our Mission Content</label>
                    <textarea id="our_mission_contents" class="form-control" name="our_mission_contents" maxlength="500"> @if (!empty($displaymission_data->our_mission_contents)){{$displaymission_data->our_mission_contents}}@endif</textarea>
                    <p class='text-grey text-start'><span id="count_ourmission"></span></p>
                </div>
                <div class="mb-4 form_filed">
                    <label for="firstheading" class="form-label">Dental Practice First Paragraph </label>
                    <input type="text" class="form-control" name="dentalpractice_para_first" id="dentalpractice_para_first"
                        placeholder="Enter First Paragraph of Detanal Practice" @if(!empty($displaymission_data->dentalpractice_para_first)) value="{{$displaymission_data->dentalpractice_para_first}}" @endif />
                        <span id="dentalpractice_para_first_error" class="text-danger"></span>
                        

                </div>
                <div class="mb-4 form_filed">
                    <label for="lastheading" class="form-label">Dental Practice Search</label>
                    <input type="text" class="form-control" name="dentalpractice_search" id="dentalpractice_search"
                        placeholder="Enter Search Content" @if(!empty($displaymission_data->dentalpractice_search)) value="{{$displaymission_data->dentalpractice_search}}" @endif />
                        <span id="dentalpractice_search_error" class="text-danger"></span>

                </div>
                <div class="mb-4 form_filed">
                    <label for="dentalpractice_schedule" class="form-label">Dental Practice Schedule</label>
                    <input type="text" class="form-control" name="dentalpractice_schedule" id="dentalpractice_schedule"
                        placeholder="Enter Schedule Content" @if(!empty($displaymission_data->dentalpractice_schedule)) value="{{$displaymission_data->dentalpractice_schedule}}" @endif />
                        <span id="dentalpractice_schedule_error" class="text-danger"></span>
                </div>
                <div class="mb-4 form_filed">
                    <label for="dentalpractice_book" class="form-label">Dental Practice Book</label>
                    <input type="text" class="form-control" name="dentalpractice_book" id="dentalpractice_book"
                        placeholder="Enter book Content" @if(!empty($displaymission_data->dentalpractice_book)) value="{{$displaymission_data->dentalpractice_book}}" @endif  />
                        <span id="dentalpractice_book_error" class="text-danger"></span>

                </div>

                <div class="mb-4 form_filed">
                    <label for="dentalpractice_book" class="form-label">Dental Practice Review</label>
                    <input type="text" class="form-control" name="dentalpractice_review" id="dentalpractice_review"
                        placeholder="Enter Review Content" @if(!empty($displaymission_data->dentalpractice_review)) value="{{$displaymission_data->dentalpractice_review}}" @endif />
                        <span id="dentalpractice_review_error" class="text-danger"></span>

                </div>

                <div class="mb-4 form_filed">
                    <label for="dentalprofessional_para_first" class="form-label">Dental Professional First Paragraph </label>
                    <input type="text" class="form-control" name="dentalprofessional_para_first" id="dentalprofessional_para_first"
                        placeholder="Enter First Paragraph of Detanal Professional" @if(!empty($displaymission_data->dentalprofessional_para_first)) value="{{$displaymission_data->dentalprofessional_para_first}}" @endif />
                        <span id="dentalprofessional_para_first_error" class="text-danger"></span>

                </div>

                <div class="mb-4 form_filed">
                    <label for="dentalprofessional_para_first" class="form-label">Dental Professional Profile </label>
                    <input type="text" class="form-control" name="dentalprofessional_profile" id="dentalprofessional_profile"
                        placeholder="Enter Profile Conent Detanal Professional"  @if(!empty($displaymission_data->dentalprofessional_profile)) value="{{$displaymission_data->dentalprofessional_profile}}" @endif />
                        <span id="dentalprofessional_profile_error" class="text-danger"></span>

                </div>

                <div class="mb-4 form_filed">
                    <label for="dentalprofessional_schedule" class="form-label">Dental Professional Schedule</label>
                    <input type="text" class="form-control" name="dentalprofessional_schedule" id="dentalprofessional_schedule"
                        placeholder="Enter Profile Conent Detanal Professional"  @if(!empty($displaymission_data->dentalprofessional_schedule)) value="{{$displaymission_data->dentalprofessional_schedule}}" @endif />
                        <span id="dentalprofessional_schedule_error" class="text-danger"></span>


                </div>

                <div class="mb-4 form_filed">
                    <label for="dentalprofessional_accept" class="form-label">Dental Professional Accept</label>
                    <input type="text" class="form-control" name="dentalprofessional_accept" id="dentalprofessional_accept"
                        placeholder="Enter Accept Conent Detanal Professional" @if(!empty($displaymission_data->dentalprofessional_accept)) value="{{$displaymission_data->dentalprofessional_accept}}" @endif />
                        <span id="dentalprofessional_accept_error" class="text-danger"></span>
                </div>

                <div class="mb-4 form_filed">
                    <label for="dentalprofessional_getpaid" class="form-label">Dental Professional Accept</label>
                    <input type="text" class="form-control" name="dentalprofessional_getpaid" id="dentalprofessional_getpaid"
                        placeholder="Enter Get Paid Conent Detanal Professional" @if(!empty($displaymission_data->dentalprofessional_getpaid)) value="{{$displaymission_data->dentalprofessional_getpaid}}" @endif />
                        <span id="dentalprofessional_getpaid_error" class="text-danger"></span>
                    </div>

                <div class="mb-4 form_filed">
                    <label for="dentalprofessional_review" class="form-label">Dental Professional Review</label>
                    <input type="text" class="form-control" name="dentalprofessional_review" id="dentalprofessional_review"
                        placeholder="Enter Review Conent Detanal Professional" @if(!empty($displaymission_data->dentalprofessional_review)) value="{{$displaymission_data->dentalprofessional_review}}" @endif />
                        <span id="dentalprofessional_review_error" class="text-danger"></span>
                </div>
                <button type="submit" class="btn btn_commn_sm mb-4">Save</button>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var max_length = 500;
    var data = $("#our_mission_contents").val();
    $("#our_mission_contents").keyup(function() {
        var len = max_length - $(this).val().length;
        // alert(len);
        if (len > 0) {
            $("#count_ourmission").removeClass('text-danger');
            $("#count_ourmission").addClass('text-grey');
            $("#count_ourmission").text('First Heading should not be of maximum 500 characters length');
        } else {
            $("#count_ourmission").removeClass('text-grey');
            $("#count_ourmission").addClass('text-danger');
            $("#count_ourmission").text('Dont exceed more than 500 characters');
        }
    });
});

// validation

function validation(){
    let dentalpractice_para_first = $("#dentalpractice_para_first").val();
   

    if(dentalpractice_para_first == ''){
        $("#dentalpractice_para_first_error").html('Dental Practice Para First Required');
        return false;
    }else{
        $("#dentalpractice_para_first_error").html('');
    }

    if(dentalpractice_para_first.length > 99){
        $("#dentalpractice_para_first_error").html('Dental Practice Para First must be only 100 characters');
    }else{
        $("#dentalpractice_para_first_error").html('Dental Practice Para First must be only 100 characters');
    }

    if(dentalpractice_search == ''){
        $("#dentalpractice_search_error").html('Dental Practice Search field Required');
        return false;
    }else{
        $("#dentalpractice_search_error").html('');
    }

    let dentalpractice_schedule = $("#dentalpractice_schedule").val();
    if(dentalpractice_schedule == ''){
        $("#dentalpractice_schedule_error").html('Dental Practice Schedule field Required');
        return false;
    }else{
        $("#dentalpractice_schedule_error").html('');
    }

    let dentalpractice_book = $("#dentalpractice_book").val();
    if(dentalpractice_book == ''){
        $("#dentalpractice_book_error").html('Dental Practice Book field Required');
        return false;
    }else{
        $("#dentalpractice_book_error").html('');
    }

    let dentalpractice_review = $("#dentalpractice_review").val();
    if(dentalpractice_review == ''){
        $("#dentalpractice_review_error").html('Dental Practice Review field Required');
        return false;
    }else{
        $("#dentalpractice_review_error").html('');
    }


    let dentalprofessional_para_first = $("#dentalprofessional_para_first").val();

    if(dentalprofessional_para_first == ''){
        $("#dentalprofessional_para_first_error").html('Dental Professional Para First field Required');
        return false;
    }else{
        $("#dentalprofessional_para_first_error").html('');
    }

    let dentalprofessional_profile = $("#dentalprofessional_profile").val();

    if(dentalprofessional_profile == ''){
        $("#dentalprofessional_profile_error").html('Dental Professional Profile field Required');
        return false;
    }else{
        $("#dentalprofessional_profile_error").html('');
    }

let dentalprofessional_schedule = $("#dentalprofessional_schedule").val();

if(dentalprofessional_schedule == ''){
    $("#dentalprofessional_schedule_error").html('Dental Professional Schedule field Required');
    return false;
}else{
    $("#dentalprofessional_schedule_error").html('');
}


let dentalprofessional_accept = $("#dentalprofessional_accept").val();

if(dentalprofessional_accept == ''){
    $("#dentalprofessional_accept_error").html('Dental Professional Accept field Required');
    return false;
}else{
    $("#dentalprofessional_accept_error").html('');
}

let dentalprofessional_getpaid = $("#dentalprofessional_getpaid").val();

if(dentalprofessional_getpaid == ''){
    $("#dentalprofessional_getpaid_error").html('Dental Professional Get Paid field Required');
    return false;
}else{
    $("#dentalprofessional_getpaid_error").html('');
}


let dentalprofessional_review = $("#dentalprofessional_review").val();

if(dentalprofessional_review == ''){
    $("#dentalprofessional_review_error").html('Dental Professional Review field Required');
    return false;
}else{
    $("#dentalprofessional_review_error").html('');
}
}
</script>

@endsection