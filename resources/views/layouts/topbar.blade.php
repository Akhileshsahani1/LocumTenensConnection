<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow px-4">
    <button class="btn d-md-none me-3" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>
    <h4 class="mb-0">Provider portal</h4>

<ul class="navbar-nav ms-auto">
        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ asset('provider/uploads/upload_photo')}}/{{$user->upload_Photo}}">
            
                <span class="d-none d-lg-inline small mx-2">{{$user->firstName}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('profile.get') }}">Profile</a>
                <a class="dropdown-item" href="{{ route('provider.logout') }}" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Logout</a>
            </div>
        </li>
    </ul>
</nav>
 

