@extends('layouts.main')
@section('main-section')
@push('title')
<title>Ticket Generate</title>
@endpush

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
       
        @include('layouts.sidebar')

        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            @include('layouts.topbar')

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid px-5 mob-p-0">
                    <div class="mb-4">
                        <div class="row align-items-center mt-5">
                            <div class="col-lg-4 mx-auto mt-5">
                                <div class="card text-center border-0 shadow mt-5">
                                    <div class="card-body">
                                        <img src="{{ asset('provider/img/ticket-success.png') }}"/>
                                        <h5>Ticket Generate Successfully</h5>
                                        <p class="font-12">Your ticket generate successfully!<br> Our Team contact you soon</p>
                                        <a href="{{route('provider.dashboard')}}" class="btn btn-primary px-5 mb-4">Go to Deshboard</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
</body>







@endsection

