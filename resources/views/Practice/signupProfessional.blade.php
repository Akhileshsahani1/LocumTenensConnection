<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{asset('Css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('Css/style.css')}}" />
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  <title>Sign Up</title>
  <style>
    /* .error{
      color:red;
    } */

  #practiceType-error{
    color: red;
  }
  #positionType-error{
    color: red;
  }
  #patientVolume-error{
    color: red;
  }
  #treat-error{
    color: red;
  }
  #workingHours-error{
    color: red;
  }
  #workingHours-error{
    color: red;
  }
  #location-error{
    color: red;
  }
    </style>
</head>


<body>

  <main>
    <div class="row g-0 overflow-hidden sign-up">
      <div class="col-md-6 container position-relative">
        <div class="row">
          <div class="col-md-6 m-auto">
            <div class="mt-5 m-auto">
              <div class="text-center">
                <div class="text-start my-5">
                  <img src="{{asset('Assets/logo.svg')}}" style="width: 100px" alt="" />
                </div>
                <div>
                  <h1 class="fw-bold mb-0 welcom-heading">Sign Up</h1>
                  <p class="light-blue-color font-18 fw-semibold mb-1">
                    Let's get you started!
                  </p>
                  <p class="yellow-color font-18 fw-bold">Step 2/3</p>
                </div>
                
                <div class="">
                   @if(Cookie::has('message1'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Cookie::get('message1')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                         
                      
                  @endif
                  <form action="{{route('ProfessionalSubmit')}}" method="POST" id="registration">
                    @csrf
                  <div class="text-input mb-4">
                    <label class="text-input-label" for="formControl">Practice Type</label>
                      <select name="practiceType" class="form-select form-control" aria-label="Default select example">
                        <option value="" class="text-fade">Select Practice Type</option>
                        @foreach($practice_type as $pract_type)
                        <option value="{{ $pract_type->practice_Type }}" @if(Cookie::has('practiceType')) {{ Cookie::get('practiceType') == $pract_type->practice_Type ? 'selected' : ''  }} @endif>{{$pract_type->practice_Type}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="text-input mb-4">
                    <label class="text-input-label" for="formControl">position type</label>
                      <select name="positionType" class="form-select form-control" aria-label="Default select example">
                        <option value="" class="text-fade">Select position type</option>
                        @foreach($Position_Type as $positi_Type)
                        <option value="{{$positi_Type->position_Type}}" @if(Cookie::has('positionType')) {{ Cookie::get('positionType') == $positi_Type->position_Type ? 'selected' : ''  }} @endif>{{$positi_Type->position_Type}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="text-input mb-4">
                    <label class="text-input-label" for="formControl">Expected Daily Patient Volume</label>
                      <select name="patientVolume" class="form-select form-control" aria-label="Default select example">
                        <option value="" class="text-fade">Select expected daily Patient volume</option>
                        @foreach($Patient_Volume as $Pati_Volume)
                        <option value="{{$Pati_Volume->patient_volume}}" @if(Cookie::has('patientVolume')) {{ Cookie::get('patientVolume') == $Pati_Volume->patient_volume ? 'selected' : ''  }} @endif>{{$Pati_Volume->patient_volume}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="text-input mb-4">
                    <label class="text-input-label" for="formControl">Do you treat children?</label>
                      <select name="treat" class="form-select form-control" aria-label="Default select example">
                        <option value="" class="text-fade">Select Do you treat children?</option>
                        <option value="Yes" @if(Cookie::has('treat')) {{ Cookie::get('treat') == 'Yes' ? 'selected' : ''  }} @endif>Yes</option>
                        <option value="No" @if(Cookie::has('treat')) {{ Cookie::get('treat') == 'No' ? 'selected' : ''  }} @endif>No</option>
                      </select>
                  </div>
                  <div class="text-input mb-4">
                    <label class="text-input-label" for="formControl">Expected daily working hours</label>
                      <select name="workingHours" class="form-select form-control" aria-label="Default select example">
                        <option value="" class="text-fade">Select expected daily working hours</option>
                        @foreach($Working_Hour as $Worki_Hour)
                        <option value="{{$Worki_Hour->working_Hours}}" @if(Cookie::has('workingHours')) {{ Cookie::get('workingHours') == $Worki_Hour->working_Hours ? 'selected' : ''  }} @endif>{{$Worki_Hour->working_Hours}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="text-input mb-4">
                    <label class="text-input-label" for="formControl">Location of the Delivery System</label>
                      <select name="location" class="form-select form-control" aria-label="Default select example">
                        <option value="" class="text-fade">Select location of the delivery system</option>
                        @foreach($Practice_Location as $Prac_location)
                        <option value="{{$Prac_location->Location}}"  @if(Cookie::has('location')) {{ Cookie::get('location') == $Prac_location->Location ? 'selected' : ''  }} @endif>{{$Prac_location->Location}}</option>
                        @endforeach
                      </select>
                  </div>
                 
                    <div class=" my-5">
                      <div class="mb-4 d-flex justify-content-between">
                        
                        <button type="submit" class="w-100 button-outline button-color fw-bold p-16" style="margin-right:20px">
                        <a href="{{ route('signup_view') }}">
                        Previous
                         </a>
                        </button>
                        <button type="submit" class="w-100 button button-bg button-color fw-semibold p-16" style="margin-left:20px">
                          Next
                        </button>
                      </div>

                  </div>
                 </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="plus">
          <img src="{{asset('Assets/images/Icon material-add.svg')}}" alt="" />
        </div>
      </div>
      <div class="col-md-6 ">
        <div class="d-md-block  d-none">
          <img src="{{asset('Assets/images/sign up.png')}}" style=" object-fit: fill;  min-height:100vh" alt="" />
        </div>
      </div>
    </div>
  </main>

  <!-- ******************************************validation ********************************************************************************************************* -->
              <script>

              $(document).ready(function(){
                $("#registration").validate({
                  // Specify validation rules
                  rules: {
                    practiceType: "required",
                        
                    positionType: {
                      required: true,
                    },
                    patientVolume: {
                      required: true,
                    },
                    treat: {
                      required: true,
                    },
                    workingHours: {
                      required: true,
                    },
                    location: {
                      required: true,
                    }
                  },
                  messages: {
                    practiceType: {
                    required: "practiceType Field is required",
                  },      
                  positionType: {
                    required: "positionType Field is required",
                  },     
                  patientVolume: {
                    required: "patientVolume Field is required",
                  },     
                  treat: {
                    required: "treat Field is required",
                  
                  },
                  workingHours: {
                    required: "workingHours Field is required",
                  
                  },
                  location: {
                    required: "workingHours Field is required",
                  
                  },
                  },
                
                });
              });
              </script>

  <script src="{{asset('Js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Js/script.js')}}"></script>

 
</body>

</html>