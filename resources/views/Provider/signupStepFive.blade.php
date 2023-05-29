@extends('layouts.main') @section('main-section')
@push('title') <title>register-step-5</title> 
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
              <span class="text-green">Step 5/5</span>
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
          <form action="{{route('provider.SubmitStepFive')}}" class="msform" method="POST" enctype="multipart/form-data" autocomplete="off">
            @csrf
          <fieldset id="upload_document">
            <div class="mb-2">
              <label class="form-label font-12 blue-text">Profile photo</label>
              <div class="d-flex justify-content-between">
                <div class="holder">
                  <img id="previewImg" src="{{ asset('provider/img/avatar.png') }}" alt="Profile" class="rounded">
                </div>
                <label class="custom-file-input">
                  <input accept="image/*" type="file" name="upload_Photo" id="upload_Photo"  onchange="previewFile(this);" required  value="" />
                </label>
                <p  class="text-danger" id="upload_Photo_error"></p>
            </div>
            </div>
            <div class="mb-2">
              <label class="form-label font-12">Virginia Dental License</label>
              <input type="file" class="form-control required" multiple="" name="Virginia_Dental_File"  id="Virginia_Dental_File" >
              <p  class="text-danger" id="Virginia_Dental_File_error"></p>
            </div>
            <div class="mb-2">
              <label class="form-label font-12">Malpractices Certificate</label>
                <input type="file" class="form-control required" multiple="" name="malpractices_Certificate" id="malpractices_Certificate" >
                <p  class="text-danger" id="malpractices_Certificate_error"></p>
            </div>
            <div class="mb-2">
              <label class="form-label font-12">DEA License</label>
              <input type="file" class="form-control required" name="dea_License[]" multiple="multiple" id="dea_License">
              <p class="text-danger" id="dea_License_error"></p>
            </div>
            <div class="mb-2">
              <label class="form-label font-12">Bio</label>
              <textarea class="form-control" name="description" id="description" rows="4" maxlength="2500"></textarea>
              <p  class="text-danger" id="description_error"></p>
              <p class='text-grey text-start'><span id="charCountSignup"></span></p>
            </div>
            <div class="my-3">
             <a href="https://www.irs.gov/pub/irs-pdf/fw9.pdf" target="_blank" class="blue-text fw-bold text-decoration-none">https://www.irs.gov/</a>
            </div>
            <div class="row justify-content-between mx-0">
              <!-- <input type="button" name="previous" class="btn btn-primary col-lg-5" value="Previous"/> -->
             <a href="{{ route('PreviousStepFive') }}" type="button" name="previous" class="btn btn-primary col-lg-5" value=""/>Previous</a>
             <input type="submit" name="SubmitStepFive" id="next5" class="btn btn-primary col-lg-5" value="Next"/>
          </div>
          </fieldset>
        </div>
        </div>
        </div>
        <div class="col-lg-7 pe-0">
          <div class="d-md-block  d-none">
            <!-- <img src="./img/upload.png" style="height:100vh;width:100%; object-fit: cover;" alt="" /> -->
            <img src="{{ asset('provider/img/upload.png') }}" style="height:100vh;width:100%; object-fit: cover;" alt="" />

          </div>
        </div>
        </div>
       </div>
    </main>
</body>
@endsection
