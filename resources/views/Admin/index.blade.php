<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locum Tenens| Admin</title>
    <!-- <link href="{{asset('./Admin/css/style1.css') }}" rel="stylesheet"> -->
    <link href="{{asset('Admin/css/custm_style.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- validation jquery -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
</head>

<body>
    <section>
        <div class="row mx-0 ">
            <div class="col-lg-6 ps-0">
                <div class="login_bg">
                    <img src="{{asset('Admin/images/login_bg.png') }}" />
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="row">
                    <img src="{{ asset('./Admin/images/form_top.png') }}" class="img-fluid">
                </div>
                <div class="row justify-content-center align-items-center form_bg">
                    <div class="col-6 login_wrapper">
                        <div class="form_header text-center mb-3">
                            <h1>Hello, Welcome Back!</h1>
                            <p class="mb-0">Please log in to your admin account.</p>
                        </div>
                        @if(count($errors) > 0)
                        @foreach( $errors->all() as $message )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{$message}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endforeach
                        @endif
                        <form class="login_form" action="{{ route('loginAuth') }}" method="post" id="login">
                            @csrf
                            <div class="mb-4 control_group">
                                <label for="exampleInputEmail1" class="form-label lable_active">Email address</label>
                                <div class="position-relative mb-3">
                                    <input type="email" placeholder="Enter your email" class="form-control" name="email"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="add-icon">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>    
                                    <!-- <img src="{{ asset('./Admin/images/email.svg') }}" /> -->
                                </span>
                                </div>
                            </div>
                            <div class="mb-4 control_group">
                                <label for="exampleInputPassword1" class="form-label">Password </label>
                                <div class="position-relative mb-3">
                                    <input type="password" placeholder="Enter your password" class="form-control"
                                        name="password" id="exampleInputPassword1">
                                    <span class="add-icon">
                                        <i class="fas fa-eye-slash" aria-hidden="true" id="togglePassword"></i>
                                        <!--                                     
                                    <img src="{{ asset('./Admin/images/eye.svg') }}"
                                            id="togglePassword" />-->
                                        </span> 
                                </div>
                            </div>
                            <div class="reset_pass ">
                                <p class="text-end"><a href="{{route('forgetPasswordLoad')}}">Forgot Password?</a></p>
                            </div>
                            <button type="submit" ata-type="types" data-kind="success"
                                class="btn btn_commn w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script>
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#exampleInputPassword1");
togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";

    const eye = togglePassword.getAttribute("class")
    if (eye == "fas fa-eye-slash") {
        togglePassword.setAttribute("class", "fas fa-eye");
    } else if (eye == "fas fa-eye") {
        togglePassword.setAttribute("class", "fas fa-eye-slash");
    } else {
        togglePassword.setAttribute("class", "fas fa-eye-slash");
    }

    password.setAttribute("type", type);
});
</script>

<script>
$(document).ready(function() {
    $("#login").validate({
        // Specify validation rules
        rules: {
            email: "required",
            password: {
                required: true,
            }
        },
        messages: {
            email: {
                required: "Email Field is required",
            },
            password: {
                required: "Password Field is required",
            },
        },
    });
});
</script>

</html>