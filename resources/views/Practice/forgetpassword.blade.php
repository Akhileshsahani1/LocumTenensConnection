<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('Css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Css/style.css')}}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />



   <style>
        #email-error{
            color:red
        }
    </style>
    <title>Forgot Password?</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="text-start mt-5">
          <img src="{{asset('Assets/logo.svg')}}" style="width: 100px" alt="" />
        </div>
        <div class="position-relative">
          <div style="width: 600px;" class="m-auto" >
            <img src="{{asset('Assets/images/forgot password.png')}}" class="img-fluid" alt="">
          </div>
          <div class="forgot-password">
            <div class="">
              <h1 class="fw-bold mb-0 welcom-heading">Forgot <br> Password?</h1>
              <p class="light-blue-color fw-semibold font-18 my-4">
                Please, enter your email below
              </p>
            </div>
                    @if(count($errors) > 0)
                        @foreach( $errors->all() as $message )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{$message}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endforeach
                    @endif

                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>  {{ session()->get('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                  @endif
            <div class="position-relative mb-4">
                <form action="{{route('matchEmail')}}" method="POST" id="registration">
                      @csrf
                  <input
                    type="text"
                    class="form-control" name="email"
                    placeholder="Enter mail id"
                  />
                  <span class="input-icon"
                    ><i class="bi bi-envelope-fill"></i
                  ></span>
                </div>
                <div class="mb-3">
                  <button type="submit"
                    class="w-100 button button-bg button-color font-16 fw-semibold"
                  >
                  Reset Password
                  </button>
                </div>
              </form>
          </div>
        </div>
      
      </div>
      
    </main>
   
            <script>

              $(document).ready(function(){
                $("#registration").validate({
                  // Specify validation rules
                  rules: {
                    email: {
                            required: true ,
                            email: true
                        }
                  
                  },
                  messages: {
                     email: {
                        required:"Email Field is required",
                        email:"Please enter a valid email address"
                     }
                  },

                });
              });
            </script>

    <script src="{{asset('Js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('Js/script.js')}}"></script>
  </body>
</html>
