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
         <p class="mb-3">Edit Banner</p>
      </div>
   </div>
   <div class="row mx-0">
      <div class="col-lg-6 px-0">
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
         <form class="login_form" action="{{route('updateBanner', $banner_data->id)}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-4 form_filed">
               <label for="logo" class="form-label">Logo</label>
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="form-group">
                           <label for="fileField" class="attachment">
                              <div class="row btn-file">
                                 <div class="btn-file__actions">
                                    <div class="btn-file__actions__item col-xs-12 text-center">
                                       <div class="btn-file__actions__item--shadow text-dark fw-semibold">
                                          <i class="fa fa-download" aria-hidden="true"></i>
                                          <div class="visible-xs-block"></div>
                                          Upload Locum Tenens Connection Logo
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <input type="file" id="fileField" name="logo">
                           </label>
                        </div>
                     </div>
                     <div class="col-lg-4 text-center">
                        @if(!empty($banner_data->logo))
                        <img src="{{asset('Admin/home/'.$banner_data->logo)}}" class="mt-2" width="150" height="150"
                           style="border-radius:50%;background-color:black;padding:2px;">
                        @endif
                     </div>
                  </div>
               </div>
               <lable id="passerror" class="text-danger">
               <label>
            </div>
            <div class="mb-4 form_filed">
            <label for="firstheading" class="form-label">First Heading</label>
            <textarea type="text" class="form-control " name="firstHeading" id="firstHeading"
               placeholder="Enter First Heading"
               maxlength="100">{{ !empty($banner_data->firstHeading) ? $banner_data->firstHeading: NULL }}</textarea>
            <p class='text-gray text-start'><span id="count_first_heading"></span></p>
            </div>
            <div class="mb-4 form_filed">
               <label for="lastheading" class="form-label">Last Heading:</label>
               <textarea type="text" class="form-control" name="lastHeading" id="lastHeading"
                  placeholder="Enter Last Heading"
                  maxlength="100">{{!empty($banner_data->lastHeading)? $banner_data->lastHeading: NULL }}</textarea>
               <p class='text-gray text-start'><span id="count_last_heading"></span></p>
            </div>
            <button type="submit" class="btn btn_commn_sm mb-4">Update</button>
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