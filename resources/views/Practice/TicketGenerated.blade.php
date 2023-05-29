@include('Practice.header')

<body>
  <!--Main Navigation-->
  <header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 my-5">
          <a href="#" class=" border border-none btn-text navButton   ps-3 ">
            <li class="d-flex w-100 justify-content-start align-items-center">
              <img src="./Assets/icons/dashboard.svg" alt="" class="me-1" style="height: 15px; width: 15px" />
              Dashboard<span class="text">
                <i class="ms-5 fa-solid fa-right-long navIcon "></i>
              </span>
            </li>
          </a>
          <a href="#" class="btn border border-none btn-text navButton shadow-0 mt-3 text-start ps-md-3 ps-1">
            <li class="d-flex w-100 justify-content-start align-items-center">
              <img src="./Assets/icons/chat.svg" alt="" class="me-2" />Chat
            </li>
          </a>
          <a href="#" class="btn border border-none btn-text navButton shadow-0 mt-3 text-start ps-md-3 ps-1">
            <li class="d-flex w-100 justify-content-start align-items-center">
              <img src="./Assets/icons/setting.svg" alt="" class="me-2" />Setting
            </li>
          </a>
        
          <div class="dropdown mb-5">
            <button
              class=" dropdown-toggle btn border border-none btn-text navButton shadow-0 mt-3 text-start ps-md-3 ps-1 d-flex w-100 justify-content-start align-items-center "
              type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false"> <img
                src="./Assets/icons/T&C.svg" alt="" class="me-2" />Terms of service
            </button>
            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
              <li><a class="dropdown-item text-dark" href="#"> <img src="{{asset('Assets/icons/privacy_icon.svg')}}" alt=""
                    class="me-2" /> Privacy policy</a></li>
              <li><a class="dropdown-item text-dark" href="#"> <img src="{{asset('Assets/icons/Icon-payment.svg')}}" alt=""
                    class="me-2" /> Payment methods</a></li>
              <li><a class="dropdown-item text-dark" href="#"><img src="{{asset('Assets/icons/icon-libility.svg')}}" alt=""
                    class="me-2" /> Liability</a></li>
            </ul>
          </div>

        </div>
        <div class="">
          <div class="ps-md-3 ps-1 border-bottom fw-semibold mt-5 pt-4  ">
            <p class="m-0 mb-3">Recent</p>
          </div>
          <ul class="list-group px-3 ">
            <a href="#" class="btn border border-none btn-text  text-dark shadow-0 mt-5 text-start ps-md-3 ps-1"
              style="background-color: #F9F9F9">
              <li class="d-flex w-100 justify-content-start align-items-center p-12">
                Not recent updates
              </li>
            </a>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid gx-0">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Brand -->
        <a class="navbar-brand d-flex justify-content-center m-0" href="#" style="width: 240px;">
          <img src="{{asset('AssetS/logo.svg')}}" class="main-logo img-fluid" alt="profileImage" />
        </a>
        <!-- Search form -->

        <form class="d-noe d-flex input-group  ms-auto SearchForm me-4 d-none d-sm-flex">
          <input autocomplete="off" type="search" class="form-control rounded position-relative ps-5 "
            placeholder='Search Provider ...' style="min-width: 225px"> <span
            class="input-group-text border-0  position-absolute"><i class="fas fa-search"></i></span>
          <span class="input-group-text border-0 end-0 position-absolute dropdown-toggle  " role="button"
            id="dropdownMenuLink" data-mdb-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-filter d-none d-md-block me-2 "></i>
            <span class="d-none d-md-block">Filter</span>
          </span>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li>

              <div class="d-flex flex-wrap px-5">
                <div class="filter-item "><span>Location</span> <i class="bi bi-x-circle ms-1"></i></div>
                <div class="filter-item "><span>Start Date</span> <i class="bi bi-x-circle ms-1"></i></div>
                <div class="filter-item "><span>Position type</span> <i class="bi bi-x-circle ms-1"></i></div>
                <div class="filter-item "><span>Distance</span> <i class="bi bi-x-circle ms-1"></i></div>
                <div class="filter-item "><span>Primary</span> <i class="bi bi-x-circle ms-1"></i></div>
                <div class="filter-item "><span>Working hours</span> <i class="bi bi-x-circle ms-1"></i></div>
                <div class="filter-item "><span>Patient volume</span> <i class="bi bi-x-circle ms-1"></i></div>
                <div class="filter-item "><span>Willing to travel</span> <i class="bi bi-x-circle ms-1"></i></div>


              </div>
            </li>

          </ul>
          </input>

        </form>

        <!-- Right links -->
        <ul class="navbar-nav mx-auto d-flex flex-row">

          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  d-flex align-items-center" href="#" id="navbarDropdownMenuLink"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle border "
                height="30" alt="" loading="lazy" />
              <span class="px-3 d-none d-md-block"> ABC Dental Clinic</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">My profile</a></li>

              <li><a class="dropdown-item" href="#" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->

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
                          <a href="{{route('dashboard')}}" class="button btn-bg button-color fw-semibold px-5 mb-4">Go to Dashboard</a>
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
              <img src="./Assets/images/logout icon.svg" alt="">
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
