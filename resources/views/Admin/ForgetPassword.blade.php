<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="{{ asset('./Admin/css/style.css') }}" rel="stylesheet"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link href="{{asset('Admin/css/custm_style.css') }}" rel="stylesheet" />
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

    <!-- validation link -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
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
                        <img src="{{ asset('./Admin/images/key.svg') }}" />
                    </div>
                    <h1>Forgot Password?</h1>
                    <p>No worries, we'll send you reset instructions.</p>
                </div>
                @if(Session::has('error'))
                <div class="alert alert-danger">{{Session::get('error')}}</div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif

                <form class="login_form" action="{{ route('forgetPassword') }}" method="post" id="forgetpassword">
                    @csrf
                 
                    <div class="mb-4 control_group">
                        <label for="exampleInputEmail1" class="form-label">Email Address</label>
                        <div class="position-relative mb-3">
                            <input type="email" class="form-control" placeholder="Enter your email" name="email"
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            <span class="add-icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn_commn w-100 mb-4">Reset Password</button>
                    <div class="back_to_login">
                        <p class="text-center"><img src="{{ asset('./Admin/images/arrow_left.svg') }}"
                                class="img-fluid me-2" /><a href="{{ route('login') }}">Back to log in</a></p>
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
    $("#forgetpassword").validate({
        // Specify validation rules
        rules: {
            email: "required",
        },
        messages: {
            email: {
                required: "Email Field is required",
            },
        },
    });
});
</script>

</html>