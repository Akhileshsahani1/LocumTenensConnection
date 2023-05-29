@include('Practice.header')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<!--Main layout-->
<main class="main-body   ">
   <div class="container-fluid pe-xl-5 pe-0 ">
      <!-- main body content  -->
      <div class="heading ps-5 pe-5   pt-3 me-xxl-5 ">
         <div class="mt-5 border-bottom pb-2">
            <h3 class="p-20 fw-bold text-dark">Edit Profile Details</h3>
         </div>
      </div>
      <div class="row my-3 ps-5 pe-5 pt-3 me-xxl-5">
         <form  action="{{route('profileUpdate',$user->id)}}" method="POST" enctype="multipart/form-data">
              <div class="col-lg-4 col-12">
                <div class="d-flex mb-2">
                    <div class="avatar-upload">
                      <div class="avatar-edit">
                          <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg" />
                      
                          <label for="imageUpload"></label>
                      </div>
                      <div class="avatar-preview">
                              <div id="imagePreview" 
                                    @if(isset($user->image))
                                          style="background-image: url('{{ asset('Practiceprofile/' . $user->image) }}');"
                                    @else
                                          style="background-image: url('https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg');"
                                    @endif >
                               <!-- Add any other content you want to display inside the div here -->
                              </div>
                      </div>
                    </div>
                    <div class="ms-4 mt-5">
                      <h5 class=" m-0 p-20 fw-bold">{{$user->clinicName}}</h5>
                      <p class="m-0 p-16 opacity-50"><i class="bi bi-geo-alt-fill"></i>{{$user->city}}, {{$user->zipCode}}</p>
                    </div>
                </div>
                  @if(session()->has('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>  {{ session()->get('message') }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                
                @endif
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label fw-semibold ">First Name</label>
                     <input type="text" name="firstName" class="form-control fw-semibold" id="exampleFormControlInput1 " value="{{$user->firstName}}" maxlength="30">
                     @if ($errors->has('firstName'))
                     <span class="text-danger">{{ $errors->first('firstName') }}</span>
                     @endif
                </div>
                 <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label fw-semibold ">Email address</label>
                     <input type="email" name="email" class="form-control fw-semibold" id="exampleFormControlInput1" value="{{$user->email}}" >
                     @if ($errors->has('email'))
                     <span class="text-danger">{{ $errors->first('email') }}</span>
                     @endif
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label fw-semibold ">Phone Number</label>
                  <input type="text" name="phoneNumber" class="form-control fw-semibold" id="exampleFormControlInput1" value="{{$user->phoneNumber}}" maxlength="12">
                  @if ($errors->has('phoneNumber'))
                  <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                  @endif
                </div>
             </div>
            <div class="col-lg-4 col-12">
              <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label fw-semibold ">Bio</label>
              <textarea class="form-control fw-semibold" id="textAreaExample1" rows="3"  maxlength="2500" name="bio" value="{{ $user->bio   }}" maxlength="2500"> {{ $user->bio   }}</textarea>
              <p class='text-grey text-start'><span id="charCount_update_profile_prac1"></span></p>

              @if ($errors->has('bio'))
                  <span class="text-danger">{{ $errors->first('bio') }}</span>
                  @endif              
               </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label fw-semibold ">Practice Type</label>
                  <select name="Practice_type" class="form-select form-control" >
                  <option value="" >Select Practice Type</option>
                  @foreach($practice_type as $type)
                  <option value="{{$type->practice_Type}}" {{ $type->practice_Type == $practiceDetail->practiceType  ? 'selected' : ''}}>{{$type->practice_Type}}</option>
                  @endforeach
                  </select>
                  @if ($errors->has('Practice_type'))
                  <span class="text-danger">{{ $errors->first('Practice_type') }}</span>
                  @endif
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label fw-semibold ">Language Requirement</label>
                  <select name="language" class="form-select form-control" >
                  <option value="" >Select language</option>
                  @foreach($language as $lang)
                  <option value="{{$lang->Language}}" {{ $lang->Language == $practiceDetail->language  ? 'selected' : ''}} >{{$lang->Language}}</option>
                  @endforeach
                  </select>
                  @if ($errors->has('language'))
                  <span class="text-danger">{{ $errors->first('language') }}</span>
                  @endif
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label fw-semibold ">Preferred Work hours</label>
                  <select name="working_Hours" class="form-select form-control" >
                  <option value="" >Select Preferred Work hours</option>
                  @foreach($Working_Hour as $Hours)
                  <option value="{{$Hours->working_Hours}}" {{ $Hours->working_Hours == $practiceDetail->workingHours  ? 'selected' : ''}}>{{$Hours->working_Hours}}</option>
                  @endforeach
                  </select>
                  @if ($errors->has('working_Hours'))
                  <span class="text-danger">{{ $errors->first('working_Hours') }}</span>
                  @endif
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label fw-semibold ">Clinic Name</label>
                  <input type="text" name="clinicName" class="form-control fw-semibold" id="exampleFormControlInput1" value="{{$user->clinicName}}" maxlength="50">
                  @if ($errors->has('clinicName'))
                  <span class="text-danger">{{ $errors->first('clinicName') }}</span>
                  @endif
              </div>
              <div class="my-3">
                <button  type="submit" class=" px-5 button button-bg button-color fw-semibold">
                Save
                </button>
              </div>
            </div>
      </form>
      </div>
   </div>
</main>
<!--Main layout-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered" >
      <div class="modal-content">
         <div class="modal-body">
            <div class="text-center m-auto">
               <div>
                  <img src="./Assets/images/paymentdone.png" alt="">
               </div>
               <div>
                  <h5 class="fw-bold m-0" >Payment Done </h5>
                  <h2 class="fw-bolder" >Successfully </h2>
               </div>
            </div>
            <div class="mb-3 mt-4 text-center ">
               <button class="w-75 button button-bg button-color fw-semibold" >
               Continue
               </button>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   function readURL(input) {
   if (input.files && input.files[0]) {
   var reader = new FileReader();
   reader.onload = function(e) {
       $('#imagePreview').css('background-image', 'url('+e.target.result +')');
       $('#imagePreview').hide();
       $('#imagePreview').fadeIn(650);
   }
   reader.readAsDataURL(input.files[0]);
   }
   }
   $("#imageUpload").change(function() {
   readURL(this);
   });
</script>
<script>
$(document).ready(function() {

var max_length = 2500;
var data = $("#textAreaExample1").val();
$("#textAreaExample1").keyup(function() {
    var len = max_length - $(this).val().length;
    // alert(len);
    if (len > 0) {
        $("#charCount_update_profile_prac1").removeClass('text-danger');
        $("#charCount_update_profile_prac1").addClass('text-grey');
        $("#charCount_update_profile_prac1").text(
            'Bio field should not be of maximum 2500 characters length');
    } else {
        $("#charCount_update_profile_prac1").removeClass('text-grey');
        $("#charCount_update_profile_prac1").addClass('text-danger');
        $("#charCount_update_profile_prac1").text('Dont exceed more than 2500 characters');
    }
});
});
</script>

@include('Practice.footer')