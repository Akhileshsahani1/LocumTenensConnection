@extends('layouts.main')
@section('main-section')
@push('title')
<title>ConfirmAccount</title>
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
                    <h1 class="blue-text">Pricing</h1>
                    <h5 class="blue-text">Add your bank account for direct deposit payments.</h5>
                    <p class="blue-text">We make getting paid a no-hassle process by processing your earnings without the need to repeatedly arrange payments with individual practices.</p>
                  </div>
                  <div class="col-lg-6 mx-auto">
                    <div class="card border-radius-42 border-0">
                        <div class="card-header border-radiustop-42 bg-white p-4">
                            <h2 class="blue-text">Confirm Bank Account!</h2>
                            <p class="blue-text">Fill out the form below to receive payouts directly to your account.</p>
                        </div>
                        <div class="card-body px-4">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label font-12 gray-text">Account Holder</label>
                                    <input type="text" class="form-control" placeholder="Enter Account Holder">
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label font-12 gray-text">Account Type</label>
                                    <select class="form-select">
                                        <option>select</option>
                                        <option>Saving</option>
                                        <option>Current</option>
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label font-12 gray-text">Routing Number</label>
                                    <input type="text" class="form-control" placeholder="Enter routing number">
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label font-12 gray-text">Account Number</label>
                                    <input type="text" class="form-control" placeholder="Enter Account Number">
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                                    <label class="form-check-label blue-text font-12" for="flexCheckChecked">
                                        I attest that i am the owner and have full authorization to this bank account.
                                    </label>
                                  
                                  <div class="my-4 px-5">
                                    <a href="billingInfo.html" class="btn btn-primary w-100">Continue</a>
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
