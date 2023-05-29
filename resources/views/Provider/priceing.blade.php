@extends('layouts.main')
@section('main-section')
@push('title')
<title>pricing</title>
@endpush

<main class="bg-img">
        <div class="container-fluid">
          <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
              <div class="col-lg-11 mx-auto">
                <div><img src="{{ asset('provider/img/logo.svg') }}" style="width: 50px" alt="" /></div>
              </div>
            </nav>
          </div>
          <div class="container">
            <div class="row mt-5">
                <div class="col-lg-11 mx-auto">
                  <div class="row text-center mb-5">
                    <h1 class="blue-text">Pricing</h1>
                    <h5 class="blue-text">PAY the subscription fee:</h5>
                    <p class="blue-text">We offer exlcusive placement on our registry of certified Virginia dentist professionals for a low fee of <b>$20/month.</b> </p>
                  </div>
                  <div class="col-lg-6 mx-auto">
                    <div class="card border-radius-42 border-0">
                        <div class="card-header border-radiustop-42 bg-white p-4">
                            <h2 class="blue-text">Confirm Billing Info.</h2>
                        </div>
                        <div class="card-body px-4">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label font-12 gray-text">Username</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control border-right-0" placeholder="Enter Username">
                                      <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label font-12 gray-text">Email ID</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control border-right-0" placeholder="Enter Email ID">
                                      <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label font-12 gray-text">Name of Locum Tenum Referral (Optional)</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control border-right-0" placeholder="Enter Name">
                                      <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label class="custom-radio blue-text">
                                        <span>Tier 1</span> <small class="font-12 fw-semibold d-block">$100.00/month</small>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <span class="checkmark"></span>
                                      </label>
                                      <label class="custom-radio blue-text">
                                        <span>Tier 2</span> <small class="font-12 fw-semibold d-block">$900.00/billed annually</small>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <span class="checkmark"></span>
                                      </label>
                                  </div>
                                  <div class="my-4 px-5">
                                    <a href="billingInfo.html" class="btn btn-primary w-100">Proceed</a>
                                  </div>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        </main>

@endsection










