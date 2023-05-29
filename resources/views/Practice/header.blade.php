
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{asset('Css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('Css/style.css')}}" />
  <link rel="stylesheet" href="{{asset('Css/css.css')}}" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
 


  <title>Dashboard</title>
</head>

<body>
  <!--Main Navigation-->
  <header>
   <!-- Sidebar -->

<nav id="sidebarMenu" class="d-lg-block sidebar  bg-white">
  <div class="position-sticky">
    <div class="sidebar-menu list-group  mx-3 my-5" >
      <a href="{{route('dashboard')}}" class="border border-none btn-text ps-3 ">
        <li class="d-flex w-100 justify-content-start align-items-center">
          <img src="{{asset('Assets/icons/dashboard.svg')}}" alt="" class="me-1" style="height: 15px; width: 15px" />
          Dashboard<span class="text">
            <i class="ms-5 fa-solid fa-right-long navIcon "></i>
          </span>
        </li>
      </a>
      <a href="{{route('chat')}}" class="btn border border-none btn-text shadow-0 mt-3 text-start ps-md-3 ps-1">
        <li class="d-flex w-100 justify-content-start align-items-center">
          <img src="{{asset('Assets/icons/chat.svg')}}" alt="" class="me-2" />Chat
        </li>
      </a>

      <a class="btn border border-none btn-text d-flex w-100 justify-content-start align-items-center ps-md-3 ps-1" data-mdb-toggle="collapse"
      href="#setting"
      role="button"
      aria-expanded="false"
      aria-controls="setting"><img src="{{asset('Assets/icons/setting.svg')}}" alt="" class="me-2" />Settings</a>
    <div class="collapse shadow p-3" id="setting">
      <a class="dropdown-item text-dark mb-2" href="{{ route('passwordchange') }}"> 
      <img src="{{ asset('Assets/icons/Icon feather-key.svg') }}" alt="" class="me-2" />Change Password</a>
      <a class="dropdown-item text-dark mb-2" href="#"> 
      <img src="{{ asset('Assets/icons/Icon awesome-chess-queen.svg') }}" alt="" class="me-2" /> Subscription</a>
      <a class="dropdown-item text-dark" href="{{ route('RaiseTicket') }}">
        <img src="{{ asset('Assets/icons/icon-libility.svg') }}" alt="" class="me-2" /> Raise Ticket</a>
    </div>
     
    <a class="btn border border-none btn-text d-flex w-100 justify-content-start align-items-center ps-md-3 ps-1" data-mdb-toggle="collapse"
      href="#service"
      role="button"
      aria-expanded="false"
      aria-controls="service"> <img src="./Assets/icons/T&C.svg" alt="" class="me-2" />Terms of service
    </a>
    <div class="collapse shadow p-3" id="service">
      <a class="dropdown-item text-dark" href="{{route('privacypolicy')}}">Privacy policy</a>
      <a class="dropdown-item text-dark" href="{{route('paymentmethods')}}"> Payment methods</a>
      <a class="dropdown-item text-dark" href="{{route('terms')}}">Term Of Service</a>
      <a class="dropdown-item text-dark" href="{{route('Liabilitys')}}">Liability</a>
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
        <a class="navbar-brand d-flex justify-content-center m-0" href="{{route('dashboard')}}" style="width: 240px;">
          <img src="{{asset('Assets/logo.svg')}}" class="main-logo img-fluid" alt="profileImage" />
        </a>
        <!-- Search form -->

        <form action="{{route('PracticeSearch')}}" method="POST"class="d-noe d-flex input-group  ms-auto SearchForm me-4 d-none d-sm-flex">
          @csrf
          <input autocomplete="off" id="srch"   name="search"

           
          class="form-control rounded position-relative ps-5 js-example-basic-multiple"
            style="min-width: 225px" multiple="multiple" > 
            <span class="input-group-text border-0  position-absolute">
              <i class="fas fa-search"></i>
          </span>
          <!-- placeholder="Search Provider.." -->
         

          <span id="filter" class="input-group-text border-0 end-0 position-absolute dropdown-toggle  " role="button"
         data-mdb-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-filter d-none d-md-block me-2 "></i>
        <span class="d-none d-md-block">Filter</span>
      </span>
  

     <div class=" d-flex1  align-items-center " id="searchss" style="margin-top: 6px;">
      <button type="submit" class="border-0 end-0 position-absolute dark-blue-bg text-white rounded-6 me-2  px-2  "
      >Search
     
</button>
     </div>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li>
              <div class="d-flex flex-wrap px-5">
                <div class="mx-2">
                  <input type="search" value="" name="location" onChange="handleChange()" placeholder="Location" class=" selectLocation border-0 px-2 filter-item mx-0" />
                </div>
                <div class="mx-2">
                  <input type="date" value="" name="startdate" onChange="handleChange()" class=" selectstartdate border-0 px-2 filter-item mx-0" />
                </div>
                <div class="mx-2">
                  <select name="providerType" id="practice_type" class=" selectPractice form-select form-select-sm filter-item border-0 px-2"
                    aria-label=".form-select-sm example" onChange="handleChange()" >
                    <option  value="" selected disabled>Provider type</option>
                    <option value="General Dentist">General Dentist</option>
                    <option value="Hygienist">Hygienist</option>
                    <option value="Endodontist">Endodontist</option>
                    <option value="Oral Surgeon">Oral Surgeon</option>
                    <option value="Orthodontist">Orthodontist</option>
                    <option value="Pedodontist">Pedodontist</option>
                    <option value="Prosthodontist">Prosthodontist</option>
                  </select>
                </div>
                <div class="mx-2">
                  <select name="distance" id="distance" onChange="handleChange()"  class=" selectDistance form-select form-select-sm filter-item border-0 px-2"
                    aria-label=".form-select-sm example">
                    <option value="" selected disabled>Distance</option>
                    <option value="0-50">0-50 miles</option>
                    <option value="50-100">50-100 miles</option>
                    <option value="100+">100+ miles</option>
                  </select>
                </div>
                <div class="mx-2">
                  <select name="position_types" id="position_types" onChange="handleChange()" class=" selectpositiontype form-select form-select-sm filter-item border-0 px-2"
                    aria-label=".form-select-sm example">
                    <option  value="" >Position type</option>
                    <option value="Temporary">Temporary</option>
                    <option value="Permanent">Permanent</option>
                  </select>
                </div>
                <div class="mx-2">
                  <select name="Working_hourss" id="Working_hourss" onChange="handleChange()"  class=" selectWorkingHours form-select form-select-sm filter-item border-0 px-2"
                    aria-label=".form-select-sm example">
                    <option value="">Working hours</option>
                    <option value="4-8">4-8 hours</option>
                    <option value="8+">8+ hours</option>
                  </select>
                </div>
                <div class="mx-2">
                  <select name="patient_val" onChange="handleChange()"  id="patient_val" class=" selectPatientVolume form-select form-select-sm filter-item border-0 px-2"
                    aria-label=".form-select-sm example">
                    <option value="">Patient volume</option>
                    <option value="1-10">1-10</option>
                    <option value="10-15">10-15</option>
                   
                  </select>
                </div>
                <div class="mx-2">
                  <select name="travel"  id="travel"  onChange="handleChange()" class="selectWillingtoRravel form-select form-select-sm filter-item border-0 px-2"
                    aria-label=".form-select-sm example">
                    <option value="">Willing to travel</option>
                    <option value="Yes">Yes</option>
                    <option value="NO">No</option>
                    
                  </select>
                </div>
               
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
              @if(!empty(Auth::user()->image))
              <img src="{{asset('Practiceprofile/'.Auth::user()->image)}}" class="rounded-circle border "
                height="30" alt="" loading="lazy" />
              @else
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle border "
                height="30" alt="" loading="lazy" />

              @endif

              <span class="px-3 d-none d-md-block">{{Auth::user()->firstName}}</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{ route('myprofile')}}">My profile</a></li>

              <li><a class="dropdown-item" href="{{ route('logout.practice') }}" >Logout</a>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>



    let newArr = []
    const handleChange = (e) => {
       
let data = {
  startdate : document.querySelector('.selectstartdate').value,
  location : document.querySelector('.selectLocation').value,
  Provider : document.querySelector('.selectPractice').value,
  distance  : document.querySelector('.selectDistance').value, 
  positionType  : document.querySelector('.selectpositiontype').value,
  WorkingHours: document.querySelector('.selectWorkingHours').value,
  WorkingHours: document.querySelector('.selectWorkingHours').value,
  PatientVolume: document.querySelector('.selectPatientVolume').value,
  willingtotravel: document.querySelector('.selectWillingtoRravel').value,
}

    
  
       newArr.push(data)

      //  document.getElementById('srch').innerText += JSON.stringify(data, null) + ',';

       const c = Object.keys(data).map((k) => {return data[k]}).join(" ");

       let newVal = document.getElementById("srch").value?.split(" ")
       var filtered = c?.split(" ")?.filter(function (el) {
  return el != "";
});

       document.getElementById('srch').value = filtered ;
 



      //  selectPractice form-select form-select-sm filter-item border-0 px-2

       
      
      
      
    }

     
 
    $(document).ready(function(){
      $("#searchss").hide();
 

      $("#filter").click(function(){
           $("#filter").hide();
           $("#searchss").show();
        });
 
   
});   


$(document).ready(function () {
$(".SearchForm .dropdown-menu").click(function (e) {
  e.stopPropagation();
})



});
$(document).ready(function(){
var path = window.location.href; 

     $('.sidebar-menu a').each(function() {

     if (this.href === path) {

      $(this).addClass('active');

      }

    });

});
  </script>
