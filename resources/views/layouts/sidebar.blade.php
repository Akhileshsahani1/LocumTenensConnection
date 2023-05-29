<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionExample">
    <div class="sidebar-brand d-flex align-items-center justify-content-center mb-4">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('provider/img/logo.svg') }}" style="width: 50px;height:50px;" alt="">
        </div>
</div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('provider.dashboard')}}">
            <i class="bi bi-columns-gap"></i>
            <span>Dashboard</span> <i class="fa fa-long-arrow-right pt-1" style="float:right;"></i></a>
    </li>
   <li class="nav-item">
        <a class="nav-link" href="{{ route('provider.Chat') }}">
            <i class="bi bi-chat-right-text"></i>
            <span>Chat</span> <i class="fa fa-long-arrow-right pt-1" style="float:right;"></i></a>
    </li>

        <li class="nav-item" data-bs-toggle="collapse" data-bs-target="#setting">
            <a class="nav-link" id="ggg">
                <i class="bi bi-gear"></i>
                <span>Setting</span>
            </a>
        </li>
        <div id="setting" class="collapse px-2">
                <a href="{{ route('provider.changePassword') }}" class="sub-link d-block mb-2 px-2"><i class="fa fa-key me-2"></i> Change Password</a>
                <a href="#" class="sub-link d-block mb-2 px-2"><i class="fa fa-diamond me-2"></i> Subsciption</a>
                <a href="{{ route('provider.raiseTicket') }}" class="sub-link d-block px-2"><i class="bi bi-ticket-detailed me-2"></i> Raise Ticket</a>
        </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('provider.availability') }}">
            <i class="bi bi-calendar2-check"></i>
            <span>Availability</span> <i class="fa fa-long-arrow-right pt-1" style="float:right;"></i></a>
    </li>
</ul>