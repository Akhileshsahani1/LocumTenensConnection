@extends('layouts.main') @section('main-section')
@push('title') 
<title>register-step-2</title>
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
                           <span class="text-green">Step 2/5</span>
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
                     <!-- <form > -->
                     <?php
            $value = session('email');
            if($value)
            {
               $alreadyexists = \App\Models\Provider::where('email',$value)->first();
               
            }
           ?>


                     <form action="{{route('provider.SubmitStepSecond')}}" class="msform" method="post" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <fieldset id="personal_information">
                           <div class="mb-2">
                              <label class="form-label font-12" for="practitioner_Type">Practitioner Type</label>
                              <select name="practitioner_Type" id="practitioner_Type"   class="form-select " >
                                 
                              <option value="">Select Practitioner Type</option>
                                  <option value="GeneralDentist" @if($value) @if($alreadyexists->practitioner_Type=="GeneralDentist") selected @endif  @endif  @if(Cookie::has('practitioner_Type')) {{ Cookie::get('practitioner_Type') == "GeneralDentist" ? 'selected' : ''  }} @endif>General Dentist</option>
                                  <option value="Hygienist" @if($value)  @if($alreadyexists->practitioner_Type=="Hygienist") selected @endif   @endif @if(Cookie::has('practitioner_Type')) {{ Cookie::get('practitioner_Type') == "Hygienist" ? 'selected' : ''  }} @endif>Hygienist</option>
                                  <option value="Endodontist" @if($value)  @if($alreadyexists->practitioner_Type=="Endodontist") selected @endif   @endif @if(Cookie::has('practitioner_Type')) {{ Cookie::get('practitioner_Type') == "Endodontist" ? 'selected' : ''  }} @endif>Endodontist</option>
                                  <option value="OralSurgeon" @if($value)  @if($alreadyexists->practitioner_Type=="OralSurgeon") selected  @endif  @endif @if(Cookie::has('practitioner_Type')) {{ Cookie::get('practitioner_Type') == "OralSurgeon" ? 'selected' : ''  }} @endif>Oral Surgeon</option>
                                  <option value="Orthodontist" @if($value)  @if($alreadyexists->practitioner_Type=="Orthodontist") selected @endif   @endif @if(Cookie::has('practitioner_Type')) {{ Cookie::get('practitioner_Type') == "Orthodontist" ? 'selected' : ''  }} @endif>Orthodontist</option>
                                  <option value="Periodontist"  @if($value) @if($alreadyexists->practitioner_Type=="Periodontist") selected  @endif  @endif @if(Cookie::has('practitioner_Type')) {{ Cookie::get('practitioner_Type') == "Periodontist" ? 'selected' : ''  }} @endif>Periodontist</option>
                                  <option value="Prosthodontist" @if($value)  @if($alreadyexists->practitioner_Type=="Prosthodontist") selected @endif   @endif @if(Cookie::has('practitioner_Type')) {{ Cookie::get('practitioner_Type') == "Prosthodontist" ? 'selected' : ''  }} @endif>Prosthodontist</option>
                              </select>
                              <p  class="text-danger" id="practitioner_Type_error"></p>

                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12">Position type</label>
                              <select name="position_Type" id="position_Type" class="form-select ">
                                 <option value="">Select Position type</option>
                                 <option value="Temporary" @if($value) @if($alreadyexists->position_Type=="Temporary") selected @endif  @endif @if(Cookie::has('position_Type')) {{ Cookie::get('position_Type') == "Temporary" ? 'selected' : ''  }} @endif>Temporary</option>
                                 <option value="Permanent" @if($value) @if($alreadyexists->position_Type=="Permanent") selected @endif  @endif @if(Cookie::has('position_Type')) {{ Cookie::get('position_Type') == "Permanent" ? 'selected' : ''  }} @endif>Permanent</option>
                                 <option value="Temporary possible Permanent" @if($value) @if($alreadyexists->position_Type=="Temporary possible Permanent") selected @endif  @endif @if(Cookie::has('position_Type')) {{ Cookie::get('position_Type') == "Temporary possible Permanent" ? 'selected' : ''  }} @endif>Temporary possible Permanent</option>
                              </select>
                              <p  class="text-danger" id="position_Type_error"></p>
                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12 ">Availability Start Date</label>
                              <div class="position-relative">
                                <input type="text" name="start_Date" id="start_Date" class="form-control" @if($value) @if($alreadyexists->start_Date) value="{{ $alreadyexists->start_Date }}" @endif  @endif @if(Cookie::has('start_Date')) value="{{ Cookie::get('start_Date') }}" @endif>
                              <i class="bi bi-calendar-event position-absolute gray font-18" style="top:10px;right:15px;"></i>
                              </div>
                              
                              <p  class="text-danger" id="start_Date_error"></p>
                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12 ">Availability End Date</label>
                              <div class="position-relative">
                              <input type="text" name="end_Date" id="end_Date" class="form-control" @if($value) @if($alreadyexists->end_Date) value="{{ $alreadyexists->end_Date }}" @endif  @endif @if(Cookie::has('end_Date')) value="{{ Cookie::get('end_Date') }}" @endif>
                              <i class="bi bi-calendar-event position-absolute gray font-18" style="top:10px;right:15px;"></i>
                              </div>
                              <p class="text-danger" id="end_Date_error"></p>
                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12">Primary Handedness</label>
                              <select name="primary_Handedness" id="primary_Handedness" class="form-select ">
                                 <option value="">Select primary handedness</option>
                                 <option value="Right" @if($value) @if($alreadyexists->primary_Handedness=="Right") selected @endif  @endif @if(Cookie::has('primary_Handedness')) {{ Cookie::get('primary_Handedness') == "Right" ? 'selected' : ''  }} @endif>Right</option>
                                 <option value="Left" @if($value) @if($alreadyexists->primary_Handedness=="Left") selected @endif  @endif @if(Cookie::has('primary_Handedness')) {{ Cookie::get('primary_Handedness') == "Left" ? 'selected' : ''  }} @endif>Left</option>
                                 <option value="Ambidextrous" @if($value) @if($alreadyexists->primary_Handedness=="Ambidextrous") selected @endif  @endif @if(Cookie::has('primary_Handedness')) {{ Cookie::get('primary_Handedness') == "Ambidextrous" ? 'selected' : ''  }} @endif>Ambidextrous</option>
                          
                              </select>
                              <p  class="text-danger" id="primary_Handedness_error"></p>
                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12">Distance willing to travel one way</label>
                              <select name="distance_Willing_To_Travel_One_Way" id="distance_Willing_To_Travel_One_Way" class="form-select ">
                                 <option value="">Select distance willing</option>
                                 <option value="0-50" @if($value) @if($alreadyexists->distance_Willing_To_Travel_One_Way=="0-50") selected @endif  @endif  @if(Cookie::has('distance_Willing_To_Travel_One_Way')) {{ Cookie::get('distance_Willing_To_Travel_One_Way') == "0-50" ? 'selected' : ''  }} @endif>0-50 miles</option>
                                 <option value="50-100" @if($value) @if($alreadyexists->distance_Willing_To_Travel_One_Way=="50-100") selected @endif  @endif  @if(Cookie::has('distance_Willing_To_Travel_One_Way')) {{ Cookie::get('distance_Willing_To_Travel_One_Way') == "50-100" ? 'selected' : ''  }} @endif>50-100 miles</option>
                                 <option value="100+" @if($value) @if($alreadyexists->distance_Willing_To_Travel_One_Way=="100+") selected @endif  @endif  @if(Cookie::has('distance_Willing_To_Travel_One_Way')) {{ Cookie::get('distance_Willing_To_Travel_One_Way') == "100+" ? 'selected' : ''  }} @endif>100+ miles</option>
                              </select>
                              <p  class="text-danger" id="distance_Willing_To_Travel_One_Way_error"></p>

                           </div>
                           <div class="mb-2">
                              <label class="form-label font-12">Preferred Daily working hours</label>
                              <select name="peferred_Daily_Working_Hours" id="peferred_Daily_Working_Hours" class="form-select ">
                                 <option value="">Select daily working hours</option>
                                 <option value="4-8" @if($value) @if($alreadyexists->peferred_Daily_Working_Hours=="4-8") selected @endif  @endif @if(Cookie::has('peferred_Daily_Working_Hours')) {{ Cookie::get('peferred_Daily_Working_Hours') == "4-8" ? 'selected' : ''  }} @endif>4-8</option>
                                 <option value="8+" @if($value) @if($alreadyexists->peferred_Daily_Working_Hours=="8+") selected @endif  @endif @if(Cookie::has('peferred_Daily_Working_Hours')) {{ Cookie::get('peferred_Daily_Working_Hours') == "8+" ? 'selected' : ''  }} @endif>8+</option>


                              </select>
                              <p  class="text-danger" id="peferred_Daily_Working_Hours_error"></p>

                           </div>
                           <div class="row justify-content-between mx-0 align-items-center">
                              <!-- <a href="{{ route('index') }}" class="btn btn_commn">Click Here</a> -->
                              <a href="{{ route('Provider.signupStepFirst') }}" type="button" name="previous" class="btn btn-primary col-lg-5" value=""/>Previous</a>
                              <!-- <input type="button" name="createsubmit" class="btn btn-primary col-lg-5" value="Next"/> -->
                              <input type="submit" name="SubmitStepSecond" id="next2" class="next action-button" value="Next"/>
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
