@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">Add Testimonial</p>
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
            <form class="login_form" action="{{ route('submitTestimonial') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <!-- <div class="mb-4 form_filed">
                    <label for="testimonial_heading" class="form-label">Testimonial Heading</label>
                    <input type="text" class="form-control" name="testimonial_heading" />
                    @if($errors->has('admin_message'))
                    <span class="error">{{ $errors->first('admin_message') }}
                    </span>
                    @endif
                </div> -->
                <div class="mb-4 form_filed">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" maxlength='20'/>
                    @if($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}
                    </span>
                    @endif
                </div>

                <div class="mb-4 form_filed">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" class="form-control" name="designation" placeholder="Enter Designation" maxlength='50'/>
                    @if($errors->has('designation'))
                    <span class="error">{{ $errors->first('designation') }}
                    </span>
                    @endif
                </div>

                <div class="mb-4 form_filed">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description Here" maxlength="300"> </textarea>
                    @if($errors->has('description'))
                    <span class="error">{{ $errors->first('description') }}
                    </span>
                    @endif
                    <p class='text-grey text-start'><span id="charCount_testimonial"></span></p>

                </div>


                <div class="mb-4 form_filed">
                    <label for="logo" class="form-label">Image Testimonial</label>
                    <input type="file" class="form-control" id="testimonial_image" name="testimonial_image" />
                    @if($errors->has('testimonial_image'))
                    <span class="error">{{ $errors->first('testimonial_image') }}
                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn_commn_sm mb-4">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var max_length = 300;
    var data = $("#description").val();
    $("#description").keyup(function() {
        var len = max_length - $(this).val().length;
        // alert(len);
        if (len > 0) {
            $("#charCount_testimonial").removeClass('text-danger');
            $("#charCount_testimonial").addClass('text-grey');
            $("#charCount_testimonial").text(
                'Description should not be of maximum 300 characters length');
        } else {
            $("#charCount_testimonial").removeClass('text-grey');
            $("#charCount_testimonial").addClass('text-danger');
            $("#charCount_testimonial").text('Dont exceed more than 300 characters');
        }
    });
});
</script>

@endsection