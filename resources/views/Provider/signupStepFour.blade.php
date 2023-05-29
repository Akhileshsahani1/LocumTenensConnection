@extends('layouts.main') @section('main-section')
@push('title') <title>register-step-4</title>
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
                                    <span class="text-green">Step 4/5</span>
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
                            <form action="{{route('provider.SubmitStepFour')}}" class="msform" method="POST"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <fieldset id="working_attribute">
                                    <div class="mb-2">
                                        <label class="form-label font-12">Available Days</label>
                                        <select name="available_Days[]" id="available_Days" class="selectpicker"
                                            placeholder="Select available days"
                                            multiple>@if(Cookie::get('available_Days'))
                                            <option value="{{Cookie::get('available_Days')}}" selected>
                                                {{Cookie::get('available_Days')}}
                                            </option>
                                            @endif
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wednesday">Wednesday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                        </select>
                                        <p class="text-danger" id="available_Days_error"></p>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label font-12">Preferred case/Procedure type</label>
                                        <select name="procedure_Type[]" id="procedure_Type" class="selectpicker"
                                            placeholder="Select procedure type" multiple>
                                            @if(Cookie::get('procedure_Type'))
                                            <option value="{{Cookie::get('procedure_Type')}}" selected>
                                                {{Cookie::get('procedure_Type')}}
                                            </option>
                                            @endif
                                            <option value="Diagnostic/Preventative">Diagnostic/Preventative</option>
                                            </option>
                                            <option value="Endodontics">Endodontics</option>
                                            <option value="General">General</option>
                                            <option value="Hygiene/Emergency">Hygiene/Emergency</option>
                                            <option value="Hygiene/Emergency/Simple Procedure">Hygiene/Emergency/Simple
                                                Procedure</option>
                                            <option value="Hygiene/Emergency/All General Procedure">
                                                Hygiene/Emergency/All General Procedure</option>
                                            <option value="Oral Surgery">Oral Surgery</option>
                                            <option value="Orthodontics">Orthodontics</option>
                                            <option value="Pedodontics">Pedodontics</option>
                                            <option value="Periodontics">Periodontics</option>
                                        </select>
                                        <p class="text-danger" id="procedure_Type_error"></p>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label font-12">Advanced Degree Licenses</label>
                                        <select name="advanced_Degree_Licences[]" id="advanced_Degree_Licences"
                                            class="selectpicker" placeholder="Select advanced degree licenses" multiple>
                                            @if(Cookie::get('advanced_Degree_Licences'))
                                            <option value="{{Cookie::get('advanced_Degree_Licences')}}" selected>
                                                {{Cookie::get('advanced_Degree_Licences')}}
                                            </option>
                                            @endif
                                            <option value="Endodontics">Endodontics</option>
                                            <option value="Oral Surgery">Oral Surgery</option>
                                            <option value="Orthodontics">Orthodontics</option>
                                            <option value="Periodontics">Periodontics</option>
                                            <option value="Prosthodontics">Prosthodontics</option>
                                            <option value="None">None</option>
                                        </select>
                                        <p class="text-danger" id="advanced_Degree_Licences_error"></p>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label font-12">Comfortable Treating Children</label>
                                        <select class="form-select" name="comfortable_Treating_Children"
                                            id="comfortable_Treating_Children">
                                            <option value="">Select comfortable treating children</option>
                                            <option value="Yes" @if(Cookie::has('comfortable_Treating_Children'))
                                                {{ Cookie::get('comfortable_Treating_Children') == "Yes" ? 'selected' : ''  }}
                                                @endif>Yes</option>
                                            <option value="No" @if(Cookie::has('comfortable_Treating_Children'))
                                                {{ Cookie::get('comfortable_Treating_Children') == "No" ? 'selected' : ''  }}
                                                @endif>No</option>
                                        </select>
                                        <p class="text-danger" id="comfortable_Treating_Children_error"></p>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label font-12">Qualities you are looking for in a practice
                                            Environment</label>
                                        <input type="text" name="qualities_Practice_Environment"
                                            id="qualities_Practice_Environment" class="form-control"
                                            placeholder="Enter qualities"
                                            @if(Cookie::has('qualities_Practice_Environment'))
                                            value="{{ Cookie::get('qualities_Practice_Environment') }}" @endif>
                                        <p class="text-danger" id="qualities_Practice_Environment_error"></p>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label font-12">Average Daily Rate</label>
                                        <input type="text" name="average_Daily_Rate" id="average_Daily_Rate"
                                            class="form-control" placeholder="$0.00"
                                            @if(Cookie::has('average_Daily_Rate'))
                                            value="{{ Cookie::get('average_Daily_Rate') }}" @endif>
                                        <p class="text-danger" id="average_Daily_Rate_error"></p>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label font-12">Average hour rate</label>
                                        <input type="text" name="average_hour_rate" id="average_hour_rate"
                                            class="form-control" placeholder="$0.00"
                                            @if(Cookie::has('average_hour_rate'))
                                            value="{{ Cookie::get('average_hour_rate') }}" @endif>
                                        <p class="text-danger" id="average_hour_rate_error"></p>
                                    </div>
                                    <div class="row justify-content-between mx-0">
                                        <!-- <input type="button" name="previous" class="btn btn-primary col-lg-5" value="Previous"/> -->
                                        <a href="{{ route('PreviousStepFour') }}" type="button" name="previous"
                                            class="btn btn-primary col-lg-5" value="" />Previous</a>

                                        <input type="submit" name="SubmitStepFour" id="next4"
                                            class="btn btn-primary col-lg-5" value="Next" />

                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pe-0">
                    <div class="d-md-block  d-none">
                        <img src="{{ asset('provider/img/signup.png') }}"
                            style="height:100vh;width:100%; object-fit: cover;" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
@endsection