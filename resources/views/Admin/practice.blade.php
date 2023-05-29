@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 px-0  commn_title_header">
            <p class="mb-2">Practices</p>
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
            <table class="table text-center roboto_family" id="practice">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">S.No.</th>
                        <th scope="col" class="text-center">Practice's Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Contect Number</th>
                        <th scope="col" class="text-center">Subscription</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="table_body">
                    @foreach($practice_data as $practice)
                    <tr class="align-middle">
                        <td scope="row">{{ $loop->iteration }}.</td>
                        <td>{{ $practice->firstName }} {{ $practice->lastName }} </td>
                        <td>{{ $practice->email }}</td>
                        <td>{{ $practice->phoneNumber }}</td>
                        <td><span class="badge rounded-pill navy_pill">Monthly</span></td>
                        <td>
                            <div class="dropdown dropedown_wrapper table_dropedown">
                                <button class="btn btm_white dropdown-toggle" type="button" id="dropdownMenuButton3"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="./images/vertical_dots.svg" />
                                </button>
                                <ul class="dropdown-menu px-2" aria-labelledby="dropdownMenuButton2">
                                    <li><a class="dropdown-item"
                                            href="{{ route('getPracticeDataById',$practice->id )}} ">View</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)"
                                            data-url="{{ route('getPracticeDetailsJson', $practice->id) }}"
                                            id="displayPracticedata{{ $loop->iteration }}">Edit</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)"
                                            data-bs-toggle="modal" data-bs-target="#suspendPracticeModal{{ $loop->iteration }}">Suspend</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#deletePractice{{ $loop->iteration }}">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <!-- suspend provider modal -->

                    <div class="modal fade" id="suspendPracticeModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  ">
                            <div class="modal-content logout_modal_content">
                              
                                <div class="modal-body login_form logout_modal py-5">
                                    <div class="row">
                                        <div class="col-lg-12 text-center mb-3">
                                            <p class="mb-2 heading">Suspend Practice</p>
                                            <p class="sub_heading">Are you sure you want to suspend this Practice</p>
                                        </div>
                                        <div class="col-12 text-center">
                                        <a href="{{ route('PracticeSuspend',  $practice->id) }}">
                                             <button type="submit" class="btn new_btn_commn_sm  me-3">Yes</button>
                                        </a>
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
                    <!-- delete practice modal -->

                    <div class="modal fade" id="deletePractice{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered  ">
                            <div class="modal-content logout_modal_content">
                                <div class="modal-body login_form logout_modal py-5">
                                    <div class="row">
                                        <div class="col-lg-12 text-center mb-3">
                                            <p class="mb-2 heading">Delete Practice</p>
                                            <p class="sub_heading">Are you sure you want to delete this Practice</p>
                                        </div>
                                        <div class="col-12 text-center">
                                        <a href="{{ route('DeletePractice',  $practice->id) }}">
                                            <button type="submit" class="btn new_btn_commn_sm  me-3"
                                                >Yes</button>
                                        </a>
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
                    <!-- end delete practice modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade edit_modal_wrapper" id="updatePractice" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header px-0">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Practice Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-0">

                <span class="text-success mb-2" id="success_message"></span>

                    <form class="edit_modal_form mt-2 mb-4" method="post">
                        @csrf
                        <div class="mb-3 control-group">
                            <label for="practice_first_name" class="form-label">Practice First Name</label>
                            <input type="text" class="form-control" name="firstName" id="firstName"
                                aria-describedby="emailHelp" placeholder="Miller Davis" maxlength="30">
                            <span id="firstNameError" class="text-danger"></span>
                            <input type="hidden" name="id" id="id">
                        </div>
                        <div class="mb-3 control-group">
                            <label for="practice_last_name" class="form-label">Practice Last Name</label>
                            <input type="text" class="form-control" name="lastName" id="lastName"
                                aria-describedby="emailHelp" placeholder="Miller Davis" maxlength="30">
                            <span id="lastNameError" class="text-danger"></span>
                        </div>

                        <div class="mb-3 control-group">
                            <label for="email" class="form-label">Email ID </label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Enter email Id">
                            <span id="emailError" class="text-danger"></span>

                        </div>
                        <div class="mb-3 control-group">
                            <label for="contactNumber" class="form-label">Contact number </label>
                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber"
                                placeholder="Enter phone number" maxlength="12">
                            <span id="phoneNumberError" class="text-danger"></span>

                        </div>
                    </form>
                    <div class="text-center">
                        <button type="button" class="btn new_btn_commn_lg" id="update_practice_details">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end edit modal -->
</div>

<!-- modal popup -->
@section('scripts')
<script>
$(document).ready(function() {
    $('#practice').DataTable({
        searching: true, 
        paging: true, 
        bInfo : false,
        bLengthChange: true,
        ordering:false,
    });
});
</script>
@foreach($practice_data as $practice)
<script type="text/javascript">
$(document).ready(function() {
    $('#displayPracticedata{{ $loop->iteration }}').click(function() {
        var userurl = $(this).data('url');
        $.ajax({
            url: userurl,
            type: "GET",
            cache: false,
            success: function(data) {
                $('#updatePractice').modal('show');
                $('#firstName').val(data.firstName);
                $('#lastName').val(data.lastName);
                $('#email').val(data.email);
                $('#phoneNumber').val(data.phoneNumber);
                $('#id').val(data.id);
            }
        });
    });
});
</script>
<!-- update provider -->

<script type="text/javascript">
$(document).ready(function() {
    $('#update_practice_details').click(function() {
        var id = $('#id').val();
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var email = $('#email').val();
        var phoneNumber = $('#phoneNumber').val();

        if (firstName == '') {
            $('#firstNameError').html('First Name field is required ');
            return false;
        } else {
            $('#firstNameError').html('');
        }
        if (firstName.length > 20) {
            $('#firstNameError').html('First Name field must be max 20 character');
            return false;
        } else {
            $('#firstNameError').html('');
        }


        if (lastName == '') {
            $('#lastNameError').html('Last Name field is required ');
            return false;
        } else {
            $('#lastNameError').html('');
        }

        if (lastName.length > 20) {
            $('#lastNameError').html('Last Name field must be max 20 character');
            return false;
        } else {
            $('#lastNameError').html('');
        }

        if (email == '') {
            $('#emailError').html('Email field is required ');
            return false;
        } else {
            $('#emailError').html('');
        }

        if (phoneNumber == '') {
            $('#phoneNumberError').html('Phone field is required ');
            return false;
        } else {
            $('#phoneNumberError').html('');
        }

        if (isNaN(phoneNumber)) {
            $('#phoneNumberError').html('Phone field only digits allow');
            return false;
        } else {
            $('#phoneNumberError').html('');
        }

        if (phoneNumber.length > 12) {
            $('#phoneNumberError').html('Phone Number must be max 12 digits');
            return false;
        } else {
            $('#phoneNumberError').html('');
        }

        if (isNaN(phoneNumber)) {
            $('#phoneNumberError').html('String Can not enter in phone field');
            return false;
        } else {
            $('#phoneNumberError').html('');
        }

        $.ajax({
            url: window.location.origin + '/Admin/practice-details-update/' + id,
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                firstName: $('#firstName').val(),
                lastName: $('#lastName').val(),
                email: $('#email').val(),
                phoneNumber: $('#phoneNumber').val()
            },
            success: function(response) {
                if (response.status == 200) {
                    $("#success_message").html(response.message);
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
@endsection