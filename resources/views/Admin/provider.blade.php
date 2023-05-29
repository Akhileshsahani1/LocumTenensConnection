@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 px-0 commn_title_header">
            <p class="mb-2">Provider</p>
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
    <div class="row table_wrapper provider_table_wrapper px-2">
        <div class="col-lg-12 px-0  table-responsive">
            <table class="table text-center roboto_family" id="provider">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">S.No.</th>
                        <th scope="col" class="text-center">Provider's Name</th>
                        <th scope="col" class="text-center">Expertise</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Contect Number</th>
                        <th scope="col" class="text-center">Average rate</th>
                        <th scope="col" class="text-center">Subscription</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="table_body ">
                    @foreach($provider_data as $provider)
                    <tr class="align-middle">
                        <td scope="row">{{  $loop->iteration }}.</td>
                        <td>{{$provider->firstName}} {{$provider->lastName}}</td>
                        <td>{{$provider->practitioner_Type}}</td>
                        <td>{{$provider->email}}</td>
                        <td>{{$provider->phone}}</td>
                        <td>{{$provider->average_Daily_Rate}} / Per Day</td>
                        <td><span class="badge rounded-pill skyblue_pill">Monthly</span></td>
                        <td>
                            <div class="dropdown dropedown_wrapper table_dropedown">
                                <button class="btn btm_white dropdown-toggle" type="button" id="dropdownMenuButton2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('Admin/images/vertical_dots.svg')}}" />
                                </button>
                                <ul class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item"
                                            href="{{route('getProviderDetailsById', $provider->id) }}">View</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" id="displayProviderdata{{ $loop->iteration }}"
                                            data-url="{{ route('getProviderDetailsJson', $provider->id) }}"
                                            class="dropdown-item">Edit</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#suspendModal{{  $loop->iteration }}">Suspend</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#deleteProvider{{  $loop->iteration }}"
                                            href="javascript:void(0)">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- suspend provider modal -->

                    <div class="modal fade" id="suspendModal{{  $loop->iteration }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  ">
                            <div class="modal-content logout_modal_content">
                                <div class="modal-body login_form logout_modal py-5">
                                    <div class="row">
                                        <div class="col-lg-12 text-center mb-3">
                                            <p class="mb-2 heading">Suspend Provider</p>
                                            <p class="sub_heading">Are you sure you want to suspend
                                                this provider</p>
                                        </div>

                                        <div class="col-12 text-center">
                                            <a href="{{ route('ProviderSuspend',  $provider->id) }}">
                                                <button type="submit"
                                                    class="btn new_btn_commn_sm  me-3">Yes</button></a>
                                            <button type="submit" class="btn btn_gray_commn_sm"
                                                data-bs-dismiss="modal">CANCEL</button>
                                        </div>

                                    </div>
                                    <div class="stroke">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end suspend modal -->

                    <!-- delete Provider modal -->
                    <div class="modal fade" id="deleteProvider{{  $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content logout_modal_content">
                                <div class="modal-body login_form logout_modal py-5">
                                    <div class="row">
                                        <div class="col-lg-12 text-center mb-3">
                                            <p class="mb-2 heading">Delete Provider</p>
                                            <p class="sub_heading">Are you sure you want to delete this provider</p>
                                        </div>
                                        <div class="col-12 text-center">
                                            <a href="{{ route('DeleteProvider',  $provider->id) }}">
                                                <button type="submit"
                                                    class="btn new_btn_commn_sm  me-3">Yes</button></a>
                                            <button type="submit" class="btn btn_gray_commn_sm"
                                                data-bs-dismiss="modal">CANCEL</button>
                                        </div>
                                    </div>
                                    <div class="stroke">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end delete provider modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade edit_modal_wrapper" id="editModalProvider" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-0">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Provider Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-0">
                    <p class="text-success" id="submit_succes"></p>
                    <form class="edit_modal_form mb-4" method="post">
                        @csrf
                        <div class="mb-3 control-group">
                            <label for="exampleInput" class="form-label">Provider First Name</label>
                            <input type="text" class="form-control" name="firstName" id="firstName"
                                aria-describedby="emailHelp" placeholder="First Name" maxlength="30">
                            <span id="firstNameError" class="text-danger"> </span>
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="mb-3 control-group">
                            <label for="exampleInput" class="form-label">Provider Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName"
                                aria-describedby="emailHelp" placeholder="Last Name" maxlength="30">
                            <span id="lastNameError" class="text-danger"> </span>
                        </div>
                        <div class="mb-3 control-group">
                            <label for="exampleInput" class="form-label">Expertise </label>
                            <input type="text" class="form-control" name="practitioner_Type" id="practitioner_Type"
                                placeholder="Orthodontist" maxlength="100"> 
                            <span id="practitioner_TypeError" class="text-danger"> </span>
                        </div>
                        <div class="mb-3 control-group">
                            <label for="exampleInputemail" class="form-label">Email ID </label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter email id">
                            <span id="emailError" class="text-danger"> </span>
                        </div>
                        <div class="mb-3 control-group">
                            <label for="exampleInput" class="form-label">Contact number </label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                placeholder="Enter phone number" maxlength="12">
                            <span id="phoneError" class="text-danger"> </span>
                        </div>
                        <div class="mb-3 control-group">
                            <label for="exampleInput" class="form-label">Average rate</label>
                            <input type="text" class="form-control" name="average_Daily_Rate" id="average_Daily_Rate"
                                placeholder="$100.00" maxlength="10">
                            <span id="average_Daily_RateError" class="text-danger"> </span>
                        </div>
                    </form>
                    <div class="text-center">
                        <button type="button" class="btn new_btn_commn_lg" id="update_data">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end edit modal -->


    <script>
    $(document).ready(function() {
        $('#provider').DataTable({
            searching: true, 
            paging: true, 
            bInfo : false,
            bLengthChange: true,
            ordering:false
             
            });
    });
    </script>
    <!-- edit provider -->

    @foreach($provider_data as $provider)
    <script type="text/javascript">
    $(document).ready(function() {
        $('#displayProviderdata{{ $loop->iteration }}').on('click', function() {
            var userurl = $(this).data('url');
            $.ajax({
                url: userurl,
                type: "GET",
                cache: false,
                success: function(data) {
                    $('#editModalProvider').modal('show');
                    $('#firstName').val(data.firstName);
                    $('#lastName').val(data.lastName);
                    $('#practitioner_Type').val(data.practitioner_Type);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#average_Daily_Rate').val(data.average_Daily_Rate);
                    $('#id').val(data.id);
                }
            });
        });


        $('#update_data').click(function() {
            var id = $('#id').val();
            var firstName = $('#firstName').val();
            var lastName = $('#lastName').val();
            var practitioner_Type = $('#practitioner_Type').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var average_Daily_Rate = $('#average_Daily_Rate').val();
            if (firstName == '') {
                $('#firstNameError').html('First Name field is required');
                return false
            } else {
                $('#firstNameError').html('');
            }
            if(firstName.length > 20){
                $('#firstNameError').html('First Name length must be max 20 character');
                return false
            }else{
                $('#firstNameError').html('');
            }
            if (lastName == '') {
                $('#lastNameError').html('Last Name field is required');
                return false
            } else {
                $('#lastNameError').html('');
            }
            if (lastName.length > 20) {
                $('#lastNameError').html('Last Name length must be max 20 character');
                return false
            } else {
                $('#lastNameError').html('');
            }

            if (practitioner_Type == '') {
                $('#practitioner_TypeError').html('Expertise field is required');
                return false
            } else {
                $('#practitioner_TypeError').html('');
            }
            if (email == '') {
                $('#emailError').html('Email field is required');
                return false
            } else {
                $('#emailError').html('');
            }
            if (phone == '') {
                $('#phoneError').html('Phone field is required');
                return false
            } else {
                $('#phoneError').html('');
            }
            if (phone.length > 12) {
                $('#phoneError').html('Phone must be max 12 digits');
                return false
            } else {
                $('#phoneError').html('');
            }
            if (isNaN(phone)) {
                $('#phoneError').html('Text Can not enter in phone field');
                return false;
            } else {
                $('#phoneError').html('');
            }
            if (average_Daily_Rate == '') {
                $('#average_Daily_RateError').html('Average Daily Rate field is required');
                return false
            } else {
                $('#average_Daily_RateError').html('');
            }


            $.ajax({
                url: window.location.origin + '/Admin/provider-details-update/' + id,
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    firstName: $('#firstName').val(),
                    lastName: $('#lastName').val(),
                    practitioner_Type: $('#practitioner_Type').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    average_Daily_Rate: $('#average_Daily_Rate').val()
                },
                success: function(response) {
                    if (response.status == 200) {
                        // alert(response.message);
                        // $('#editModal1').modal('hide');
                        $("#submit_succes").html("Provider Update Successfully!");
                    } else {
                        // alert(response.error);
                    }
                }
            });
        });

    });


    
    </script>
    @endforeach
    @endsection