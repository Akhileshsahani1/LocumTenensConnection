@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">About Us</p>
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
            <form class="login_form" action="{{ route('submitAboutUs') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 form_filed">
                    <label for="first_paragraph" class="form-label">First Paragraph</label>
                    <textarea id="first_paragraph" class="form-control" name="first_paragraph" maxlength="200">@if(!empty($about_data_send->first_paragraph)) {{$about_data_send->first_paragraph}} @endif</textarea>
                    @if($errors->has('first_paragraph'))
                    <span class="error">{{ $errors->first('first_paragraph') }}
                    </span>
                    @endif
                    <p class='text-grey text-start'><span id="count_first_paragraph"></span></p>
                </div>
                <div class="mb-4 form_filed">
                    <label for="last_paragraph" class="form-label">Last Paragraph</label>
                    <textarea id="last_paragraph" class="form-control" name="last_paragraph" maxlength="500">@if(!empty($about_data_send->last_paragraph)) {{$about_data_send->last_paragraph}} @endif </textarea>
                    @if($errors->has('last_paragraph'))
                    <span class="error">{{ $errors->first('last_paragraph') }}
                    </span>
                    
                    @endif
                    <p class='text-grey text-start'><span id="count_last_paragraph"></span></p>
                </div>

                <div class="mb-4 form_filed">
                    <label for="logo" class="form-label">About Us Image</label>
                        <input type="file" class="form-control" id="about_us_image" name="about_us_image" />
                    <lable id="passerror" class="text-danger"><label>
                    <img class="mt-4" id="blah" src="{{asset('Admin/images/profile2.png')}}" height="100" width="100" alt="Select Your Images" />

                </div>

               
                <button type="submit" class="btn btn_commn_sm mb-4">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
   function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#about_us_image").change(function(){
    readURL(this);
});
</script>

<script>
//    $(document).ready(function () {

// // first heading left text count


//       var max_length = 200;
//       var data = $('#first_paragraph').val();
//       var lastHeading = $('#last_paragraph').val();
//       var current_length_firstHeading = 200-data.length;
//       var current_length_lastHeading = 400-lastHeading.length;

//       $('#count_first_paragraph').text(current_length_firstHeading);
// 			$('#first_paragraph').keyup(function () {
// 				var len = max_length - $(this).val().length;
// 				$('#count_first_paragraph').text(len);
// 			});

// // second heading left text count

//         $('#count_last_paragraph').text(current_length_lastHeading);
// 			$('#last_paragraph').keyup(function () {
// 				var len = 400 - $(this).val().length;
// 				$('#count_last_paragraph').text(len);
// 			});




// 		});
	</script>


<script>
$(document).ready(function() {

    var max_length1 = 200;
    var max_length2 = 500;
    var data = $("#first_paragraph").val();
    $("#first_paragraph").keyup(function() {
        var len = max_length1 - $(this).val().length;
        // alert(len);
        if (len > 0) {
            $("#count_first_paragraph").removeClass('text-danger');
            $("#count_first_paragraph").addClass('text-grey');
            $("#count_first_paragraph").text(
                'First Heading should not be of maximum 200 characters length');
        } else {
            $("#count_first_paragraph").removeClass('text-grey');
            $("#count_first_paragraph").addClass('text-danger');
            $("#count_first_paragraph").text('Dont exceed more than 200 characters');
        }
    });

    var data = $("#last_paragraph").val();
    $("#last_paragraph").keyup(function() {
        var len = max_length2 - $(this).val().length;
        // alert(len);
        if (len > 0) {
            $("#count_last_paragraph").removeClass('text-danger');
            $("#count_last_paragraph").addClass('text-grey');
            $("#count_last_paragraph").text(
                'First Heading should not be of maximum 500 characters length');
        } else {
            $("#count_last_paragraph").removeClass('text-grey');
            $("#count_last_paragraph").addClass('text-danger');
            $("#count_last_paragraph").text('Dont exceed more than 500 characters');
        }
    });

});
</script>


@endsection