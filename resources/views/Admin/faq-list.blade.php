@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">FAQ</p>
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
        <a href="{{ route('openFAQ') }}"><button class="btn addbutton_testimonial mb-4">Add FAQ</button></a>
        </div>
    </div>
    <div class="row mx-0">
        <div class="col-lg-12 px-0">
        
            <table class="table table-bordered roboto_family text-center">   
                <tr>
                    <th>SNo.</th>
                    <th>Faq Heading</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                @foreach($faqlist as $fqa_data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$fqa_data->fqa_heading}}</td>
                    <td>{{$fqa_data->faq_description}}</td>
                    <td><a href="{{route('faqEdit', $fqa_data->id) }}" style="text-decoration:none;color:black;"><i class="fas fa-edit"></i></a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection

