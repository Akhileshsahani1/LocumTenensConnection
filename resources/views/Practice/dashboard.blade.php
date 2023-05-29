@include('Practice.header')


  <!--Main layout-->
  <main class="main-body ">
    <div class="container-fluid pe-xl-5 pe-0">
      <div class="row pt-5 ps-md-5 pe-md-5 pe-lg-0 pe-xxl-5 me-xxl-5 me-3 ">
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
          <div class=" rounded-3 small-card shadow-2 mb-lg-5 mb-sm-4 mb-3  ps-3 ">
            <div class="row py-1 circle-arrow">
              <div class="col-xl-9 col-lg-8 col-md-9 col-9 col py-2 ">
                <p class="p-14 mb-0 py-1 fw-semibold">Current bookings</p>
                <h5 class="fw-bold mb-0">100</h5>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-3 col-3 d-flex align-items-center justify-content-center ">
                <div>
                  <img src="{{asset('Assets/icons/arrow_empty_circle.svg')}}" alt="#" class="img-fluid off">
                  <img src="{{asset('Assets/icons/arrow_fill_circle.svg')}}" alt="#" class="img-fluid on">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
          <div class=" rounded-3 small-card shadow-2 mb-lg-5 mb-sm-4 mb-3 ps-3">
            <div class="row py-1 circle-arrow">
              <div class="col-xl-9 col-lg-8 col-md-9 col-9 col py-2 ">
                <p class="p-14 mb-0 py-1 fw-semibold">Current Dates Booked </p>
                <h5 class="fw-bold mb-0">20</h5>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-3 col-3 d-flex align-items-center justify-content-center">
                <div>
                  <img src="{{asset('Assets/icons/arrow_empty_circle.svg')}}" alt="#" class="img-fluid off">
                  <img src="{{asset('Assets/icons/arrow_fill_circle.svg')}}" alt="#" class="img-fluid on">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
          <div class=" rounded-3 small-card shadow-2 mb-lg-5 mb-sm-4 mb-3 ps-3 ">
            <div class="row py-1 circle-arrow">
              <div class="col-xl-9 col-lg-8 col-md-9 col-9 col py-2 ">
                <p class="p-14 mb-0 py-1 fw-semibold">Past Bookings</p>
                <h5 class="fw-bold mb-0">50</h5>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-3  col-3 d-flex align-items-center justify-content-center ">
                <div>
                <img src="{{asset('Assets/icons/arrow_empty_circle.svg')}}" alt="#" class="img-fluid off">
                <img src="{{asset('Assets/icons/arrow_fill_circle.svg')}}" alt="#" class="img-fluid on">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
          <div class="rounded-3 small-card shadow-2 mb-lg-5 mb-sm-4 mb-3 ps-3 ">
            <div class="row py-1 circle-arrow">
              <div class="col-xl-9 col-lg-8 col-md-9 col-9 col py-2 ">
                <p class="p-14 mb-0 py-1 fw-semibold">Documents and forms</p>
                <h5 class="fw-bold mb-0">266</h5>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-3  col-3 d-flex align-items-center justify-content-center">
                <div>
                <img src="{{asset('Assets/icons/arrow_empty_circle.svg')}}" alt="#" class="img-fluid off">
                <img src="{{asset('Assets/icons/arrow_fill_circle.svg')}}" alt="#" class="img-fluid on">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
          <div class="rounded-3 small-card shadow-2 mb-lg-5 mb-sm-4 mb-3 ps-3">
            <div class="row py-1 circle-arrow">
              <div class="col-xl-9 col-lg-8 col-md-9 col-9 col py-2 ">
                <p class="p-14 mb-0 py-1 fw-semibold">Pending Bookings</p>
                <h5 class="fw-bold mb-0">35</h5>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-3 col-3 d-flex align-items-center justify-content-center ">
                <div>
                  <img src="{{asset('Assets/icons/arrow_empty_circle.svg')}}" alt="#" class="img-fluid off">
                  <img src="{{asset('Assets/icons/arrow_fill_circle.svg')}}" alt="#" class="img-fluid on">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
          <div class=" rounded-3 small-card shadow-2 mb-lg-5 mb-sm-4 mb-3 ps-3 ">
            <div class="row py-1 circle-arrow">
              <div class="col-xl-9 col-lg-8 col-md-9 col-9 col py-2 ">
                <p class="p-14 mb-0 py-1 fw-semibold">Ratings and Review</p>
                <h5 class="fw-bold mb-0">4.5</h5>
              </div>
              <div class="col-xl-3 col-lg-4 col-md-3 col-3 d-flex align-items-center justify-content-center ">
                <div>
                  <img src="{{asset('Assets/icons/arrow_empty_circle.svg')}}" alt="#" class="img-fluid off">
                  <img src="{{asset('Assets/icons/arrow_fill_circle.svg')}}" alt="#" class="img-fluid on">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="heading ps-md-5 pe-md-5   pt-3 me-xxl-5 ">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-2">
          <h3 class="p-20 fw-bold">Current Dates Booked</h3>
          <span >
            <input type="text" name="daterange" class="border p-2 rounded-z" value="01/01/2023 - 01/15/2023" />
            <!-- <input type="date" class="border-0"> -->
            <!-- <img src="{{asset('Assets/icons/right-arrow-solid.svg')}}" alt="" style="width:10px">  -->

            <!-- <span></span> -->
            <!-- <input type="date" class="border-0"> -->
          </span>

        </div>

      </div>

      <div class="cards ps-md-5 pe-md-5   pt-3 me-xxl-5 ">
        <div class="row justify-content-evenly mt-5">
          
        @foreach ($posts as $a)
          <div class="col-xl-4 col-lg-6 col-12 my-3">
            <div class="pe-4">
              <div class="card" style="width: 100%;">
                <div class="card-header px-3">
                  <div class="row">
                    <div class="col-2">
                      <div class="">
                        <div class="border p-1 d-flex justify-content-center align-items-center ">
                          
                        @if(!empty($a->upload_Photo))
                        <img
                            src="{{asset('provider/uploads/upload_photo/'.$a->upload_Photo)}}" alt=""
                            style="width:100%; height: 100%; object-fit:fill;" class="rounded-circle">
                        @else
                        <img
                            src="{{asset('Assets/icons/user_default_img.svg')}}" alt=""
                            style="width:100%; height: 100%; object-fit:fill;">
                        @endif



                        </div>
                      </div>
                    </div>
                    <div class="col-10 my-auto">
                      <h3 class="p-16 mb-0 fw-bold">{{$a->practitioner_Type }}</h3>
                      <p class="p-12 mb-0 fw-semibold">
                        @if(!empty($a->professional_Experience))  
                      
                          {{ $a->professional_Experience }} years experience</p>

                        @endif
                    </div>


                  </div>
                </div>
                <ul class="list-group list-group-light list-group-small">
                  <li class="list-group-item px-3 p-12">
                    <p>{{ substr($a->description, 0,100) }} . . .</p>
                  </li>
                  <li class="list-group-item px-3">
                    <div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="{{asset('Assets/icons/card_icons/Group 3751.svg')}}" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">Position Type</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :  
                        </div>
                        <div class="col-5 p-14 fw-bold">
                        {{ $a->position_Type }}
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="{{asset('Assets/icons/card_icons//Icon material-date-range.svg')}}" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">Start Date</p>
                        </div>
                        <div class="col-2 fw-bold">
                          : 
                        </div>
                        <div class="col-5 p-14 fw-bold">
                        {{ $a->start_Date }}
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="{{asset('Assets/icons/card_icons/Icon material-date-range.svg')}}" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">End Date</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :
                        </div>
                        <div class="col-5 p-14 fw-bold">
                        {{ $a->end_Date}}
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="{{asset('Assets/icons/card_icons/Group 3769.svg')}}" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade"> Rate</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :
                        </div>
                        <div class="col-5 p-14 fw-bold">
                          ${{$a->average_Daily_Rate}}/day
                        </div>
                      </div>
                      <div class="row mb-1">
                        <div class="col-5 d-flex align-items-center">
                          <img src="{{asset('Assets/icons/card_icons/Group 3769.svg')}}" alt="#" class="me-2">
                          <p class="p-14 mb-0 text-fade">Average Rate</p>
                        </div>
                        <div class="col-2 fw-bold">
                          :
                        </div>
                        <div class="col-5 p-14 fw-bold">
                        ${{$a->average_hour_rate}}/hr
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="mt-3 mb-2 pt-1 d-flex justify-content-center border-top">
                  <a href="{{ route('personaldetails',$a->id )}}" class="button-bg btn-text  py-2 px-5 shadow card_button ">View Profile</a>
                </div>
              </div>
            </div>
          </div>
         @endforeach
        </div>
      </div>
    </div>

  </main>
  <!--Main layout-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body position-relative">
          <div class="text-center m-auto">
            <div class="logoutIcon">
              <img src="{{asset('Assets/images/logout icon.svg')}}" alt="">
            </div>
            <div style="height: 50px;">

            </div>
            <div>
              <h5 class="m-0 fw-semibold">Are you sure you want to logout?</h5>
            </div>
          </div>
          <div class="mb-3 mt-4 text-center  ">

            <a href="/logout" class=" button button-bg button-color fw-semibold px-5 mx-2 ">
              LOG OUT
            </a>

            <button class=" button  fw-semibold px-5 mx-2">
              CANCEL
            </button>

          </div>
        </div>

      </div>
    </div>
  </div>
 
  @include('Practice.footer')


