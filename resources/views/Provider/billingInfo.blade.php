@extends('layouts.main')
@section('main-section')
@push('title')
<title>BillingInfo</title>
@endpush

<main class="bg-img">
        <div class="container-fluid">
          <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
              <div class="col-lg-11 mx-auto">
                <div><img src="{{asset('provider/img/logo.svg') }}" style="width: 50px" alt="" /></div>
              </div>
            </nav>
          </div>
          <div class="container">
            <div class="row mt-5">
                <div class="col-lg-11 mx-auto">
                  <div class="row text-center mb-5">
                    <h1 class="blue-text">Billing Info</h1>
                    <h5 class="blue-text">Get your subscription fee waived when you are refereed by a member!</h5>
                    <p class="blue-text">Enter in your referrers name below the button and we will confirm their membership.</p>
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
                                    <label class="form-label font-12 gray-text">Credit Card Number</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control border-right-0" placeholder="Enter Card number">
                                      <span class="input-group-text"><i class="bi bi-credit-card-2-back"></i></span>
                                    </div>
                                  </div>
                                  <div class="row mb-3">
                                    <div class="col-lg-6 col-sm-6">
                                        <input type="text" class="form-control" placeholder="MM/YY">
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <input type="text" class="form-control" placeholder="CVC">
                                    </div>
                                  </div>
                                  <div class="my-4 px-5">
                                    <a href="billingInfo.html" class="btn btn-primary w-100">PAY $100.00</a>
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










