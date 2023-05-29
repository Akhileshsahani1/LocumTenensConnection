<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set new Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{ asset('./Admin/css/custm_style.css') }}" rel="stylesheet">
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>

    <style>

    </style>
</head>
<body>
    <section>
        <div class="row header mx-0 justify-content-center">
            <div class="col-10 py-3">
                <div class="brand_logo">
                    <img src="{{ asset('./Admin/images/logo.svg') }}" />
                </div>
            </div>
        </div>
        <div class="row mx-0 justify-content-center align-items-center forgetPass_wrapper">
            <div class="col-lg-3">
                <div class="form_header text-center">
                    <div class="form_key_logo mx-auto mb-4">
                        <img src="{{ asset('./Admin/images/lock.svg') }}" />
                    </div>
                    <h1>Set New password</h1>
                    <p>Your new password must be different to previously used passwords.</p>
                    <p id="cpasserrormismathch" class="text-danger"></p>
                </div>
                @if(count($errors) > 0)
                @foreach( $errors->all() as $message )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$message}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
                @endif
                <form class="login_form" action="{{route('resetPassword') }}" method="post"
                    onsubmit="return validate()" id="forgetnewpassword">
                    @csrf
                   
                   
                    <div class="mb-4 control_group">
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <div class="position-relative mb-0">
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <input type="password" class="form-control" name="password" id="newpassword" placeholder="Enter Your Password">
                                <p id="newpasserror" class="text-end email_small_text"></p>
                                <span class="add-icon">
                                            <i class="fas fa-eye-slash" aria-hidden="true" id="togglePassword"></i>
                                        
                                </span> 
                        </div>
                        
                    </div>


                   

                    <div class="mb-4 control_group">
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <div class="position-relative mb-3">
                       
                            <input type="password" class="form-control" name="cpassword" id="cnewpassword"
                                placeholder="Enter Your Confirm Password">
                            <p id="cnewpasserror" class="text-end email_small_text"></p>

                                <span class="add-icon">
                                    <i class="fas fa-eye-slash" aria-hidden="true" id="togglePassword1"></i>
                                 
                                </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn_commn w-100 mb-4">Reset
                        Password</button>
                    <div class="back_to_login">
                        <p class="text-center"><img src="{{ asset('./Admin/images/arrow_left.svg') }}"
                                class="img-fluid me-2" /><a href="{{ route('login')}}">Back to log in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


<script>
$(document).ready(function() {
    $("#forgetnewpassword").validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
                maxlength: 25,
                pattern: /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z0-9\d@$#!%*?&]{8,25}$/,
            },
            cpassword: {
                required: true,
                minlength: 8,
                maxlength: 25,
                equalTo: "#newpassword",
                pattern: /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z0-9\d@$#!%*?&]{8,25}$/,
            }
        },
        messages: {
            password: {
                required: "Password Field is required",
                minlength: "Password must be eight character.",
                maxlength: "Password must be max 25 character.",
                pattern: "Password must be contain as Ka1@1234",
            },
            cpassword: {
                required: "Confirm Password Field is required",
                minlength: "Confirm Password must be eight character.",
                maxlength: "Confirm Password must be 25 character.",
                equalTo: "Confirm Password does not match from New Password.",
                pattern: "Confirm Password must be contain as Ka1@1234",
            },
        },

    });
});
</script>

<script>
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#newpassword");
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
const togglePassword1 = document.querySelector("#togglePassword1");
const password1 = document.querySelector("#cnewpassword");
togglePassword1.addEventListener("click", function() {
    // toggle the type attribute
    const type = password1.getAttribute("type") === "password" ? "text" : "password";
    const eye = togglePassword1.getAttribute("class")
    if (eye == "fas fa-eye-slash") {
        togglePassword1.setAttribute("class", "fas fa-eye");
    } else if (eye == "fas fa-eye") {
        togglePassword1.setAttribute("class", "fas fa-eye-slash");
    } else {
        togglePassword1.setAttribute("class", "fas fa-eye-slash");
    }
    password1.setAttribute("type", type);
});
</script>



<script>
// function validate() {
//     var newpassword = $('#newpassword').val();
//     var cnewpassword = $('#cnewpassword').val();

//     var pattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z0-9\d@$#!%*?&]{8,8}$/;

//     if (newpassword == '') {
//         $('#newpasserror').html('New Password field is required');
//         return false;
//     } else {
//         $('#newpasserror').html('');
//     }

//     if (newpassword.length < 8) {
//         $('#newpasserror').html('Password length must be less than 8 digits');
//         return false;
//     } else {
//         $('#newpasserror').html('');
//     }

//     if (!pattern.test(newpassword)) {
//         $('#newpasserror').html('New Password must be contain as Ka1@1234');
//         return false;
//     }

//     if (cnewpassword == '') {
//         $('#cnewpasserror').html('Confirm Password field is required');
//         return false;
//     } else {
//         $('#cnewpasserror').html('');
//     }
//     if (cnewpassword.length < 8) {
//         $('#cnewpasserror').html('Password length must be less than 8 digits');
//         return false;
//     } else {
//         $('#cnewpasserror').html('');
//     }

//     if (!pattern.test(cnewpassword)) {
//         $('#cnewpasserror').html('Confirm New Password must be contain as aK1@1234');
//         return false;
//     } else {
//         $('#cnewpasserror').html('');
//     }

//     if (newpassword != cnewpassword) {

//         $('#cnewpasserror').html('Password and confrim Password Does Not Match');
//         return false;
//     }
// }
</script>

</body>
</html>