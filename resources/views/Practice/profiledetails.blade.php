@include('Practice.header')

<!--Main layout-->
<main class="main-body   ">
    <div class="container-fluid pe-xl-5 pe-0 ">

        <!-- main body content  -->
        <div class="heading ps-5 pe-5   pt-3 me-xxl-5 ">
            <div class="mt-5 border-bottom pb-2">
                <h3 class="p-20 fw-bold text-dark">Profile Details</h3>
            </div>
        </div>

        <div class="row my-3 ps-5 pe-5   pt-3 me-xxl-5">
            <div class="col-lg-4 col-12">
                <div>

                    <div class="d-flex mb-5 ">
                        <div class="profilePic">
                            <img src="./Assets/images/camara icon.svg" alt="" class="camaraIcon">
                            @if(isset($user->image))
                            <img src="{{asset('Practiceprofile/' . $user->image)}}" alt="" class="EditProfilePic">
                            @else
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" alt=""
                                class="EditProfilePic">
                            @endif

                        </div>
                        <div class="ms-4">
                            <h5 class=" m-0 p-16 fw-bold">{{ucwords($user->clinicName)}}</h5>
                            <p class="m-0 p-12 opacity-50"><i class="bi bi-geo-alt-fill"></i>{{ucwords($user->city)}},
                                {{$user->zipCode}}</p>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold ">First Name</label>
                        <input type="text" class="form-control fw-semibold" id="exampleFormControlInput1 "
                            value="{{$user->firstName}}" maxlength="20">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold ">Email address</label>
                        <input type="email" class="form-control fw-semibold" id="exampleFormControlInput1"
                            value="{{$user->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold ">Phone Number</label>
                        <input type="text" class="form-control fw-semibold" id="exampleFormControlInput1"
                            value="{{$user->phoneNumber}}" maxlength="12">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold ">Bio</label>
                        <textarea class="form-control fw-semibold" id="textAreaExample" rows="3" name="bio"
                            value="{{ $user->bio }}" maxlength="2500"> {{ $user->bio   }}</textarea>
                            <p class='text-grey text-start'><span id="charCount_update_profile_prac"></span></p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold ">Practice Type</label>
                        <input type="text" class="form-control fw-semibold" id="exampleFormControlInput1"
                            value="{{$user['practiceDetails']->practiceType}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold ">Language
                            Requirement</label>
                        <input type="text" name="language" class="form-control fw-semibold"
                            id="exampleFormControlInput1" value="{{$user->practiceDetails->language}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold ">Preferred Work
                            hours</label>
                        <input type="text" class="form-control fw-semibold" id="exampleFormControlInput1"
                            value="4-8 hr">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label fw-semibold ">Clinic Name</label>
                        <input type="text" class="form-control fw-semibold" id="exampleFormControlInput1"
                            value="{{$user->clinicName}}">
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('myprofileedit')}}" class=" px-5 button button-bg button-color fw-semibold">
                            Edit
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-12">

            </div>
        </div>
    </div>

</main>
<!--Main layout-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center m-auto">
                    <div>
                        <img src="./Assets/images/paymentdone.png" alt="">
                    </div>
                    <div>
                        <h5 class="fw-bold m-0">Payment Done </h5>
                        <h2 class="fw-bolder">Successfully </h2>
                    </div>
                </div>
                <div class="mb-3 mt-4 text-center ">
                    <button class="w-75 button button-bg button-color fw-semibold">
                        Continue
                    </button>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
$(document).ready(function() {

var max_length = 2500;
var data = $("#textAreaExample").val();
$("#textAreaExample").keyup(function() {
    var len = max_length - $(this).val().length;
    // alert(len);
    if (len > 0) {
        $("#charCount_update_profile_prac").removeClass('text-danger');
        $("#charCount_update_profile_prac").addClass('text-grey');
        $("#charCount_update_profile_prac").text(
            'Bio field should not be of maximum 2500 characters length');
    } else {
        $("#charCount_update_profile_prac").removeClass('text-grey');
        $("#charCount_update_profile_prac").addClass('text-danger');
        $("#charCount_update_profile_prac").text('Dont exceed more than 2500 characters');
    }
});
});
</script>
@include('Practice.footer')