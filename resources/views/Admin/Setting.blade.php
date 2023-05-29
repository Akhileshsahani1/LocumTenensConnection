@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 py-5">
    <div class="row mb-5 mx-0">
        <div class="col-lg-12 commn_title_header px-0">
            <p class="mb-3">Change Password</p>
        </div>
    </div>
    <div class="row mx-0">
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
        <div class="col-lg-3 px-0">

            <form class="login_form" action="{{ route('updatePassword') }}" onclick="return validate()" method="post">
                @csrf
                <div class="mb-41 form_filed">
                    <label for="exampleInputPassword1" class="form-label">Current Password</label>
                    <div class="position-relative mb-3">
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Enter current password">
                        <span class="add-icon"><i class="fas fa-eye-slash" aria-hidden="true" id="togglePassword1"></i></span> 
                    </div>
                        
                    <lable id="passerror" class="text-danger"><label>
                </div>
                <div class="mb-41 form_filed">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <div class="position-relative mb-3">
                    <input type="password" class="form-control" name="newpassword" id="newpassword"
                        placeholder="Enter new password">
                        <span class="add-icon"><i class="fas fa-eye-slash" aria-hidden="true" id="togglePassword2"></i></span> 
                    </div>
                    <lable id="newpasserror" class="text-danger"><label>
                </div>
                <div class="mb-41 form_filed">
                    <label for="exampleInputPassword1" class="form-label">Confirm New Password</label>
                    <div class="position-relative mb-3">
                    <input type="password" class="form-control" name="cnewpassword" id="cnewpassword"
                        placeholder="Confirm new password">
                        <span class="add-icon"><i class="fas fa-eye-slash" aria-hidden="true" id="togglePassword3"></i></span> 
                    </div>
                    <lable id="cnewpasserror" class="text-danger"><label>
                </div>

                <button type="submit" class="btn btn_commn_sm mb-4">Save</button>
            </form>
        </div>
    </div>
</div>

<script>
function validate() {
    var password = $('#password').val();
    var newpassword = $('#newpassword').val();
    var cnewpassword = $('#cnewpassword').val();
    //var pattern = /^(?=.*[A-Z]) (?=.*[a-z])(?=.*\d)(?=.*[@$#!%*?&])[A-Za-z0-9\d@$#!%*?&]{8,25}$/;
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z0-9\d@$!%*?&]{8,25}$/;

    if (password == '') {
        $('#passerror').html('Password field is required');
        return false;
    } else {
        $('#passerror').html(' ');
    }
    if (newpassword == '') {
        $('#newpasserror').html('New Password field is required');
        return false;
    } else {
        $('#newpasserror').html('');
    }

    if (newpassword.length < 8) {
        $('#newpasserror').html('Password length must be less than 8 digits');
        return false;
    } else {
        $('#newpasserror').html('');
    }


    if (regex.exec(newpassword) == null) {
        $('#newpasserror').html('New Password must be contain as aK1@1234');
        return false;
    } else {
        $('#newpasserror').html('');
    }

    if (cnewpassword == '') {
        $('#cnewpasserror').html('Confirm Password field is required');
        return false;
    } else {
        $('#cnewpasserror').html('');
    }
    if (cnewpassword.length < 8) {
        $('#cnewpasserror').html('Password length must be less than 8 digits');
        return false;
    } else {
        $('#cnewpasserror').html('');
    }

    if (regex.exec(cnewpassword) == null) {
        $('#cnewpasserror').html('Confrim New Password must be contain as aK1@1234');
        return false;
    } else {
        $('#cnewpasserror').html('');
    }

    if (newpassword != cnewpassword) {

        $('#cnewpasserror').html('Password and confrim Password Does Not Match');
        return false;
    }
}
</script>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->

<script>
const togglePassword = document.querySelector("#togglePassword1");
const password = document.querySelector("#password");
togglePassword.addEventListener("click", function() {
    // toggle the type attribute
    const type = password.getAttribute("type") === "password" ? "text" : "password";

    const eye = togglePassword.getAttribute("class")
    if (eye == "fas fa-eye-slash") {
        togglePassword.setAttribute("class", "fas fa-eye");
    } else if (eye == "fas fa-eye") {
        togglePassword.setAttribute("class", "fas fa-eye-slash");
    } else {
        togglePassword.setAttribute("class", "fas fa-eye-slash");
    }

    password.setAttribute("type", type);
});



const togglePassword2 = document.querySelector("#togglePassword2");
const newpassword = document.querySelector("#newpassword");
togglePassword2.addEventListener("click", function() {
    // toggle the type attribute
    const type = newpassword.getAttribute("type") === "password" ? "text" : "password";

    const eye = togglePassword2.getAttribute("class")
    if (eye == "fas fa-eye-slash") {
        togglePassword2.setAttribute("class", "fas fa-eye");
    } else if (eye == "fas fa-eye") {
        togglePassword2.setAttribute("class", "fas fa-eye-slash");
    } else {
        togglePassword2.setAttribute("class", "fas fa-eye-slash");
    }

    newpassword.setAttribute("type", type);
});


const togglePassword3 = document.querySelector("#togglePassword3");
const cnewpassword = document.querySelector("#cnewpassword");
togglePassword3.addEventListener("click", function() {
    // toggle the type attribute
    const type = cnewpassword.getAttribute("type") === "password" ? "text" : "password";

    const eye = togglePassword3.getAttribute("class")
    if (eye == "fas fa-eye-slash") {
        togglePassword3.setAttribute("class", "fas fa-eye");
    } else if (eye == "fas fa-eye") {
        togglePassword3.setAttribute("class", "fas fa-eye-slash");
    } else {
        togglePassword3.setAttribute("class", "fas fa-eye-slash");
    }

    cnewpassword.setAttribute("type", type);
});




</script>


@endsection