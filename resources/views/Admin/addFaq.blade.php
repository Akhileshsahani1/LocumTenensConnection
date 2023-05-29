@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">Add FAQ</p>
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
            <form class="login_form" action="{{route('faqSubmit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 form_filed">
                    <label for="firstheading" class="form-label">FAQ Heading</label>
                    <input type="text" class="form-control" name="fqa_heading" id="fqa_heading"
                        placeholder="Enter Heading" maxlength="100"/>
                    @if($errors->has('fqa_heading'))
                    <span class="error">{{ $errors->first('fqa_heading') }}
                    </span>
                    @endif
                </div>
                <div class="mb-4 form_filed">
                    <label for="lastheading" class="form-label">FQA Description</label>
                    <textarea class="form-control" id="faq_description1" name="faq_description" maxlength="1000" placeholder="Enter faq description ..."></textarea>
                    @if($errors->has('faq_description'))
                    <span class="error">{{ $errors->first('faq_description') }}
                    </span>
                    @endif
                    <p class='text-grey text-start'><span id="charCount_faq"></span></p>
                </div>
                <button type="submit" class="btn btn_commn_sm mb-4">Save</button>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var max_length = 1000;
    var data = $("#faq_description1").val();
    $("#faq_description1").keyup(function() {
        var len = max_length - $(this).val().length;
        // alert(len);
        if (len > 0) {
            $("#charCount_faq").removeClass('text-danger');
            $("#charCount_faq").addClass('text-grey');
            $("#charCount_faq").text(
                'FAQ Description should not be of maximum 1000 characters length');
        } else {
            $("#charCount_faq").removeClass('text-grey');
            $("#charCount_faq").addClass('text-danger');
            $("#charCount_faq").text('Dont exceed more than 1000 characters');
        }
    });
});
</script>


@endsection