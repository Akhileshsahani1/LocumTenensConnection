@include('Practice.header')

 
 
  <!--Main layout-->
  <main class="main-body   ">
    <div class="container-fluid ps-0 px-5 mob-p-0">
      <div class="mb-4">
          <div class="row align-items-center mt-5">
              <div class="col-lg-4 mx-auto mt-5 pt-5">
                  <div class="card text-center border-0 shadow mt-5">
                      <div class="card-body p-0">
                          <img src="{{asset('Assets/images/ticketGenreted.png')}}"/>
                          <h5 class="fw-bold" >Ticket Generate Successfully</h5>
                          <p class="font-12">Your ticket generate successfully!<br> Our Team contact you soon</p>
                          <button class="button button-bg button-color fw-semibold px-5 mb-4"><a href="{{route('dashboard')}}">Go to Dashboard</a></button>
                      </div>
                  </div>
              </div>
              
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
              <h5 class="m-0 fw-semibold">Are you sure you want to log out?</h5>
            </div>
          </div>
          <div class="mb-3 mt-4 text-center  ">

            <button class=" button button-bg button-color fw-semibold px-5 mx-2 ">
              LOG OUT
            </button>

            <button class=" button  fw-semibold px-5 mx-2">
              CANCEL
            </button>

          </div>
        </div>

      </div>
    </div>
  </div>
   
 
 
@include('Practice.footer')