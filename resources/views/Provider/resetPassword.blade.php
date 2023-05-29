@extends('layouts.main')
@section('main-section')
@push('title')
<title>ResetPassword</title>
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
                <img src="{{ asset('provider/img/resetpassword.png') }}" class="img-fluid" alt="">
              </div>
              <div class="col-sm-5 px-4">
                <div class="text-center">
                  <h3 class="fw-bold blue-text font-40">Reset Password?</h3>
                  <p class="light-blue-color font-13 mb-5">
                    Your new password must be different to previously used passwords.
                  </p>
                </div>
                <form action="{{ route('provider-resetPassword') }}" method="POST">
                          @csrf
                  <input type="hidden" name="id" value="{{ $user[0]['id'] }}">
                  
                   <div class="mb-3">
                    <label class="form-label font-12 blue-text">New password</label>
                    <div class="input-group">
                      <input type="password" name="password" id="password" class="form-control border-right-0" placeholder="Enter new password">
                      <span class="input-group-text bg-white"><i  id="eye" class="bi bi-eye-slash-fill" ></i></span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label class="form-label font-12 gray-text">Confirm new password</label>
                    <div class="input-group">
                      <input type="password" name="password_confirmation" id="password1"  class="form-control border-right-0" placeholder="Enter Confirm new password">
                      <span class="input-group-text bg-white gray-text"><i id="eye1" class="bi bi-eye-slash-fill" ></i></span>
                    </div>
                    @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                  </div>
                  <div class="text-center">
                    <!-- <a href="success.html" >Reset Password</a> -->
                    <button type="submit" id="resetpwd" name="" class="w-100 btn btn-primary font-16 mb-3" >Reset Password</button>
                    
                    <a href="{{ route('provider.login') }}" class="text-primary font-13 text-decoration-none blue-text"><i class="bi bi-arrow-left"></i> Back to Log in</a>
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

const togglePassword1 = document.querySelector('#eye1');
  const password1 = document.querySelector('#password1');

  togglePassword1.addEventListener('click', function (e) {
    // toggle the type attribute
    const type1 = password1.getAttribute('type') === 'password' ? 'text' : 'password';
    password1.setAttribute('type', type1);
    // toggle the eye slash icon
    this.classList.toggle('bi-eye');
}):
  
});
 

</script>