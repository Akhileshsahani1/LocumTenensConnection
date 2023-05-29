@include('Practice.header')
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
        #newpassword-error{
          color:red
        }
        #cnew_password-error{
          color:red
        }
    </style>
    <main>
    <div class="container-fluid pe-xl-5 pe-0 ">

<!-- main body content  -->
<div class="heading ps-5 pe-5  mt-5 pt-3 me-xxl-5 ">
    <div class="mt-5 border-bottom pb-2">
        <h3 class="p-20 fw-bold text-dark">Change Password</h3>
    </div>
</div>
               
<div class="row my-3 ps-5 pe-5   pt-3 me-xxl-5">
    <div class="col-lg-4 col-12">
            @if(count($errors) > 0)
                        @foreach( $errors->all() as $message )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{$message}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                             @endforeach
                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>  {{ session()->get('message') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                  @endif
    <form action="{{route('PracticePasswordUpdate')}}" method="POST" id="registration">
      @csrf
        <div>
       
            <div class="mb-3">
           
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-semibold ">Old Password</label>
                <div class="position-relative mb-3">
                <input
                  type="password"
                  class="form-control"
                  placeholder="Old password..." name="password" id="password"
                />
                <span class="input-icon"> 
                  <i class="bi bi-eye-slash" id="togglePassword"></i>
                  </span>
              </div>
              </div>
              
              
              
            </div>

            <div class="mb-3">
                <label for=" " class="form-label fw-semibold ">New Password</label>
                <div class="position-relative mb-3">
                <input
                  type="password"
                  name="new_password" id="newpassword"
                  class="form-control"
                  placeholder="New password..." 
                />
                <span class="input-icon"> 
                  <i class="bi bi-eye-slash" id="togglePassword1"></i>
                  </span>
              </div>
              </div>
              
              
              
            </div>

            <div class="mb-3">
                <label for=" " class="form-label fw-semibold ">Confirm New Password</label>
                <div class="position-relative mb-3">
                <input
                  type="password" name="cnew_password" 
                  class="form-control" id="cnew_password"
                  placeholder="Confirm New password..."
                />
                <span class="input-icon"> 
                  <i class="bi bi-eye-slash" id="togglePassword2"></i>
                  </span>
              </div>
              </div>
              
              
              
            </div>
            <div class="my-3">
                <button type="submit" class=" px-5 button button-bg button-color fw-semibold">
                   Save
              </button>
                </div>
        </div>
      </form>
    </div>
    <div class="col-lg-4 col-12">
      
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
            
            }, 
          new_password: { 
              required: true,
              minlength:8,
             

             },
             cnew_password: { 
              required: true, equalTo: "#newpassword",
              minlength:8,
           

             }
         },
     messages: {
          password: {
              required:"password Field is required",
              minlength:"Password must be Eight Characters",
            
          },
        new_password: { 
                required:"New password Field is required",
                minlength:"New Password must be Eight Characters",
               
            
               },
               cnew_password: { 
                required:"Confirm New password Field is required",
                minlength:"Confirm New Password must be Eight Characters",
                pattern: 'Confirm New Password must be contain An1@',
                equalTo:"New Password does not match." ,
            
               },
     
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
        const password1 = document.querySelector("#newpassword");
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
    
        
      
        const togglePassword2 = document.querySelector("#togglePassword2");
        const password2 = document.querySelector("#cnew_password");
        togglePassword2.addEventListener("click", function() {
            // toggle the type attribute
            const type2 = password2.getAttribute("type") === "password" ? "text" : "password";
            password2.setAttribute("type", type2);

            const eye2 = togglePassword2.getAttribute("class")
            if (eye2 == "bi bi-eye-slash") {
              togglePassword2.setAttribute("class", "bi bi-eye");
            } else if (eye2 == "bi bi-eye") {
              togglePassword2.setAttribute("class", "bi bi-eye-slash");
            } else {
              togglePassword2.setAttribute("class", "bi bi-eye-slash");
            }
        });

      </script>

     
    @include('Practice.footer')

  