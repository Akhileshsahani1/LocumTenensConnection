<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('Css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
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
        #email-error {
            color: red
        }

        #password-error {
            color: red
        }
    </style>
    <title>Welcome Back</title>
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
                                    <img src="{{ asset('Assets/logo.svg') }}" style="width: 100px" alt="" />
                                </div>
                                <div class="mb-5">
                                    <h1 class="fw-bold mb-0 welcom-heading">WELCOME BACK!</h1>
                                    <p class="light-blue-color fw-semibold font-18">
                                        Sign in to your account
                                    </p>
                                </div>
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $message)
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="">
                                    <form action="{{ route('Authentication') }}" method="POST" id="registration">
                                        @csrf
                                        <div class="position-relative mb-4">
                                            <input type="text" name="email"  @if(Cookie::has('email')) value="{{ Cookie::get('email') }}" @endif
                                                class="form-control " placeholder="Enter mail id" > 
                                                <span class="input-icon">
                                                    <i class="bi bi-envelope-fill"></i>
                                                </span> 
                                            </input>
                                           
                                        </div>
                                        <div class="position-relative mb-4">
                                            <input type="password" name="password" id="password"
                                            @if(Cookie::has('password')) value="{{ Cookie::get('password') }}" @endif class="form-control"
                                                placeholder="Enter password" />
                                            <span class="input-icon"  >
                                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                                            </span>
                                                    
                                                    
                                        </div>
                                        <div class="mb-5 d-flex align-items-center justify-content-between">
                                            <div class="">
                                                <input type="checkbox" name="remember_me" class="button-bg"
                                                    id="flexCheckDefault" @if(Cookie::has('email')) checked @endif> 
                                                   
                                                <label for="flexCheckDefault" class=" fw-semibold text-dark"> Keep me Signin </label>
                                            </div>
                                            <div>
                                                <p class="m-0  text-dark"><a href="{{ route('forgetView') }}" class=" text-dark fw-semibold">Forgot
                                                        Password?</a></p>
                                            </div>
                                        </div>
                                        <div class=" mb-5">
                                            <div class="mb-4">
                                                <button type="submit"
                                                    class="w-100 button button-bg button-color fw-semibold">
                                                    Sign In
                                                </button>
                                            </div>
                                    </form>
                                    <div class="mb-4 d-flex align-items-center justify-content-center px-2">
                                        <div class="border w-25"></div>
                                        <span class="bg-white px-1 font-14 fw-semibold color-dark">OR DON'T HAVE AN ACCOUNT</span>
                                        <div class="border w-25"></div>
                                    </div>
                                    <div class="mb-5">   
                                    <a href="{{ route('signup_view') }}" class="w-100 btn button-outline button-color fw-semibold color-dark">
                                        Sign Up
                                    </a>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="plus">
                <img src="{{ asset('Assets/images/Icon material-add.svg') }}" alt="" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-md-block  d-none">
                <img src="{{ asset('Assets/images/welcome.svg') }}" style="width:100%; object-fit:cover; min-height:100vh"
                    alt="" />
            </div>
        </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $("#registration").validate({
                // Specify validation rules
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength:8,
                       // pattern: /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/,
                    },
                },
                messages: {
                    email: {
                        required: "Email Field is required",
                        email: "invalid Email"
                    },
                    password: {
                        required: "password Field is required",
                        minlength:"Password must be Eight Characters",
                        //pattern: 'Password must be contain An1@',
                      



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
    </script>


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>


    
</body>

</html>
