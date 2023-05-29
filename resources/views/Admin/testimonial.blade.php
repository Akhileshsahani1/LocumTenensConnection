@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">Testimonial</p>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-lg-3 px-0">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('error')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif


        </div>
    </div>
    <div class="row mx-0">

        <div class="col-lg-3 text-left">
        <a href="{{ route('addTestimonal') }}"><button class="btn addbutton_testimonial mb-4">Add Testimonial</button></a>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-lg-12 px-0">
        
            <table class="table table-bordered roboto_family text-center">   
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach($testimonial_data_display as $testmonial_data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$testmonial_data->name}}</td>
                    <td>{{$testmonial_data->designation}}</td>
                    <td><img src="{{ asset('Admin/testimonial/'.$testmonial_data->testimonial_image) }}" height="80" width="80" class="testimonial-img" alt=""></td>
                    <td><a href="{{route('testimonialEdit', $testmonial_data->id) }}" style="text-decoration:none;color:black;"><i class="fas fa-edit"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

