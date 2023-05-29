@extends('layouts.main')
@section('main-section')
@push('title')
<title>Edit profile</title>
@endpush

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid px-5 mob-p-0">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0">Edit Profile Details</h4>
                    </div>
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{session('error')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <form action="{{route('provider.profileUpdates',$user->id)}}" method="post" class="row"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <div class="col-lg-4 px-5">
                            <div class="mb-2">
                                <label class="form-label font-12" for="username">First Name</label>
                                <input type="text" name="firstName" class="form-control required"
                                    placeholder="Enter firstName" value="{{ $user->firstName}}" maxlength="30">
                                @if ($errors->has('firstName'))
                                <span class="text-danger">{{ $errors->first('firstName') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Last Name</label>
                                <input type="text" class="form-control required" name="lastName"
                                    placeholder="Enter lastName" value="{{ $user->lastName}}" maxlength="30">
                                @if ($errors->has('lastName'))
                                <span class="text-danger">{{ $errors->first('lastName') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Email ID</label>
                                <input type="email" name="email" class="form-control required"
                                    placeholder="Enter email id" value="{{ $user->email}}" readonly>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Phone number</label>
                                <input type="text" name="phone" class="form-control required"
                                    placeholder="Enter phone number" value="{{ $user->phone}}" maxlength="12">
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label font-12 ">State</label>
                                        <select name="state" id="state1" class="form-control">
                                            <option value="">Select state</option>
                                            @foreach($providerState as $list)
                                            <option value="{{$list->id}}" @if($user->state)
                                                {{ $user->state == $list->id ? 'selected' : ''  }}
                                                @endif>{{$list->state}}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger" id="state_error"></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label font-12 ">City</label>
                                        <select name="city" id="city1" class="form-control">
                                            <option value="">Select city</option>
                                            @foreach($providerCity as $list)
                                            <option ddd="{{$list->state_id}}" value="{{$list->id}}" @if($user->city)
                                                {{ $user->city == $list->id ? 'selected' : ''  }} @endif>{{$list->city}}
                                            </option>
                                            @endforeach
                                        </select>

                                        <p class="text-danger" id="city_error"></p>
                                    </div>
                                </div>
                            </div>


                            <!-- <div class="row">

                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label font-12 ">State</label>
                                        <select name="state" id="state" class="form-control">
                                            @foreach($providerState as $device)
                                            @if ($user->state == $device->id)
                                            <option value="{{ $device->id}}" selected>{{ $device->state}}</option>
                                            @else
                                            <option value="{{ $device->id}}">{{ $device->state}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('state'))
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label class="form-label font-12">City</label>
                                        <select name="city" id="city" class="form-control">
                                            <option value="">Select city</option>
                                            @foreach($providerCity as $citylist)
                                                @if($user->city == $citylist->state_id)
                                                <option value="{{ $citylist->state_id}}" selected>{{ $citylist->city}}</option>
                                                @else
                                                <option value="{{ $citylist->state_id}}">{{ $citylist->city}}</option>
                                                @endif
                                            @endforeach

                                        </select>

                                        @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div> -->
                            <div class="mb-2">
                                <label class="form-label font-12">Zip code</label>
                                <input type="text" name="zipcode" class="form-control required"
                                    placeholder="Enter zip code" value="{{ $user->zipcode}}" maxlength="5">
                                @if ($errors->has('zipcode'))
                                <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Profile photo</label>
                                <input type="file" class="form-control required" name="upload_Photo" id="upload"
                                    accept=".png, .jpg, .jpeg" />
                                <img src="{{asset('provider/uploads/upload_photo/'.$user->upload_Photo)}}" class="mt-2"
                                    height="30" width="30" />
                                @if ($errors->has('upload_Photo'))
                                <span class="text-danger">{{ $errors->first('upload_Photo') }}</span>
                                @endif

                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Virginia Dental License</label>
                                <input type="file" class="form-control required" name="Virginia_Dental_File"
                                    accept=".png, .jpg, .jpeg">
                                <img src="{{asset('provider/uploads/Virginia_Dental_File/'.$user->Virginia_Dental_File)}}"
                                    class="mt-2" height="40" width="30" />
                                @if ($errors->has('Virginia_Dental_File'))
                                <span class="text-danger">{{ $errors->first('Virginia_Dental_File') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Malpractices Certificate</label>
                                <input type="file" class="form-control required" name="malpractices_Certificate"
                                    accept=".png, .jpg, .jpeg">
                                <img src="{{asset('provider/uploads/malpractices_Certificate/'.$user->malpractices_Certificate)}}"
                                    class="mt-2" height="40" width="40" />
                                @if ($errors->has('malpractices_Certificate'))
                                <span class="text-danger">{{ $errors->first('malpractices_Certificate') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">DEA License</label>
                                <input type="file" class="form-control required" name="dea_License[]"
                                    multiple="multiple">

                                <?php 
                                    $images_dea = $user->dea_License;        
                                    ?>
                                @foreach(explode(',', $user->dea_License) as $dea_data )

                                <img src="{{asset('provider/uploads/dea_License/'.$dea_data)}}" class="mt-2" height="40"
                                    width="40" />
                                @endforeach
                                @if ($errors->has('dea_License'))
                                <span class="text-danger">{{ $errors->first('dea_License') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 px-5">
                            <div class="mb-2">
                                <label class="form-label font-12">Practitioner Type</label>
                                <select name="practitioner_Type" class="form-select">

                                    <option value="">Select Practitioner Type </option>
                                    <option value="GeneralDentist" @if($user->practitioner_Type =='GeneralDentist')
                                        selected @endif>General Dentist</option>
                                    <option value="Hygienist" @if($user->practitioner_Type =='Hygienist') selected
                                        @endif>Hygienist</option>
                                    <option value="Endodontist" @if($user->practitioner_Type =='Endodontist') selected
                                        @endif>Endodontist</option>
                                    <option value="OralSurgeon" @if($user->practitioner_Type =='OralSurgeon') selected
                                        @endif>Oral Surgeon</option>
                                    <option value="Orthodontist" @if($user->practitioner_Type =='Orthodontist') selected
                                        @endif>Orthodontist</option>
                                    <option value="Periodontist" @if($user->practitioner_Type =='Periodontist') selected
                                        @endif>Periodontist</option>
                                    <option value="Prosthodontist" @if($user->practitioner_Type =='Prosthodontist')
                                        selected @endif>Prosthodontist</option>
                                </select>
                                @if ($errors->has('practitioner_Type'))
                                <span class="text-danger">{{ $errors->first('practitioner_Type') }}</span>
                                @endif


                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12" for="position">Position type</label>
                                <select name="position_Type" class="form-select required">
                                    <option value="">Select Position type</option>
                                    <option value="Temporary" @if($user->position_Type =='Temporary') selected
                                        @endif>Temporary</option>
                                    <option value="Permanent" @if($user->position_Type =='Permanent') selected
                                        @endif>Permanent</option>
                                    <option value="Temporary_possible_Permanent" @if($user->position_Type
                                        =='Temporary_possible_Permanent') selected @endif>Temporary possible Permanent
                                    </option>
                                </select>
                                @if ($errors->has('position_Type'))
                                <span class="text-danger">{{ $errors->first('position_Type') }}</span>
                                @endif


                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12 ">Availability Start Date</label>
                                <input type="date" name="start_Date" class="form-control"
                                    value="{{ $user->start_Date}}">
                                @if ($errors->has('start_Date'))
                                <span class="text-danger">{{ $errors->first('start_Date') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12 ">Availability End Date</label>
                                <input type="date" name="end_Date" class="form-control" value="{{ $user->end_Date}}">
                                @if ($errors->has('end_Date'))
                                <span class="text-danger">{{ $errors->first('end_Date') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Primary Handedness</label>
                                <select name="primary_Handedness" class="form-select">
                                    <option value="">Select primary handedness</option>
                                    <option value="Right" @if($user->primary_Handedness =='Right')selected @endif>Right
                                    </option>
                                    <option value="Left" @if($user->primary_Handedness =='Left')selected @endif>Left
                                    </option>
                                    <option value="Ambidextrous">Ambidextrous</option>
                                </select>
                                @if ($errors->has('primary_Handedness'))
                                <span class="text-danger">{{ $errors->first('primary_Handedness') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Distance willing to travel one way</label>
                                <select name="distance_Willing_To_Travel_One_Way" class="form-select">
                                    <option value="">Select distance willing</option>
                                    <option value="0-50" @if($user->distance_Willing_To_Travel_One_Way =='0-50')selected
                                        @endif>0-50 miles</option>
                                    <option value="50-100" @if($user->distance_Willing_To_Travel_One_Way
                                        =='50-100')selected @endif>50-100 miles</option>
                                    <option value="100+" @if($user->distance_Willing_To_Travel_One_Way =='100+')selected
                                        @endif>100+ miles</option>
                                </select>
                                @if ($errors->has('distance_Willing_To_Travel_One_Way'))
                                <span
                                    class="text-danger">{{ $errors->first('distance_Willing_To_Travel_One_Way') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Preferred Daily working hours</label>
                                <select name="peferred_Daily_Working_Hours" class="form-select">
                                    <option value="">Select daily working hours</option>
                                    <option value="4-8" @if($user->peferred_Daily_Working_Hours =='4-8')selected
                                        @endif>4-8</option>
                                    <option value="8+" @if($user->peferred_Daily_Working_Hours =='8+')selected @endif>8+
                                    </option>
                                </select>
                                @if ($errors->has('peferred_Daily_Working_Hours'))
                                <span class="text-danger">{{ $errors->first('peferred_Daily_Working_Hours') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Preferred daily patient volume</label>
                                <select name="preferred_Daily_Patient_Volume" class="form-select">
                                    <option value="">Select daily patient volume</option>
                                    <option value="1-10" @if($user->preferred_Daily_Patient_Volume =='1-10')selected
                                        @endif>1-10</option>
                                    <option value="10-15" @if($user->preferred_Daily_Patient_Volume =='10-15')selected
                                        @endif>10-15</option>
                                    <option value="15+" @if($user->preferred_Daily_Patient_Volume =='15+')selected
                                        @endif>15+</option>
                                </select>
                                @if ($errors->has('preferred_Daily_Patient_Volume'))
                                <span class="text-danger">{{ $errors->first('preferred_Daily_Patient_Volume') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Are you willing to stay overnight</label>
                                <select name="are_You_Willing_Overnight" class="form-select">
                                    <option value="">Select willing to stay overnight</option>
                                    <option value="yes" @if($user->are_You_Willing_Overnight =='yes')selected @endif>Yes
                                    </option>
                                    <option value="No" @if($user->are_You_Willing_Overnight =='No')selected @endif>No
                                    </option>
                                </select>
                                @if ($errors->has('are_You_Willing_Overnight'))
                                <span class="text-danger">{{ $errors->first('are_You_Willing_Overnight') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Professional Experience</label>
                                <select name="professional_Experience" class="form-select">
                                    <option value="">Select professional experience</option>
                                    <option value="1-5" @if($user->professional_Experience =='1-5')selected @endif>1-5
                                    </option>
                                    <option value="6-12" @if($user->professional_Experience =='6-12')selected
                                        @endif>6-12</option>
                                    <option value="13-20" @if($user->professional_Experience =='13-20')selected
                                        @endif>13-20</option>
                                    <option value="20+" @if($user->professional_Experience =='20+')selected @endif>20+
                                    </option>
                                </select>
                                @if ($errors->has('professional_Experience'))
                                <span class="text-danger">{{ $errors->first('professional_Experience') }}</span>
                                @endif
                            </div>

                            <div class="mb-2">
                                <label class="form-label font-12">Bio</label>
                                <textarea class="form-control" name="description" id="description_update_profile" maxlength="2500" rows="4">{{$user->description}}</textarea>
                                <p class="text-danger" id="description_error"></p>
                                <p class='text-grey text-start'><span id="charCount_update_profile"></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-4 px-5">
                            <div class="mb-2">
                                <label class="form-label font-12">Booking Availability requirements will be
                                   </label>
                                <select name="booking_Availability_Requirements" class="form-select">
                                    <option value="">Select booking availability</option>
                                    <option value="24 hours" @if($user->booking_Availability_Requirements =='24 hours')
                                        selected @endif>24 hours</option>
                                    <option value="3 Business Days" @if($user->booking_Availability_Requirements == '3 Business Days') selected @endif>3 Business Days</option>
                                    <option value="One week or more" @if($user->booking_Availability_Requirements =='One week or more')selected @endif>One week or more</option>
                                </select>
                                @if ($errors->has('booking_Availability_Requirements'))
                                <span
                                    class="text-danger">{{ $errors->first('booking_Availability_Requirements') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">List of Daily needs (optional)</label>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="dailyneeds_LatexAllergy"
                                        @if(!empty($user->dailyneeds_LatexAllergy)) checked  @endif value="Latex Allergy" value="{{ $user->dailyneeds_LatexAllergy}}"> <span
                                        class="font-12">Latex Allergy</span>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="dailyneeds_GloveSize1"  @if(!empty($user->dailyneeds_GloveSize)) checked @endif
                                        name="dailyneeds_GloveSize" value="{{ $user->dailyneeds_GloveSize }}"> <span
                                        class="font-12">Glove Size</span>

                                    <input type="text" name="dailyneeds_GloveSize" id="dailyneeds_GloveSize_text1"
                                        value="{{ $user->dailyneeds_GloveSize}}" class="form-control my-2"
                                        placeholder="Glove Size">

                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="dailyneeds_SpecialNeeds1"
                                    @if(!empty($user->dailyneeds_SpecialNeeds)) checked @endif name="dailyneeds_SpecialNeeds" value="Any Special Needs"> <span
                                        class="font-12">Any Special Needs</span>

                                    <input type="text" name="dailyneeds_SpecialNeed" id="dailyneeds_SpecialNeeds_text1"
                                        value="{{ $user->dailyneeds_SpecialNeeds}}" class="form-control my-2"
                                        placeholder="Any Special Needs">
                                </div>

                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Preferred Region</label>
                                <select name="preferred_Region[]" id="preferred_Region" class="selectpicker"
                                    placeholder="Select preferred region" multiple>
                                    @if($user->preferred_Region)
                                    <option value="{{$user->preferred_Region}}" selected>
                                        {{$user->preferred_Region}}
                                    </option>
                                    @endif
                                    <option value="Central Virginia">Central Virginia</option>
                                    <option value="Washington DC">Washington DC</option>
                                    <option value="Eastern Shore">Eastern Shore</option>
                                    <option value="Northern Virginia">Northern Virginia</option>
                                    <option value="Southwest Virginia">Southwest Virginia</option>
                                    <option value="Entire State">Entire State</option>
                                </select>
                                @if ($errors->has('preferred_Region'))
                                <span class="text-danger">{{ $errors->first('preferred_Region') }}</span>
                                @endif
                            </div>

                            <div class="mb-2">
                                <label class="form-label font-12">Available Days</label>
                                <select name="available_Days[]" id="available_Days" class="selectpicker"
                                    placeholder="Select available days" multiple>

                                    @if($user->available_Days)
                                    <option value="{{$user->available_Days}}" selected>
                                        {{ $user->available_Days }}
                                    </option>
                                    @endif
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                </select>
                                @if ($errors->has('available_Days'))
                                <span class="text-danger">{{ $errors->first('available_Days') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Preferred case/Procedure type</label>
                                <select name="procedure_Type[]" id="procedure_Type" class="selectpicker"
                                    placeholder="Select procedure type" multiple>
                                    @if($user->procedure_Type)
                                    <option value="{{$user->procedure_Type}}" selected>
                                        {{$user->procedure_Type}}
                                    </option>
                                    @endif

                                    <option value="Diagnostic/Preventative">Diagnostic/Preventative</option>
                                    <option value="Endodontics">Endodontics</option>
                                    <option value="General">General</option>
                                    <option value="Hygiene/Emergency">Hygiene/Emergency</option>
                                    <option value="Hygiene/Emergency/Simple Procedure">Hygiene/Emergency/Simple
                                        Procedure</option>
                                    <option value="Hygiene/Emergency/All General Procedure">Hygiene/Emergency/All
                                        General Procedure</option>
                                    <option value="Oral Surgery">Oral Surgery</option>
                                    <option value="Orthodontics">Orthodontics</option>
                                    <option value="Pedodontics">Pedodontics</option>
                                    <option value="Periodontics">Periodontics</option>
                                    <option value="Prosthodontics">Prosthodontics</option>
                                </select>
                                @if ($errors->has('procedure_Type'))
                                <span class="text-danger">{{ $errors->first('procedure_Type') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">

                                <label class="form-label font-12">Advanced Degree Licenses</label>
                                <select name="advanced_Degree_Licences[]" id="advanced_Degree_Licences"
                                    class="selectpicker" placeholder="Select advanced degree licenses" multiple>
                                    @if($user->advanced_Degree_Licences)
                                    <option value="{{$user->advanced_Degree_Licences}}" selected>
                                        {{$user->advanced_Degree_Licences}}
                                    </option>
                                    @endif


                                    <option value="Endodontics">Endodontics</option>
                                    <option value="Oral Surgery">Oral Surgery</option>
                                    <option value="Orthodontics">Orthodontics</option>
                                    <option value="Periodontics">Periodontics</option>
                                    <option value="Prosthodontics">Prosthodontics</option>
                                    <option value="None">None</option>
                                </select>

                                @if ($errors->has('advanced_Degree_Licences'))
                                <span class="text-danger">{{ $errors->first('advanced_Degree_Licences') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Comfortable Treating Children</label>
                                <select name="comfortable_Treating_Children" class="form-select">

                                    <option value="">Select comfortable treating children</option>
                                    <option value="Yes" @if($user->comfortable_Treating_Children =='Yes')selected
                                        @endif>Yes</option>
                                    <option value="No" @if($user->comfortable_Treating_Children =='No')selected
                                        @endif>No</option>
                                </select>
                                @if ($errors->has('comfortable_Treating_Children'))
                                <span class="text-danger">{{ $errors->first('comfortable_Treating_Children') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Qualities you are looking for in a practice
                                    Environment</label>
                                <input type="text" name="qualities_Practice_Environment" class="form-control"
                                    placeholder="Enter qualities" value="{{ $user->qualities_Practice_Environment}}" maxlength="100">
                                @if ($errors->has('qualities_Practice_Environment'))
                                <span class="text-danger">{{ $errors->first('qualities_Practice_Environment') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Average Daily Rate</label>
                                <input type="text" name="average_Daily_Rate" class="form-control" placeholder="$0.00"
                                    value="{{ $user->average_Daily_Rate}}">
                                @if ($errors->has('average_Daily_Rate'))
                                <span class="text-danger">{{ $errors->first('average_Daily_Rate') }}</span>
                                @endif
                            </div>
                            <div class="mb-2">
                                <label class="form-label font-12">Average hour rate</label>
                                <input type="text" name="average_hour_rate" class="form-control" placeholder="$0.00"
                                    value="{{ $user->average_hour_rate}}">
                                @if ($errors->has('average_hour_rate'))
                                <span class="text-danger">{{ $errors->first('average_hour_rate') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 py-3 px-5">
                            <button type="submit" name="profileUpdates" class="btn btn-primary px-5 me-3">Save</button>
                            <button class="btn btn-outline-secondary px-5">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection