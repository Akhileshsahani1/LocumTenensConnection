@include('Practice.header')

<!--Main layout-->
 <main class="main-body   ">
    <div class="container-fluid pe-xl-5 pe-0 ">
   
      <div class="heading ps-5 pe-5   pt-3 me-xxl-5 ">
        <div class="mt-5 border-bottom pb-2">
          <h3 class="p-20 fw-bold text-dark">Search result</h3>
          <!-- <span class="border px-2 py-2 shadow-2 rounded-3"> <input type="date" class="border-0"> <img
              src="./Assets/icons/right-arrow-solid.svg" alt="" style="width:10px"> <input type="date" class="border-0">
          </span> -->

        </div>

      </div>

      <div class="cards ps-5 pe-5   pt-3 me-xxl-5 ">
        <div class="row justify-content-evenly ">
          @foreach($data as $provider)
          <div class="col-xl-4 col-lg-6 col-12 my-4">
            <div class="pe-4">
              <div class="card" style="width: 100%;">
                <div class="card-header px-3">
                  <div class="row">
                    <div class="col-2">
                      <div class="">
                        <div class="border rounded-circle p-1 d-flex justify-content-center align-items-center "> <img
                        src="{{ asset('provider/uploads/upload_photo/'.$provider->upload_Photo) }}" alt=""
                            style="width:100%; height: 100%; object-fit:fill;">
                        </div>
                      </div>
                    </div>
                    <div class="col-10 my-auto">
                      <h3 class="p-16 mb-0 fw-bold">{{$provider->practitioner_Type}}</h3>
                      <p class="p-12 mb-0 fw-semibold ">{{ $provider->professional_Experience }}years experience</p>
                    </div>


                  </div>
                </div>
                <ul class="list-group list-group-light list-group-small">
                  <li class="list-group-item px-3 p-12">
                    <p>{{$provider->description}}...</p>
                  </li>
                  <li class="list-group-item px-3">
                    <div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="{{asset('Assets/icons/card_icons/Group 3751.svg')}}" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">position Type</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :
                        </div>
                        <div class="col-5 p-14 fw-bold">
                        {{$provider->position_Type}}
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="./Assets/icons/card_icons//Icon material-date-range.svg" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">Start Date</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :
                        </div>
                        <div class="col-5 p-14 fw-bold">
                        {{$provider->start_Date}}
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="./Assets/icons/card_icons/Icon material-date-range.svg" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">End Date</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :
                        </div>
                        <div class="col-5 p-14 fw-bold">
                        {{$provider->end_Date}}
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="./Assets/icons/card_icons/Group 3769.svg" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">Rate</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :
                        </div>
                        <div class="col-5 p-14 fw-bold">
                          ${{$provider->average_Daily_Rate}}/Day
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="./Assets/icons/card_icons/Group 3769.svg" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">Average Rate</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :
                        </div>
                        <div class="col-5 p-14 fw-bold">
                          ${{$provider->average_hour_rate}}/hr
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
               <div class="mt-3 mb-2 pt-1 d-flex justify-content-center border-top">
                <a href="{{route('personaldetails',$provider->id)}}" class="button-bg btn-text  py-2 px-5 shadow card_button  ">View Profile</a>
               </div>
              </div>
            </div>
          </div>
         @endforeach
          

        </div>
      </div>
    </div>

  </main>
  @include('Practice.footer')
