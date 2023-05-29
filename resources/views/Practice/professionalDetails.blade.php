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

 <style>
  /* .error{
    color: red;
  } */
  #language-error{
    color: red;
  }
  #amount-error{
    color: red;
  }
  #procedureType-error{
    color: red;
  }
  #qualities-error{
    color: red;
  }
 
  </style>
  <title>Sign Up</title>

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
                  <p class="light-blue-color fw-semobild font-18 mb-1">
                    Let's get you started!
                  </p>
                  <p class="yellow-color font-18 fw-bold">Step 3/3</p>
                </div>
                @if(Cookie::has('message2'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Cookie::get('message2')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                         
                      
                  @endif
                <div class="">
                   <form action="{{route('ProfessionalDetailSubmit')}}" method="POST" id="registration">
                    @csrf
                  <div class="text-input mb-3">
                    <label class="text-input-label" for=" ">Language</label>
                      <select name="language" class="form-select form-control">
                        <option value="" class="text-fade">Select Language</option>
                        @foreach($language as $lang)
                        <option value="{{$lang->Language}}" class="color-dark">{{$lang->Language}}</option>
                        @endforeach
                      </select>
                   </div>
                  <div class="text-input mb-3">
                    <input type="text"  name="amount"  class="form-control" placeholder="Enter Anticipated Average Daily Amount" />
                    <label class="text-input-label" for="">Anticipated Average Daily Amount</label>
                    
                  </div>
                  
                  <div class="text-input mb-3">
                    <label class="text-input-label" for=" ">Expected Cases/ Procedure types?</label>
                     <select name="procedureType" class="form-select form-control" >
                        <option value="" >Select expected cases/ procedure types?</option>
                        @foreach($procedure_type as $proc_type)
                        <option value="{{$proc_type->procedure__Type}}" class="color-dark">{{$proc_type->procedure__Type}}</option>
                        @endforeach
                      </select>
                   </div>
                  <div class="text-input mb-3">
                    <input type="text"  name="qualities" class="form-control" placeholder="Enter Expected qualities in a Locum Tenen" />
                    <label class="text-input-label" for=" ">Expected qualities in a Locum Tenen</label>
                   
                  </div>
                
                 

                  <div class=" my-5">
                  <div class="mb-4 d-flex justify-content-between">
                        
                        <a href="{{ route('signupProfessionalprevious') }}" type="submit" class="w-100 button-outline button-color fw-bold p-16" style="margin-right:20px">
                        Previous
                       </a>
                        <button type="submit" class="w-100 button button-bg button-color fw-semibold p-16" style="margin-left:20px">
                          Next
                        </button>
                      </div>

                  </div>
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
        <div class="d-md-block  d-none" >
          <img src="{{asset('Assets/images/sign up.png')}}" style="height:100vh; object-fit: cover;" alt="" />
        </div>
      </div>
    </div>
  </main>
 
            <script>

              $(document).ready(function(){
                $.validator.addMethod("alphabetsnspace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
          });

                $("#registration").validate({
                  // Specify validation rules
                  rules: {
                    language: "required",
                    amount: {
                      required: true,
                      digits: true,
                    },      
                    procedureType: {
                      required: true,
                    },
                    qualities: {
                      required: true,
                      alphabetsnspace: true,
                      maxlength:100
                    }
                  },
                  messages: {
                    language: {
                    required: "Language Field is required",
                  },      
                  amount: {
                    required: "Amount Field is required",
                    digits:"Amount must must be degits"
                  },     
                  procedureType: {
                    required: "ProcedureType Field is required",
                  },     
                  qualities: {
                    required: "Qualities Field is required",
                    alphabetsnspace: "Please Enter Only Letters",
                    maxlength:"Please enter max 100 character"
                  },
                  },
                
                });
              });
              </script>

  <script src="{{asset('Js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/script.js')}}"></script>

</body>

</html>