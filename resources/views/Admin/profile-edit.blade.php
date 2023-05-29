@extends('Admin.layouts.master')
@section('content')
<div class="container">
    <div class="row mb-4 mx-0 pt-5">
        <div class="col-lg-12">
            <p class="top_heading mb-0">Edit Your Profile</p>
        </div>
    </div>
    <div class="py-4 mx-0 admin_profile_card custm_scroll">
        <div class="row">
            <div class="col-lg-12 title">
                <p>Admin Details</p>
            </div>

        </div>

        <div class="row mx-0">
            <div class="col-lg-9 px-0">
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
                <form class="login_form" action="{{ route('UpdateProfileAdmin') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- <input type="file" name="uploadPhoto"> -->
                    <div class="row justify-content-between">
                        <div class="col-5"> 
                            <div class="mb-4 form_filed control-group">
                                <label for="exampleInputPassword1" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName"
                                    value="{{$admin_data->firstName}}" id="exampleInputPassword1" placeholder="Sarah">
                                <!-- <img class="" src="./images/user.svg" /> -->
                                <i class="input_icon fas fa-user" aria-hidden="true"></i>
                                @if($errors->has('firstName'))
                                <div class="error">{{ $errors->first('firstName') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-4 form_filed form_filled_active control-group">
                                <label for="exampleInputPassword1" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName"
                                    value="{{$admin_data->lastName}}" id="exampleInputPassword1" placeholder="Joe">
                                <!-- <img class="input_icon gray_icon" src="./images/user.svg" />
                                <img class="input_icon active_icon" src="./images/active_user.svg" /> -->
                                <i class="input_icon fas fa-user" aria-hidden="true"></i>
                                @if($errors->has('lastName'))
                                <div class="error">{{ $errors->first('lastName') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="mb-4 form_filed control-group" >
                                <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phoneNumber"
                                    value="{{$admin_data->phoneNumber}}" id="exampleInputPassword1"
                                    placeholder="9987787786">
                                <!-- <img class="input_icon gray_icon" src="./images/mobile.svg" />
                                <img class="input_icon active_icon" src="./images/active_mobile.svg" /> -->
                                <!-- <i class="input_icon fas fa-mobile" aria-hidden="true"></i> -->
                                <i class="input_icon fas fa-mobile-alt"></i>
                                @if($errors->has('phoneNumber'))
                                <div class="error">{{ $errors->first('phoneNumber') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row avatar-upload">
                        <div class="col-5">
                            <div class="mb-4 form_filed">
                                <label for="exampleInputPassword1" class="form-label">Upload Photo</label>
                                <div class="upload-btn-wrapper">
                                    <div
                                        class=" upload-file font-weight-500 d-flex align-items-center justify-content-center flex-column">

                                        <div class="upload-btn">
                                            <img src="{{asset('./Admin/images/cloud_attachmnet.svg') }}" />
                                        
                                            <input type="file" name="uploadPhoto" id="profilepic">

                                        </div>

                                        <div class="upload__img-wrap"></div>
                                        <div class="upload-select-button" id="blankFile">
                                            <p class="mb-0 text-center">Click to upload or drag and drop</p>
                                            <p class="mb-0 text-center">(1MB File Max)</p>

                                        </div>
                                        @if($errors->has('uploadPhoto'))
                                        <div class="error">{{ $errors->first('uploadPhoto') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="avatar-preview">
                                <div id="profileimg"
                                    style="background-image:url('{{ asset('../../Admin/uploadprofile/'.$admin_data->uploadPhoto) }}') !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row avatar-upload2">
                        <div class="col-5">
                            <div class="mb-4 form_filed">
                                <label for="exampleInputPassword1" class="form-label">Upload Background Photo</label>
                                <div class="upload-btn-wrapper">
                                    <div
                                        class=" upload-file font-weight-500 d-flex align-items-center justify-content-center flex-column">
                                        <div class="upload-btn">
                                            <img src="{{asset('./Admin/images/cloud_attachmnet.svg') }}" />
                                            <input type="file" name="uploadBackgroundPhoto" id="uploadbgphoto">
                                        </div>
                                        <div class="upload-select-button" id="blankFile">
                                            <p class="mb-0 text-center">Click to upload or drag and drop</p>
                                            <p class="mb-0 text-center">(1MB File Max)</p>

                                        </div>
                                        @if($errors->has('uploadBackgroundPhoto'))
                                        <div class="error">{{ $errors->first('uploadBackgroundPhoto') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="avatar-preview2">
                                <div id="imagePreview2"
                                    style="background-image:url('{{ asset('../../Admin/uploadprofile/'.$admin_data->uploadBackgroundPhoto) }}') !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn_commn_gray_sm me-3">CANCEL</button>
                    <button type="submit" class="btn btn_commn_sm ">Save</button>
                </form>

            </div>

        </div>
    </div>

</div>
<script>
// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader1 = new FileReader();
//         reader1.onload = function(e) {
//             $('#profileimg').css('background-image', 'url(' + e.target.result + ')');
//             $('#profileimg').hide();
//             $('#profileimg').fadeIn(650);
//         }
//         reader1.readAsDataURL(input.files[0]);
//     }
// }
// $("#profilepic").change(function() {
//     readURL(this);
// });



$(function() {
    $("#profilepic").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; 
        
        var type_reg = /^image\/(jpg|png|jpeg)$/;
        
        // no file selected, or no FileReader support
        if (type_reg.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function(){ // set image data as background of div
                $("#profileimg").css("background-image", "url("+this.result+")");
            }
        }
    });
});


$(function() {
    $("#uploadbgphoto").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; 
        
        var type_reg = /^image\/(jpg|png|jpeg)$/;
        
        // no file selected, or no FileReader support
        if (type_reg.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview2").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>
@endsection