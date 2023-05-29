@extends('layouts.main')
@section('main-section')
@push('title')
<title>login</title>
@endpush
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 mx-auto">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-start my-5">
                <img src="{{asset('provider/img/logo.svg') }}" style="width: 100px" alt="">
              </div>
            </div>
          </div>
          <div class="row align-items-center h-50">
            <div class="col-lg-12">
              <div class="heading">
                <p class="mb-0 light-blue-text font-20">Welcome to</p>
                <h4 class="blue-text font-40">Provider portal</h4>
              </div>
              <form id="login_form" name="login_form" action="{{ route('provider.submit') }}" method="post">
              @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
              @endif
              @if(Session::has('fail'))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>
              @endif


                @csrf
                <div class="mb-3">
                  <label class="form-label font-12 blue-text">Email ID</label>
                  <div class="input-group">
                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email"  @if(Cookie::has('emailM')) value="{{ Cookie::get('emailM') }}" @endif>
                  <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                    </div>
                    <span class="text-dnager">@error('email'){{$message}}@enderror</span>
                </div>
                <div class="mb-3">
                  <label class="form-label font-12 blue-text">Password</label>
                  <div class="input-group">
                  <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password"  @if(Cookie::has('passwordM')) value="{{ Cookie::get('passwordM') }}" @endif>
                  <span class="input-group-text bg-white"><i  id="eye" class="bi bi-eye-slash-fill" ></i></span>
                    </div>
                 
                  <span class="text-dnager">@error('password'){{$message}}@enderror</span>
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-between">
                  <div class="form-check">
                    <label for="flexCheckDefault" class="font-13 text-secondary">Remember me</label>
                    <input type="checkbox" class="form-check-input" id="remember" name="remember" value=""  @if(Cookie::has('emailM')) checked @endif/>

                    <span class="text-dnager">@error('remember'){{$message}}@enderror</span>

                  </div>
                  <div>
                    <a href="{{ route('forget.password.get') }}" class="font-13 text-decoration-none font-weight-500">Forgot Password?</a>
                  </div>
                </div>
                <div class="mb-3 text-center">
                  <!-- <a href="ResetPassword.html" class="w-100 btn btn-primary font-16 mb-3">LOGIN</a> -->
                  <button type="submit" id="login" name="login" class="w-100 btn btn-primary font-16 mb-3" >LOGIN</button>

                  <p class="blue-text fw-bold font-13">Don't have an account? <a href="{{ route('Provider.signupStepFirst')}}" class="text-decoration-none">Sign up</a></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-7 pe-0">
          <div class="d-md-block  d-none">
            <img src="{{ asset('provider/img/loginBanner.png') }}" style="height:100vh;width:100%; object-fit: cover;" alt="" />
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>
$(document).ready(function(){

  const togglePassword = document.querySelector('#eye');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('bi-eye');
});
  
});
</script>
