@extends('layouts.main')
@section('main-section')
@push('title')
<title>Change Password</title>
@endpush
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
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0">Change Password</h4>
                </div>
                <div class="row">
                    <div class="col-lg-4 px-4 mt-4">
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
                        <form action="{{ route('provider.passwordChange') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="old_password" class="form-label font-12 blue-text">Current Password</label>
                                <div class="input-group">
                                    <input type="password" id="old_password" name="old_password" value=""
                                        class="form-control" maxlength="25">
                                    <span class="input-group-text bg-white"><i id="eye"
                                            class="bi bi-eye-slash-fill"></i></span>
                                </div>
                                @if ($errors->has('old_password'))
                                <span class="text-danger">{{ $errors->first('old_password') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="new_password" class="form-label font-12 blue-text">New Password</label>
                                <div class="input-group">
                                    <input type="password" id="new_password" name="new_password" class="form-control" maxlength="25">
                                    <span class="input-group-text bg-white"><i id="eye1"
                                            class="bi bi-eye-slash-fill"></i></span>
                                </div>
                                @if ($errors->has('new_password'))
                                <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="confirm_password" class="form-label font-12 blue-text">Confirm New
                                    Password</label>
                                <div class="input-group">
                                    <input type="password" id="confirm_password" name="confirm_password"
                                        class="form-control" maxlength="25">
                                    <span class="input-group-text bg-white"><i id="eye2"
                                            class="bi bi-eye-slash-fill"></i></span>
                                </div>
                                @if ($errors->has('confirm_password'))
                                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                            <button type="submit" name="currentPasswordSave"
                                class="btn btn-primary col-lg-4">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function() {
    const togglePassword = document.querySelector("#eye");
    const password = document.querySelector("#old_password");
    togglePassword.addEventListener("click", function() {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";

        const eye = togglePassword.getAttribute("class")
        if (eye == "bi bi-eye-slash-fill") {
            togglePassword.setAttribute("class", "bi bi-eye-fill");
        } else if (eye == "bi bi-eye-fill") {
            togglePassword.setAttribute("class", "bi bi-eye-slash-fill");
        } else {
            togglePassword.setAttribute("class", "bi bi-eye-slash-fill");
        }

        password.setAttribute("type", type);
    });



    const togglePassword1 = document.querySelector("#eye1");
    const password1 = document.querySelector("#new_password");
    togglePassword1.addEventListener("click", function() {
        // toggle the type attribute
        const type = password1.getAttribute("type") === "password" ? "text" : "password";

        const eye1 = togglePassword1.getAttribute("class")
        if (eye1 == "bi bi-eye-slash-fill") {
            togglePassword1.setAttribute("class", "bi bi-eye-fill");
        } else if (eye1 == "bi bi-eye-fill") {
            togglePassword1.setAttribute("class", "bi bi-eye-slash-fill");
        } else {
            togglePassword1.setAttribute("class", "bi bi-eye-slash-fill");
        }

        password1.setAttribute("type", type);
    });


    const togglePassword2 = document.querySelector("#eye2");
    const password2 = document.querySelector("#confirm_password");
    togglePassword2.addEventListener("click", function() {
        // toggle the type attribute
        const type = password2.getAttribute("type") === "password" ? "text" : "password";

        const eye2 = togglePassword2.getAttribute("class")
        if (eye2 == "bi bi-eye-slash-fill") {
            togglePassword2.setAttribute("class", "bi bi-eye-fill");
        } else if (eye2 == "bi bi-eye-fill") {
            togglePassword2.setAttribute("class", "bi bi-eye-slash-fill");
        } else {
            togglePassword2.setAttribute("class", "bi bi-eye-slash-fill");
        }

        password2.setAttribute("type", type);
    });






});
</script>