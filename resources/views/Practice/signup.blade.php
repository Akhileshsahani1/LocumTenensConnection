<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('Css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Css/style.css')}}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    
    <title>Sign Up</title>
    <style>
      #formControlLg-error{
        color:red
      }
      #lastName-error{
        color:red
      }
      #bio-error{
        color:red
      }
      #clinicName-error{
        color:red
      }
      #email-error{
        color:red
      }
      #phoneNumber-error{
        color:red
      }
      #state-error{
        color:red
      }
      #city-error{
        color:red
      }
      #zipCode-error{
        color:red
      }

      </style>
  </head>

  <body>
    <main>
      <div class="row g-0 overflow-hidden">
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
                    <p class="light-blue-color fw-semibold font-18 mb-1">
                      Let's get you started!
                    </p>
                    <p class="yellow-color font-18 fw-bold">Step 1/3</p>
                  </div>
                  @if(session()->has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>  {{ session()->get('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                  @endif
                                  
                  <div class="">
                    <form action="{{route('signupProfessional')}}" method="POST" id="registration">
                       @csrf
                    <div class="text-input mb-3">
                      <input type="text" id="formControlLg" name="firstName" class="form-control" placeholder="Enter first name" @if(Cookie::has('firstName')) value="{{ Cookie::get('firstName') }}" @endif maxlength="20" />
                      <label class="text-input-label" for="formControlLg">First name</label>
                      <span class="input-icon"
                        ><i class="bi bi-person-fill"></i
                      ></span>
                     
                    </div>
                    <div class="text-input mb-3">
                      <input type="text" name="lastName" class="form-control" placeholder="Enter last name" @if(Cookie::has('lastName')) value="{{ Cookie::get('lastName') }}" @endif maxlength="20"/>
                      <label  id="lastName" class="text-input-label" for="lastName">Last name</label>
                      <span class="input-icon"
                        ><i class="bi bi-person-fill"></i
                      ></span>
                    
                    </div>
                 
                    <div class="text-input mb-3">
                      <input type="text"  name="clinicName" class="form-control" placeholder="Clinic" @if(Cookie::has('clinicName')) value="{{ Cookie::get('clinicName') }}" @endif maxlength="100"/>
                      <label id="clinicName" class="text-input-label" for="clinicName ">Clinic name</label>
                      <span class="input-icon"
                        ><i class="bi bi-hospital-fill"></i
                      ></span>
                     
                    </div>
                    <div class="text-input mb-3">
                      <input type="email"  name="email" class="form-control" placeholder="Enter email id" @if(Cookie::has('emails')) value="{{ Cookie::get('emails') }}" @endif />
                      <label id="email" class="text-input-label" for="email">Email Id</label>
                      <span class="input-icon"
                        ><i class="bi bi-envelope-fill"></i
                      ></span>
                    
                    </div>
                    <div class="text-input mb-3">
                      <input type="tel" name="phoneNumber" class="form-control" placeholder="Enter phone number"  @if(Cookie::has('phoneNumber')) value="{{ Cookie::get('phoneNumber') }}" @endif maxlength="12"/>
                      <label id="phoneNumber" class="text-input-label" for="phoneNumber">Phone Number</label>
                      <span class="input-icon"
                        ><i class="bi bi-telephone-fill"></i
                      ></span>
                      
                    </div>
                    <div class="text-input mb-3">
                      <input type="text"  name="state" class="form-control" placeholder="Enter State" @if(Cookie::has('state')) value="{{ Cookie::get('state') }}" @endif/>
                      <label id="state" class="text-input-label" for="state">State</label>
                      <span class="input-icon"
                        ><i class="bi bi-buildings-fill"></i
                      ></span>
                      
                    </div>
                    <div class="text-input mb-3">
                      <input type="text"  name="city" class="form-control" placeholder="Enter city"  @if(Cookie::has('city')) value="{{ Cookie::get('city') }}" @endif />
                      <label id="city" class="text-input-label" for="city">City</label>
                      <span class="input-icon"
                        ><i class="bi bi-buildings-fill"></i
                      ></span>
                      
                    </div>
                    <div class="text-input mb-3">
                      <input type="text"  name="zipCode" class="form-control" placeholder="Enter zip code" @if(Cookie::has('zipCode')) value="{{ Cookie::get('zipCode') }}" @endif />
                      <label id="zipCode" class="text-input-label" for="zipCode">Zip Code</label>
                      <span class="input-icon"
                        ><i class="bi bi-building-fill"></i
                      ></span>
                      
                    </div>
                    <div class="text-input mb-3">
                      <textarea type="text"  name="bio" id="BioText" class="form-control" maxlength="2500" rows="4" placeholder="Enter Bio" >@if(Cookie::has('bio')) {{ Cookie::get('bio') }} @endif</textarea>
                      <p class='text-gray text-start'><span id="charCount"></span></p>
                      <label id="bio" class="text-input-label" for="bio">Bio</label>
                      <span class="input-icon"
                        ><i class="bi bi-hospital-fill"></i
                      ></span>
                      
                    </div> 
                   
                   
                    <div class=" my-5">
                      <div class="mb-3">
                        <button type="submit"
                          class="w-100 button button-bg button-color fw-semibold p-16"
                        >
                          Next
                        
                        </button>
                      </div>
                  </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div  class="plus">
            <img src="{{asset('Assets/images/Icon material-add.svg')}}" alt="" />
          </div>
        </div>
        <div class="col-md-6 d-md-block  d-none ">
         
            <img
            src="{{asset('Assets/images/sign up.png')}}"
            style=" object-fit: contain; min-height:100vh"
            alt=""
            
          />
         
        </div>
      </div>
    </main>
<script>
    $(document).ready(function(){
                $.validator.addMethod("alphabetsnspace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
          });
          $.validator.addMethod("custom_number", function(value, element) {
              return this.optional(element) || value === "NA" ||
                  value.match(/^[0-9,\+-]+$/);
          }, "Please enter a valid number, or 'NA'");    

                $("#registration").validate({
                  // Specify validation rules
                  rules: {
                    firstName:{
                      required: true,
                      alphabetsnspace: true,
                      maxlength: 20,
                    },
                    lastName:{
                      required: true,
                      alphabetsnspace: true,
                      maxlength: 20
                    },
                    bio:{
                      required: true,
                      maxlength:2500
                    },
                    clinicName:{
                      required: true,
                      maxlength: 100
                    },
                    email:{
                      required: true,
                      email: true
                    },
                    phoneNumber:{
                      required:true,
                      custom_number:true,
                       minlength:10,
                       maxlength:12
                    },
                    state:{
                      required: true,
                    },
                    city:{
                      required: true,
                    },
                    zipCode:{
                      required: true,
                      custom_number:true,
                       minlength:5,
                       maxlength:5,
                    },
                  },
                  messages: {
                    firstName: {
                    required: "First Name Field is required",
                    alphabetsnspace: "Please Enter Only Letters",
                    maxlength: "Max length must be 20 character"
                  },  
                  lastName: {
                    required: "Last Name Field is required",
                    alphabetsnspace: "Please Enter Only Letters",
                  },  
                  bio:{
                    required: "Bio Field is required",
                    maxlength:"Bio Must be 1000 characters only"
                  },   
                  clinicName:{
                    required: "Clinic Name Field is required",
                    maxlength: "Clinic Name Must be 100 Characters"
                  }, 
                  email:{
                    required: "Email Field is required",
                    email: "please Enter a Valid Email"
                  },  
                  phoneNumber:{
                    required: "Phone Number Field is required",
                    custom_number: "Phone Number must be Number",
                    minlength:"Phone Number must be 10 digits",
                    maxlength:"Phone Number must be  10 digits",
                  },
                  state:{
                    required: "State Field is required",
                  },
                  city:{
                    required: "City Field is required",
                  },
                  zipCode:{
                    required: "Zip Code Field is required",
                    custom_number: "zipCode must be Number",
                    minlength:"Zip Code must be 5 digits",
                    maxlength:"Zip Code must be  5 digits",
                  },
                  },
                
                });
              });
              </script>

    



<!-- display character limit  -->

  <script>
   $(document).ready(function () {
      var max_length = 2500;
      
      var data = $('#BioText').val();
      // var current_length = max_length-data.length;

      // $('#charCount').text(current_length);
			$('#BioText').keyup(function () {
				var len = max_length - $(this).val().length;
        if(len>0){
          $('#charCount').removeClass('text-danger');
          $('#charCount').addClass('text-grey');
          $('#charCount').text('Bio should not be of maximum 2500 characters length');
        }else{
          $('#charCount').addClass('text-danger');
          $('#charCount').removeClass('text-grey');
          $('#charCount').text('Dont exceed more than 2500 characters');
        }
			
			});

		});
</script>
<script src="{{asset('Js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Js/script.js')}}"></script>
  </body>
</html>
