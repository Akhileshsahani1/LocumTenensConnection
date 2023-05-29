@extends('layouts.main')
@section('main-section')
@push('title')
<title>Forget-Password</title>
@endpush

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-11 col-lg-offset-1 mx-auto">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="text-start my-5">
                                <img src="{{ asset('provider/img/logo.svg') }}" style="width: 100px" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <div class="row align-items-center">
                        <div class="col-sm-7">
                            <img src="{{ asset('provider/img/forgotpassword.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="col-sm-5 px-4">
                            <h3 class="fw-bold blue-text font-40">Forgot Password?</h3>
                            <p class="light-blue-color font-13 mb-5">
                                Enter the email address associated with your account.
                            </p>
                            <!-- <div class="alert alert-success">{{Session::get('success')}}</div> -->

                            @if(Session::has('error'))
                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                            @endif
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif

                            <form action="{{ route('forget.password.post') }}" method="POST">

                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Email ID</label>
                                    <div class="input-group">
                                        <input type="text" id="email_address" name="email" class="form-control"
                                            placeholder="Email">

                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <!-- <a href="ResetPassword.blade.php" class="w-100 btn btn-primary font-16 mb-3">Verify</a> -->
                                    <button type="submit" class="w-100 btn btn-primary font-16 mb-3">Verify</button>


                                    <a href="{{ route('provider.login') }}"
                                        class="text-primary font-13 text-decoration-none blue-text"><i
                                            class="bi bi-arrow-left"></i> Back to Log in</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
@endsection