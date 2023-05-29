@extends('layouts.main') 
@section('main-section')
@push('title') 
<title>register</title>
@endpush
<body>
   <main>
      <div class="container-fluid">
         <div class="row">
            <div class="col-lg-3 mx-auto">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="text-start my-5">
                        <img src="{{ asset('provider/img/logo.svg') }}" style="width: 100px" alt="">
                     </div>
                  </div>
               </div>
               <div class="row align-items-center h-50">
                  <div class="col-lg-12">
                     <div class="heading">
                        <div class="text-end mb-3">
                           <span class="text-green">Step 1/5</span>
                        </div>
                        <h4 class="mb-0 blue-text font-30">Welcome to Provider Portal</h4>
                        <p class="light-blue-text font-18">Professional details</p>
                     </div>
                     <form action="{{route('provider.createsubmit')}}" class="msform" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <fieldset id="account_information">
                        @if(session()->has('message'))
                               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                               <strong>  {{ session()->get('message') }}</strong>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                               </div>
                         @endif
                           <div class="mb-2">
                              <label class="form-label font-12  ">First Name</label>
                              <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter first name"  @if(Cookie::has('firstName')) value="{{ Cookie::get('firstName') }}" @endif >
                              <p  class="text-danger" id="firstName_error"></p>
                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12">Last Name</label>
                              <input type="text" name="lastName" id="lastName"  class="form-control" placeholder="Enter last name" @if(Cookie::has('lastName')) value="{{ Cookie::get('lastName') }}" @endif>
                              <p  class="text-danger" id="lastName_error"></p>
                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12">Email ID</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Enter email id" @if(Cookie::has('email')) value="{{ Cookie::get('email') }}" @endif>
                              <p  class="text-danger" id="email_error"></p>
                           </div>
                           <div class="mb-2 ">
                              <label class="form-label font-12">Phone number</label>
                              <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" @if(Cookie::has('phone')) value="{{ Cookie::get('phone') }}" @endif maxlength="12"/>
                              <p  class="text-danger" id="phone_error"></p>
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="mb-2">
                                    <label class="form-label font-12 ">State</label>
                                    <select name="state" id="state" class="form-control" >
                                       <option value="">Select state</option>
                                       @foreach($providerState as $list)
                                       <option value="{{$list->id}}"@if(Cookie::has('state')) {{ Cookie::get('state') == $list->id ? 'selected' : ''  }} @endif>{{$list->state}}</option>
                                       @endforeach
                                    </select>
                                    <p  class="text-danger" id="state_error"></p>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="mb-2">
                                    <label class="form-label font-12 ">City</label>
                                    <select name="city" id="city" class="form-control" >
                                        <option value="">Select city</option>
                                       @foreach($providerCity as $list)
                                         <option ddd="{{$list->state_id}}" value="{{$list->id}}" @if(Cookie::has('city')) {{ Cookie::get('city') == $list->id ? 'selected' : ''  }} @endif>{{$list->city}}</option>
                                       @endforeach
                              </select> 

                              <p  class="text-danger" id="city_error"></p>
                                 </div>
                              </div>
                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12">Zip code</label>
                              <input type="text" name="zipcode" id="zipcode" class="form-control" placeholder="Enter zip code" @if(Cookie::has('zipcode')) value="{{ Cookie::get('zipcode') }}" @endif maxlength="5">
                              <p  class="text-danger" id="zipcode_error"></p>
                           </div>
                           <div class="row justify-content-between mx-0">
                              <input type="submit" name="createsubmit" id="next1" class="btn btn-primary col-lg-12" value="Next"/>
                           </div>
                     </form>
                     </fieldset>
                  </div>
               </div>
            </div>
            <div class="col-lg-7 pe-0">
               <div class="d-md-block  d-none">
                  <img src="{{ asset('provider/img/signup.png') }}" style="height:100vh;width:100%; object-fit: cover;" alt="" />
               </div>
            </div>
         </div>
      </div>
   </main>
</body>
@endsection
