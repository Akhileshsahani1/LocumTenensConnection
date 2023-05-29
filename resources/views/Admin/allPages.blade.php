@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
<div class="card">
            <div class="card-header border-bottom">
              <h5 class="mb-0 py-3">Landing Page Sections</h5>
            </div>
            <div class="table-responsive">
              <table class="table table-hover table-nowrap mb-0 align-middle">
                <thead class="table-light">
                  <tr>
                    <th style="width:5%;" class="ps-3">SNo</th>
                    <th>Section Name</th>
                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="width:5%;" class="ps-3">1</td>
                    <td>
                        <i class="bi bi-shield-check me-2"></i>
                        <span class="text-heading font-semibold">Top Banner</span>
                    </td>
                    <td class="text-end">
                        @if(!empty($banner->id))
                            <a href="{{ route('editBanner', $banner->id) }}" class="btn btn-success">Edit</a>
                        @else
                            <a href="{{ route('banner') }}" class="btn btn-primary">Add</a>
                        @endif
                    </td>
                  </tr>
                  <tr>
                  <td style="width:5%;" class="ps-3">2</td>
                    <td>
                        <i class="bi bi-shield-check me-2"></i>
                        <span class="text-heading font-semibold">Our mission</span>
                    </td>
                    <td class="text-end">
                        @if(!empty($ourmission->id))
                            <a href="{{route('editMission', $ourmission->id) }}" class="btn btn-success">Edit</a>
                        @else
                            <a href="{{route('our-mission') }}" class="btn btn-primary">Add</a>
                        @endif
                    </td>
                  </tr>
                  <tr>
                  <td style="width:5%;" class="ps-3">3</td>
                    <td>
                        <i class="bi bi-shield-check me-2"></i>
                        <span class="text-heading font-semibold">About Us</span>
                    </td>
                    <td class="text-end">
                        @if(!empty($aboutus->id))
                            <a href="{{route('editAboutUs', $aboutus->id) }}" class="btn btn-success">Edit</a>
                        @else
                            <a href="{{route('aboutUs') }}" class="btn btn-primary">Add</a>
                        @endif
                    </td>
                  </tr>
                  <tr>
                  <td style="width:5%;" class="ps-3">4</td>
                    <td>
                        <i class="bi bi-shield-check me-2"></i>
                        <span class="text-heading font-semibold">Testinomial</span>
                    </td>
                    <td class="text-end">
                            <a href="{{route('testimonialpageLoad') }}" class="btn btn-success">Edit</a>
                    </td>
                  </tr>
                  <tr>
                  <td style="width:5%;" class="ps-3">5</td>
                    <td>
                        <i class="bi bi-shield-check me-2"></i>
                        <span class="text-heading font-semibold">Frequently Asked Questions (FAQ)</span>
                    </td>
                    <td class="text-end">
                            <a href="{{route('faqList') }}" class="btn btn-success">Edit</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    
</div>
@endsection