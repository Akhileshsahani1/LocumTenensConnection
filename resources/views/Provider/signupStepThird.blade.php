@extends('layouts.main') @section('main-section')
@push('title') <title>register-step-3</title> 
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
              <span class="text-green">Step 3/5</span>
            </div>
            <h4 class="mb-0 blue-text font-30">Welcome to Provider Portal</h4>
            <p class="light-blue-text font-18">Professional details</p>
          </div>
          @if(session('successmessage'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('successmessage')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                </div>
            @endif   
           <?php
            $value = session('email');
            if($value)
            { 
              $alreadyexists = \App\Models\Provider::where('email',$value)->first();
             }
            ?>
          <form action="{{route('provider.SubmitStepThird')}}" class="msform" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
          <fieldset id="professional_information">
              <div class="mb-2">
                <label class="form-label font-12">Preferred daily patient volume</label>
                <select name="preferred_Daily_Patient_Volume" id="preferred_Daily_Patient_Volume" class="form-select ">
                  <option value="">Select daily patient volume</option>
                  <option value="1-10" @if($value) @if($alreadyexists->preferred_Daily_Patient_Volume=="1-10") selected @endif  @endif  @if(Cookie::has('preferred_Daily_Patient_Volume')) {{ Cookie::get('preferred_Daily_Patient_Volume') == "1-10" ? 'selected' : ''  }} @endif>1-10</option>
                  <option value="10-15" @if($value) @if($alreadyexists->preferred_Daily_Patient_Volume=="10-15") selected @endif  @endif   @if(Cookie::has('preferred_Daily_Patient_Volume')) {{ Cookie::get('preferred_Daily_Patient_Volume') == "10-15" ? 'selected' : ''  }} @endif>10-15</option>
                  <option value="15+" @if($value) @if($alreadyexists->preferred_Daily_Patient_Volume=="15+") selected @endif  @endif @if(Cookie::has('preferred_Daily_Patient_Volume')) {{ Cookie::get('preferred_Daily_Patient_Volume') == "15+" ? 'selected' : ''  }} @endif>15+</option>

                </select>
                <p  class="text-danger" id="preferred_Daily_Patient_Volume_error"></p>
              </div>
              <div class="mb-2">
                <label class="form-label font-12">Are you willing to stay overnight</label>
                <select name="are_You_Willing_Overnight"  id="are_You_Willing_Overnight"class="form-select ">
                  <option value="">Select willing to stay overnight</option>
                  <option value="yes" @if($value) @if($alreadyexists->are_You_Willing_Overnight=="yes") selected @endif  @endif @if(Cookie::has('are_You_Willing_Overnight')) {{ Cookie::get('are_You_Willing_Overnight') == "yes" ? 'selected' : ''  }} @endif>yes</option>
                  <option value="No" @if($value) @if($alreadyexists->are_You_Willing_Overnight=="No") selected @endif  @endif @if(Cookie::has('are_You_Willing_Overnight')) {{ Cookie::get('are_You_Willing_Overnight') == "No" ? 'selected' : ''  }} @endif>No</option>
            </select>
                <p  class="text-danger" id="are_You_Willing_Overnight_error"></p>
              </div>
              <div class="mb-2">
                <label class="form-label font-12 ">Professional Experience</label>
                <select name="professional_Experience" id="professional_Experience" class="form-select ">
                  <option value="">Select professional experience</option>
                  <option value="1-5" @if($value) @if($alreadyexists->professional_Experience=="1-5") selected @endif  @endif @if(Cookie::has('professional_Experience')) {{ Cookie::get('professional_Experience') == "1-5" ? 'selected' : ''  }} @endif>1-5</option>
                  <option value="6-12" @if($value) @if($alreadyexists->professional_Experience=="6-12") selected @endif  @endif @if(Cookie::has('professional_Experience')) {{ Cookie::get('professional_Experience') == "6-12" ? 'selected' : ''  }} @endif>6-12</option>
                  <option value="13-20" @if($value) @if($alreadyexists->professional_Experience=="13-20") selected @endif  @endif @if(Cookie::has('professional_Experience')) {{ Cookie::get('professional_Experience') == "13-20" ? 'selected' : ''  }} @endif>13-20</option>
                  <option value="20+" @if($value) @if($alreadyexists->professional_Experience=="20+") selected @endif  @endif @if(Cookie::has('professional_Experience')) {{ Cookie::get('professional_Experience') == "20+" ? 'selected' : ''  }} @endif>20+</option>

                </select>
                <p  class="text-danger" id="professional_Experience_error"></p>
              </div>
              <div class="mb-2">
                <label class="form-label font-12">Booking Availability requirements will be</label>
                <select name="booking_Availability_Requirements" id="booking_Availability_Requirements" class="form-select ">
                  <option value="">Select booking availability</option>
                  <option value="24 hours" @if($value) @if($alreadyexists->booking_Availability_Requirements=="24 hours") selected @endif  @endif @if(Cookie::has('booking_Availability_Requirements')) {{ Cookie::get('booking_Availability_Requirements') == "24 hours" ? 'selected' : ''  }} @endif>24 hours</option>
                  <option value="3 Business Days" @if($value) @if($alreadyexists->booking_Availability_Requirements=="3 Business Days") selected @endif  @endif @if(Cookie::has('booking_Availability_Requirements')) {{ Cookie::get('booking_Availability_Requirements') == "3 Business Days" ? 'selected' : ''  }} @endif>3 Business Days</option>
                  <option value="One week or more" @if($value) @if($alreadyexists->booking_Availability_Requirements=="One week or more") selected @endif  @endif @if(Cookie::has('booking_Availability_Requirements')) {{ Cookie::get('booking_Availability_Requirements') == "One week or more" ? 'selected' : ''  }} @endif>One week or more</option>
                  </select>
                <p  class="text-danger" id="booking_Availability_Requirements_error"></p>
              </div>
              <div class="mb-2">
                <label class="form-label font-12">List of Daily needs (optional)</label>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="dailyneeds_LatexAllergy" name="dailyneeds_LatexAllergy"  @if($value) @if($alreadyexists->dailyneeds_LatexAllergy=="on") checked @endif  @endif   @if(Cookie::has('dailyneeds_LatexAllergy'))  checked value="{{ Cookie::get('dailyneeds_GloveSize') }}" @endif> 
                  <span class="font-12">Latex Allergy</span>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dailyneeds_GloveSize" name="dailyneeds_GloveSize" @if($value) @if($alreadyexists->dailyneeds_GloveSize) checked @endif  @endif  @if(Cookie::has('dailyneeds_GloveSize')) checked value="{{ Cookie::get('dailyneeds_GloveSize') }}" @endif> 
                    <span class="font-12">Glove Size</span>
                    <input type="text" name="dailyneeds_GloveSize" id="dailyneeds_GloveSize_text" class="form-control my-2" placeholder="Glove Size" @if($value) @if($alreadyexists->dailyneeds_GloveSize) value="{{$alreadyexists->dailyneeds_GloveSize}}" @endif  @endif @if(Cookie::has('dailyneeds_GloveSize')) value="{{ Cookie::get('dailyneeds_GloveSize') }}" @endif>
                
                  </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dailyneeds_SpecialNeeds" name="dailyneeds_SpecialNeeds" value="Any Special Needs"  @if($value) @if($alreadyexists->dailyneeds_SpecialNeeds) checked @endif  @endif @if(Cookie::has('dailyneeds_SpecialNeeds')) checked value="{{ Cookie::get('dailyneeds_SpecialNeeds') }}" @endif>
                    <span class="font-12">Any Special Needs</span> 
                    <input type="text" name="dailyneeds_SpecialNeeds" id="dailyneeds_SpecialNeeds_text" class="form-control my-2" placeholder="Any Special Needs" @if($value) @if($alreadyexists->dailyneeds_SpecialNeeds) value="{{$alreadyexists->dailyneeds_SpecialNeeds}}" @endif  @endif  @if(Cookie::has('dailyneeds_SpecialNeeds')) value="{{ Cookie::get('dailyneeds_SpecialNeeds') }}" @endif>
                  </div>
              </div>
              <div class="mb-2">
             
                <label class="form-label font-12">Preferred Region</label>
                <select name="preferred_Region[]" id="preferred_Region" class="selectpicker" placeholder="Select preferred region" multiple>
           
                @if($value) 
                @if($alreadyexists->preferred_Region)
                <option value="{{$alreadyexists->preferred_Region}}" selected> {{$alreadyexists->preferred_Region}}</option>
                 @endif
                @endif     
             @if(Cookie::get('preferred_Region'))
               <option value="{{Cookie::get('preferred_Region')}}" selected>
              {{Cookie::get('preferred_Region')}}
             </option>
             @endif
            <option value="Central Virginia" >Central Virginia</option>
            <option value="Washington DC">Washington DC</option>
            <option value="Eastern Shore">Eastern Shore</option>
            <option value="Northern Virginia">Northern Virginia</option>
            <option value="Southwest Virginia">Southwest Virginia</option>
            <option value="Entire State">Entire State</option> 
              
              </select>
                <p  class="text-danger" id="preferred_Region_error"></p>
              </div>
                <div class="row justify-content-between mx-0">
                  <!-- <input type="button" name="previous" class="btn btn-primary col-lg-5" value="Previous"/> -->
                  <a href="{{ route('PreviousStepThird') }}" type="button" name="previous" class="btn btn-primary col-lg-5" value=""/>Previous</a>
                  <!-- <input type="button" name="createsubmit" class="btn btn-primary col-lg-5" value="Next"/> -->
                  <input type="submit" name="SubmitStepThird" id="next3" class="btn btn-primary col-lg-5" value="Next"/>

                </div>
            </fieldset>
          </form>
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