<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('./Admin/css/custm_style.css') }}" rel="stylesheet">
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
                <div class="form_header text-center mb-5">
                    <div class="form_key_logo mx-auto mb-4">
                        <img src="{{ asset('./Admin/images/right.svg') }}" />
                    </div>
                    <h1>Password Reset</h1>
                    <p>Your password has been successfully reset.<br> Click below to log in magically.</p>
                </div>
                <form class="login_form">
                    <a href="{{route('login')}}"><button type="submit" class="btn btn_commn w-100 mb-4">Continue</button></a>
                    <div class="back_to_login">
                        <p class="text-center"><img src="{{ asset('./Admin/images/arrow_left.svg') }}"
                                class="img-fluid me-2" /><a href="{{route('login')}}">Back to log in</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>