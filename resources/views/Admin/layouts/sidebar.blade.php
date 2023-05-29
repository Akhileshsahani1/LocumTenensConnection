 
<div class="sidebar">
    <div class="brand_logo m-auto">
        <img src="{{asset('Admin/images/logo.svg') }}" />
    </div>
    <ul id="navi" class="navbar-nav my-5 rubik_family">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('admindashboard')}}">
                <div class="nav_icon">
                    <img src="{{asset('Admin/images/dashboard_white.svg') }}" class="img-fluid white_icon d-none" />
                    <img src="{{asset('Admin/images/dashboard_gray.svg') }}" class="img-fluid gray_icon" />
                </div>
                <span> Dashboard</span>
                <div class="nav_arrow">
                    <img src="{{asset('Admin/images/arrow_right.svg') }}" class="img-fluid  arrow_icon ms-3" />
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('ResolutionsCases')}}">
                <div class="nav_icon">
                    <img src="{{asset('Admin/images/resolutions_white.svg') }}" class="img-fluid white_icon d-none" />
                    <img src="{{asset('Admin/images/resolutions_gray.svg') }}" class="img-fluid gray_icon" />
                </div>
                <span>Resolutions Cases</span>
                <div class="nav_arrow">
                    <img src="{{asset('Admin/images/arrow_right.svg') }}" class="img-fluid  arrow_icon ms-3" />
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('provider')}}">
                <div class="nav_icon">
                    <img src="{{asset('Admin/images/provider_white.svg') }}" class="img-fluid white_icon d-none" />
                    <img src="{{asset('Admin/images/provider_gray.svg') }}" class="img-fluid gray_icon" />
                </div>
                <span>Provider</span>
                <div class="nav_arrow">
                    <img src="{{asset('Admin/images/arrow_right.svg') }}" class="img-fluid  arrow_icon ms-3" />
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('practice')}}">
                <div class="nav_icon">
                    <img src="{{asset('Admin/images/practice_white.svg') }}" class="img-fluid white_icon d-none" />
                    <img src="{{asset('Admin/images/practice_gray.svg') }}" class="img-fluid gray_icon" />
                </div>
                <span>Practice</span>
                <div class="nav_arrow">
                    <img src="{{asset('Admin/images/arrow_right.svg') }}" class="img-fluid  arrow_icon ms-3" />
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="#">
                <div class="nav_icon">
                    <img src="{{asset('Admin/images/statistic_white.svg') }}" class="img-fluid white_icon d-none" />
                    <img src="{{asset('Admin/images/statistic_Gray.svg') }}" class="img-fluid gray_icon" />
                </div>
                <span>Statistic</span>
                <div class="nav_arrow">
                    <img src="{{asset('Admin/images/arrow_right.svg') }}" class="img-fluid  arrow_icon ms-3" />
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('allpages')}}">
                <div class="nav_icon">
                    <img src="{{asset('Admin/images/setting_white.svg') }}" class="img-fluid white_icon d-none" />
                    <img src="{{asset('Admin/images/setting_gray.svg') }}" class="img-fluid gray_icon" />
                </div>
                <span>Landing page</span>
                <div class="nav_arrow">
                    <img src="{{asset('Admin/images/arrow_right.svg') }}" class="img-fluid  arrow_icon ms-3" />
                </div>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{route('adminchangePassword')}}">
                <div class="nav_icon">
                    <img src="{{asset('Admin/images/setting_white.svg') }}" class="img-fluid white_icon d-none" />
                    <img src="{{asset('Admin/images/setting_gray.svg') }}" class="img-fluid gray_icon" />
                </div>
                <span>Setting</span>
                <div class="nav_arrow">
                    <img src="{{asset('Admin/images/arrow_right.svg') }}" class="img-fluid  arrow_icon ms-3" />
                </div>
            </a>
        </li>
    </ul>
    <!-- <div class="recent_list">
        <div class="heading">
            <p class="mb-2">RECENT</p>
        </div>
        <div class="gray_tag">
            <p class="mb-0">Not recent updates</p>
        </div>
    </div> -->
</div>
<script>  
$(document).ready(function(){
var path = window.location.href; 
	 
     $('#navi a').each(function() {
     
	 if (this.href === path) {
      
	  $(this).addClass('active');
      
	  }
    
	});

});
</script>  