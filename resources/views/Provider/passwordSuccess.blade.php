@extends('layouts.main')
@section('main-section')
@push('title')
<title>passwordSuccess</title>
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
        <div class="row align-items-center justify-content-center py-4">
          <div class="col-lg-5 m-auto text-center">
            <div  class="m-auto my-3" >
              <img src="{{ asset('provider/img/success.png') }}" class="img-fluid" alt="">
            </div>
            <div class="mt-5">
              <div class="mb-3">
                <h4 class="fw-bold blue-text">Password Changed Successfully</h4>
                <p class="font-13 blue-text mb-0">Your password has been successfully reset.</p>
                <p class="font-13 blue-text mb-0">Click below to log in magically.</p>
              </div>
              <div class="mt-5">
              
                <a href="{{route('provider.login')}}" class="w-100 font-16 btn btn-primary">Continue</a>
                    
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    @endsection
    
