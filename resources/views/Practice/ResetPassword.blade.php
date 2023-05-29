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
        #password-error{
            color:red
        }
        #c_password-error{
            color:red
        }
    </style>
    <title>Reset Password?</title>
  </head>

  <body>
    <main>
      <div class="container">
        <div class="text-start mt-5">
          <img src="{{asset('Assets/logo.svg')}}" style="width: 100px" alt="" />
        </div>
        <div class="row">
          <div class="col-md-4 col-lg-5 m-auto text-center">
            <div  class="m-auto my-3" >
              <img src="{{asset('Assets/images/resetpassword.png')}}" class="img-fluid" alt="">
            </div>
            <div class="">
              <div>
                <h1 class="fw-bold mb-0 welcom-heading" style="font-size:60px">Reset Password?</h1>
                <p class="light-blue-color  fw-semibold font-18">
                  Your new password must be different to previously used passwords.
                </p>

              </div>
              <form action="{{route('PracticeresetPassword',$id)}}" method="POST" id="registration">
                @csrf
                     {{ method_field('PUT') }}
                <div class="position-relative mb-3">
                 
                  <input
                    type="password" id="password" name="password"
                    class="form-control"
                    placeholder="New password..."
                  />
                  <span class="input-icon"  >
                      <i class="bi bi-eye-slash" id="togglePassword"></i>
                  </span>
                  
                </div>
                <div class="position-relative mb-5">
                  <input
                    type="password" name="c_password" id="c_password"
                    class="form-control"
                    placeholder="Confirm new password..."
                  />

                  <input
                    type="hidden" name="tokens" value="{{$tokens}}"
                  />
                  <span class="input-icon" 
                    ><i class="bi bi-eye-slash" id="togglePassword1"></i
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
      
      </div>
     
    </main>
    <script>

              $(document).ready(function(){
                $("#registration").validate({
                  // Specify validation rules
                  rules: {
                    password: { 
                   required: true, 
                   minlength:8,
                   pattern: /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/,
          }, 
            c_password: { 
                required: true, equalTo: "#password",
                minlength:8,
                pattern: /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/,

            }, 
                  },
                  messages: {
                    password: {
                        required:"password Field is required",
                        minlength:"Password must be Eight Characters",
                        pattern: 'Password must be contain An1@',
                     },
                    c_password: { 
                            required:"password Field is required",
                            minlength:"Password must be Eight Characters",
                            pattern: 'NewPassword must be contain An1@',
                            equalTo:"Password does not match." ,

                          }
                  },

                });
              });
            </script>
      <script>
         const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");
        togglePassword.addEventListener("click", function() {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);

            const eye = togglePassword.getAttribute("class")
            if (eye == "bi bi-eye-slash") {
                togglePassword.setAttribute("class", "bi bi-eye");
            } else if (eye == "bi bi-eye") {
                togglePassword.setAttribute("class", "bi bi-eye-slash");
            } else {
                togglePassword.setAttribute("class", "bi bi-eye-slash");
            }
        });



        // const togglePassword1 = document.querySelector("#togglePassword1");
        // const password1 = document.querySelector("#c_password");
        // togglePassword1.addEventListener("click", function () {
        //     // toggle the type attribute
        //     const type = password1.getAttribute("type") === "password" ? "text" : "password";
        //     password1.setAttribute("type", type);
        // });

        const togglePassword1 = document.querySelector("#togglePassword1");
        const password1 = document.querySelector("#c_password");
        togglePassword1.addEventListener("click", function() {
            // toggle the type attribute
            const type1 = password1.getAttribute("type") === "password" ? "text" : "password";
            password1.setAttribute("type", type1);

            const eye1 = togglePassword1.getAttribute("class")
            if (eye1 == "bi bi-eye-slash") {
              togglePassword1.setAttribute("class", "bi bi-eye");
            } else if (eye1 == "bi bi-eye") {
              togglePassword1.setAttribute("class", "bi bi-eye-slash");
            } else {
              togglePassword1.setAttribute("class", "bi bi-eye-slash");
            }
        });
      </script>
    
    <script src="asset('Js/bootstrap.bundle.min.js')}}"></script>
    <script src="asset('Js/script.js')}}"></script>
  </body>
</html>
