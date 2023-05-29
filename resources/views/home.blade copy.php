<!DOCTYPE html>
<html>
  <head>
    <title>Locum tenese</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous" />
    <link href="{{asset('Admin/css/custm_style.css') }}" rel="stylesheet" />
  </head>
  <body>
    <div class="container-fluid bg_wrapper">
      <div class="row header_wrapper py-3">
        <div class="col-lg-12 text-center">
          <img src="{{ asset('Admin/images/logo.svg') }}" />
        </div>
      </div>
      <div class="row cards_wrapper justify-content-center align-items-center">
        <div class="col-lg-3 py-3 px-2">
          <div class="card card_inner">
            <div class="card-body">
              <div class="card_content">
                <h3 class="card-title">Admin</h5>
                <a href="{{route('login')}}" class="btn btn_commn">Click Here</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 py-3 px-2">
          <div class="card card_inner">
            <div class="card-body">
              <div class="card_content">
                <h3 class="card-title">Practice</h5>
                <a href="{{route('practice.home')}}" class="btn btn_commn">Click Here</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 py-3 px-2">
          <div class="card card_inner">
            <div class="card-body">
              <div class="card_content">
                <h3 class="card-title">Provider</h5>
                <a href="{{ route('index') }}" class="btn btn_commn">Click Here</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</html>
