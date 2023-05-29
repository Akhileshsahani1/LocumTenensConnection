@extends('Admin.layouts.master')
@section('content')
<style>
   .btn-file {
   margin: 0;
   padding: 0;
   position: relative;
   z-index: 1;
   }
   .btn-file__actions {
   margin: 0;
   padding: 0;
   }
   .btn-file__actions__item {
   padding: 35px;
   font-size: 1.5em;
   color: #d3e0e9;
   cursor: pointer;
   text-decoration: none;
   border-top: 2px dashed #a8d1fd;
   border-left: 2px dashed #a8d1fd;
   border-bottom: 2px dashed #a8d1fd;
   }
   .btn-file__actions__item:first-child {
   border-top-left-radius: 15px;
   border-bottom-left-radius: 15px;
   }
   .btn-file__actions__item:last-child {
   border-top-right-radius: 15px;
   border-bottom-right-radius: 15px;
   border-right: 2px dashed #a8d1fd;
   }
   .btn-file__actions__item:hover,
   .btn-file__actions__item:focus {
   color: #636b6f;
   background-color: rgba(211, 224, 233, 0.1);
   }
   .btn-file__actions__item:hover--shadow,
   .btn-file__actions__item:focus--shadow {
   box-shadow: #d3e0e9 0 0 60px 15px;
   }
   .btn-file__actions__item--shadow {
   display: inline-block;
   position: relative;
   z-index: 1;
   }
   .btn-file__actions__item--shadow::before {
   content: " ";
   box-shadow: #fff 0 0 60px 40px;
   display: inline-block;
   position: absolute;
   top: 50%;
   left: 0;
   width: 100%;
   z-index: -1;
   }
   .btn-file__preview {
   opacity: 0.5;
   top: 0;
   left: 0;
   bottom: 0;
   right: 0;
   position: absolute;
   z-index: -1;
   border-radius: 35px;
   background-size: cover;
   background-position: center;
   }
   .form-group label.attachment {
   width: 100%;
   }
   .form-group label.attachment .btn-create > a,
   .form-group label.attachment .btn-create > div {
   margin-top: 5px;
   }
   .form-group label.attachment input[type='file'] {
   display: none;
   }
</style>
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">About Us</p>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-lg-8 px-0">
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
            <form class="login_form" action="{{ route('updateAboutUs', $about_data_send->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 form_filed">
                <label for="logo" class="form-label">About Us Image</label>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="form-group">
                           <label for="about_us_image" class="attachment">
                              <div class="row btn-file">
                                 <div class="btn-file__actions">
                                    <div class="btn-file__actions__item col-xs-12 text-center">
                                       <div class="btn-file__actions__item--shadow text-dark fw-semibold">
                                          <i class="fa fa-download" aria-hidden="true"></i>
                                          <div class="visible-xs-block"></div>
                                          Upload About Us Image
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <input type="file" id="about_us_image" name="about_us_image">
                           </label>
                        </div>
                     </div>
                     <div class="col-lg-4 text-center">
                     <img id="blah" src="{{asset('Admin/home/'.$about_data_send->about_us_image)}}" height="150" width="150" alt="Select Your Images" />
                     </div>
                  </div>
               </div>
               <lable id="passerror" class="text-danger"><label>
            </div>

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
                    <textarea id="last_paragraph" rows="3" class="form-control" name="last_paragraph" maxlength="500">@if(!empty($about_data_send->last_paragraph)) {{$about_data_send->last_paragraph}} @endif </textarea>
                    @if($errors->has('last_paragraph'))
                    <span class="error">{{ $errors->first('last_paragraph') }}</span>
                    @endif
                    <p class='text-grey text-start'><span id="count_last_paragraph"></span></p>
                </div>
                <button type="submit" class="btn btn_commn_sm mb-4">Update</button>
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