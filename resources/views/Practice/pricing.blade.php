<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('Css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('Css/style.css') }}" />
  <title>Pricing</title>
</head>

<body>
  <main>
  <div class="">
      <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
          <div><img src="./Assets/logo.svg" style="width: 50px" alt="" /></div>
        </div>
      </nav>
      <div style="height: 90px;">

      </div>
      <div class="container">
        <div class="text-center">
          <h1 class="fw-bolder">Pricing</h1>
          <p class="font-20">We offer exlcusive access to our registry of certified Virginia Dental professionals for a
            low fee of <span class="fw-semibold">$100/month.</span> <br> <span class="fw-semibold">Save 25% when you
              purchase a Tier 2 annual subscription!</span> </p>
        </div>



        <div>

          <!-- Tabs navs -->
          <ul class="nav nav-price-tabs mb-3 justify-content-center my-4 mb-5" id="ex1" role="tablist">
            <li class="nav-price-item monthly-tab" role="presentation">
              <a class="nav-price-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="#ex1-tabs-1" role="tab"
                aria-controls="ex1-tabs-1" aria-selected="true">MONTHLY</a>
            </li>
            <li class="nav-price-item" role="presentation">
              <a class="nav-price-link" id="ex1-tab-2" data-mdb-toggle="tab" href="#ex1-tabs-2" role="tab"
                aria-controls="ex1-tabs-2" aria-selected="false"> ANNUALLY</a>
            </li>

          </ul>
          <!-- Tabs navs -->

          <!-- Tabs content -->
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade  show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <div class="d-md-flex row justify-content-between align-items-center">
                <div class="col-xl-4 col-lg-5 mb-2">
                  <div class="position-relative">
                    <h1 class="ribbon">
                      <strong class="ribbon-content">TIER 1</strong>
                   </h1>
                    <div class="crown overflow-auto">
                      <img src="./Assets/images/crown.png" class="img-fluid" alt="">
                    </div>
                    <div class="card overflow-hidden " >
                      <div class="card-body  px-1 text-center">
                       
                        <div class=" py-2">
                          <img src="{{ asset('Assets/images/pricing.png')  }}" class="img-fluid" alt="">
                        </div>
                        
                       <div style="height: 100px;"></div>
                        <div class="mt-2 mb-0" >
                          <p class="m-0  lh-sm">Best Choice for booking temporary assistance for your practice.</p>
                        </div>
                        <div class="my-2">
                          <h6  class="my-1 m-0 fw-bold">
                            Provider Daily Booking Fee
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">$120 min. hourly fee</p>
                        </div>
    
                        <div>
                          <p class="m-0 fw-bold">Cancellations</p>
                          <div class="d-flex justify-content-center ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">48 hours in advance: 75% refund</p>
                          </div>
                          <div class="d-flex justify-content-center ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">48 hours in advance: 25% refund</p>
                          </div>
                        </div>
                        <div class="my-3">
                          <h6  class="my-1 m-0 fw-bold">
                            Provider Daily Travel Fee:
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">$150  <span class="text-dark" >(fully refundable)</span> </p>
                        </div>
                        <div class="my-2">
                          <h6  class="my-1 m-0 fw-bold">
                            CWT Daily Referral Fee:
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">20% of total booking   <span class="text-dark" >(non - refundable)</span> </p>
                        </div>
    
                        <div class="my-3 d-flex justify-content-center" >
                         <div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">24/7 Access to CDC Platform</p>
                          </div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">Benefit #2</p>
                          </div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">Benefit #3</p>
                          </div>
                         </div>
                        </div>
                        <div style="height: 30px;">
    
                        </div>
                        <div class="price-circle100">
                          <div class="sky-blue-bg  rounded-circle d-flex justify-content-center align-items-center" style="height: 150px; width: 150px;">
                            <div
                            class="bg-white rounded-circle d-flex justify-content-center align-items-center" style="height: 140px; width: 140px;"
                            >
                          <div class="dark-blue-bg text-white rounded-circle d-flex justify-content-center align-items-center fw-bold p-20 p-1" style="height: 120px; width: 120px;" >
                            $100 month
                          </div>
                        </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 mb-5 ">
                  <div class="position-relative mt-5">
                    <h1 class="ribbon">
                      <strong class="ribbon-content">TIER 2</strong>
                   </h1>
                    <div class="crown overflow-auto">
                      <img src="{{asset('Assets/images/crown.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="card overflow-hidden " >
                      <div class="card-body  px-1 text-center">
                       
                        <div class=" py-2">
                          <img src="{{asset('Assets/images/pricing.png')}}" class="img-fluid" alt="">
                        </div>
    
                        
                        <div style="height: 100px;"></div>
                        <div class="mt-2 mb-0" >
                          <p class="m-0  lh-sm">Best Choice for booking temporary assistance for your practice.</p>
                        </div>
                        <div class="my-2">
                          <h6  class="my-1 m-0 fw-bold">
                            Provider Daily Booking Fee
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">$120 min. hourly fee</p>
                        </div>
    
                        <div>
                          <p class="m-0 fw-bold">Cancellations</p>
                          <div class="d-flex justify-content-center ">
                            <img src="{{asset('Assets/images/Icon ionic-ios-checkmark-circle.svg')}}" alt="">
                            <p class="m-0 ms-2">48 hours in advance: 75% refund</p>
                          </div>
                          <div class="d-flex justify-content-center ">
                            <img src="./Assets/images/Icon ionic-ios-checkmark-circle.svg" alt="">
                            <p class="m-0 ms-2">48 hours in advance: 25% refund</p>
                          </div>
                        </div>
                        <div class="my-3">
                          <h6  class="my-1 m-0 fw-bold">
                            Provider Daily Travel Fee:
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">$150  <span class="text-dark" >(fully refundable)</span> </p>
                        </div>
                        <div class="my-2">
                          <h6  class="my-1 m-0 fw-bold">
                            CWT Daily Referral Fee:
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">20% of total booking   <span class="text-dark" >(non - refundable)</span> </p>
                        </div>
    
                        <div class="my-3 d-flex justify-content-center" >
                         <div>
                          <div class="d-flex  ">
                            <img src="{{asset('Assets/images/Icon ionic-ios-checkmark-circle.svg')}}" alt="">
                            <p class="m-0 ms-2">24/7 Access to CDC Platform</p>
                          </div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">Benefit #2</p>
                          </div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">Benefit #3</p>
                          </div>
                         </div>
                        </div>
                        <div style="height: 30px;">
    
                        </div>
                        <div class="price-circle100">
                          <div class="sky-blue-bg  rounded-circle d-flex justify-content-center align-items-center" style="height: 150px; width: 150px;">
                            <div
                            class="bg-white rounded-circle d-flex justify-content-center align-items-center" style="height: 140px; width: 140px;"
                            >
                          <div class="dark-blue-bg text-white rounded-circle d-flex justify-content-center align-items-center fw-bold p-20 p-1" style="height: 120px; width: 120px;" >
                            $75 <br> month
                          </div>
                        </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 mb-2">
                  <div class="card " style="">
                    <div class="card-header">
                      <h2 class="fw-bold">Confirm Billing Info.</h2>
                    </div>
                    <div class="card-body">
                     
                      <div class="text-input mb-3">
                        <input type="text" id="formControlLg" class="form-control" placeholder="Enter Clinic" />
                        <label class="text-input-label" for="formControlLg">Clinic</label>
                        <span class="input-icon"
                          ><i class="bi bi-person-fill"></i
                        ></span>
                      </div>
                      <div class="text-input mb-3">
                        <input type="email" id="formControlLg" class="form-control" placeholder="Enter email id" />
                        <label class="text-input-label" for="formControlLg">Email ID</label>
                        <span class="input-icon"
                          ><i class="bi bi-envelope-fill"></i
                        ></span>
                      </div>
 
                      <div class="mb-3">
                        <label class="custom-radio blue-text">
                            <span>Tier 1</span> <small class="font-12 fw-semibold d-block">$100.00/month</small>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom-radio blue-text">
                            <span>Tier 2</span> <small class="font-12 fw-semibold d-block">$900.00/month</small>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="my-3 pt-3">
                        <div class="text-input mb-3">
                          <input type="text" id="formControlLg" class="form-control" placeholder="XXX XXX XXXXXXXX" />
                          <label class="text-input-label" for="formControlLg">Credit Card Number</label>
                          
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="text-input mb-3">
                              <input type="text" id="formControlLg" class="form-control" placeholder="MM/YY" />
                              <label class="text-input-label" for="formControlLg">MM/YY</label>
                              
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="text-input mb-3">
                              <input type="text" id="formControlLg" class="form-control" placeholder="CVC" />
                              <label class="text-input-label" for="formControlLg">CVC</label>
                             
                            </div>
                          </div>
                        </div>
  
                        <div class="mb-3 text-center">
                          <button
                            class="w-75 button button-bg button-color fw-semibold"
                          >
                          PAY <span>$100.00</span>
                          </button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                
                
               
               
               
              </div>
              <div style="height: 100px;" >

              </div>
            </div>
            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
              <div class="d-md-flex row justify-content-between align-items-center">
                <div class="col-xl-4 col-lg-5 mb-2">
                  <div class="position-relative">
                    <h1 class="ribbon">
                      <strong class="ribbon-content">TIER 1</strong>
                   </h1>
                    <div class="crown overflow-auto">
                      <img src="{{ asset('Assets/images/crown.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="card overflow-hidden " >
                      <div class="card-body  px-1 text-center">
                       
                        <div class=" py-2">
                          <img src="{{ asset('Assets/images/pricing.png') }}" class="img-fluid" alt="">
                        </div>
                        
                       <div style="height: 100px;"></div>
                        <div class="mt-2 mb-0" >
                          <p class="m-0  lh-sm">Best Choice for booking temporary assistance for your practice.</p>
                        </div>
                        <div class="my-2">
                          <h6  class="my-1 m-0 fw-bold">
                            Provider Daily Booking Fee
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">$120 min. hourly fee</p>
                        </div>
    
                        <div>
                          <p class="m-0 fw-bold">Cancellations</p>
                          <div class="d-flex justify-content-center ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">48 hours in advance: 75% refund</p>
                          </div>
                          <div class="d-flex justify-content-center ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">48 hours in advance: 25% refund</p>
                          </div>
                        </div>
                        <div class="my-3">
                          <h6  class="my-1 m-0 fw-bold">
                            Provider Daily Travel Fee:
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">$150  <span class="text-dark" >(fully refundable)</span> </p>
                        </div>
                        <div class="my-2">
                          <h6  class="my-1 m-0 fw-bold">
                            CWT Daily Referral Fee:
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">20% of total booking   <span class="text-dark" >(non - refundable)</span> </p>
                        </div>
    
                        <div class="my-3 d-flex justify-content-center" >
                         <div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">24/7 Access to CDC Platform</p>
                          </div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">Benefit #2</p>
                          </div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">Benefit #3</p>
                          </div>
                         </div>
                        </div>
                        <div style="height: 30px;">
    
                        </div>
                        <div class="price-circle100">
                          <div class="sky-blue-bg  rounded-circle d-flex justify-content-center align-items-center" style="height: 150px; width: 150px;">
                            <div
                            class="bg-white rounded-circle d-flex justify-content-center align-items-center" style="height: 140px; width: 140px;"
                            >
                          <div class="dark-blue-bg text-white rounded-circle d-flex justify-content-center align-items-center fw-bold p-20 p-1" style="height: 120px; width: 120px;" >
                            $100 month
                          </div>
                        </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 mb-5 ">
                  <div class="position-relative mt-5">
                    <h1 class="ribbon">
                      <strong class="ribbon-content">TIER 2</strong>
                   </h1>
                    <div class="crown overflow-auto">
                      <img src="./Assets/images/crown.png" class="img-fluid" alt="">
                    </div>
                    <div class="card overflow-hidden " >
                      <div class="card-body  px-1 text-center">
                       
                        <div class=" py-2">
                          <img src="{{ asset('Assets/images/pricing.png') }}" class="img-fluid" alt="">
                        </div>
    
                        
                        <div style="height: 100px;"></div>
                        <div class="mt-2 mb-0" >
                          <p class="m-0  lh-sm">Best Choice for booking temporary assistance for your practice.</p>
                        </div>
                        <div class="my-2">
                          <h6  class="my-1 m-0 fw-bold">
                            Provider Daily Booking Fee
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">$120 min. hourly fee</p>
                        </div>
    
                        <div>
                          <p class="m-0 fw-bold">Cancellations</p>
                          <div class="d-flex justify-content-center ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">48 hours in advance: 75% refund</p>
                          </div>
                          <div class="d-flex justify-content-center ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">48 hours in advance: 25% refund</p>
                          </div>
                        </div>
                        <div class="my-3">
                          <h6  class="my-1 m-0 fw-bold">
                            Provider Daily Travel Fee:
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">$150  <span class="text-dark" >(fully refundable)</span> </p>
                        </div>
                        <div class="my-2">
                          <h6  class="my-1 m-0 fw-bold">
                            CWT Daily Referral Fee:
                          </h6>
                          <p class="m-0  sky-blue-color fw-semibold">20% of total booking   <span class="text-dark" >(non - refundable)</span> </p>
                        </div>
    
                        <div class="my-3 d-flex justify-content-center" >
                         <div>
                          <div class="d-flex  ">
                            <img src="{{asset('Assets/images/Icon ionic-ios-checkmark-circle.svg')}}" alt="">
                            <p class="m-0 ms-2">24/7 Access to CDC Platform</p>
                          </div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">Benefit #2</p>
                          </div>
                          <div class="d-flex  ">
                            <img src="{{ asset('Assets/images/Icon ionic-ios-checkmark-circle.svg') }}" alt="">
                            <p class="m-0 ms-2">Benefit #3</p>
                          </div>
                         </div>
                        </div>
                        <div style="height: 30px;">
    
                        </div>
                        <div class="price-circle100">
                          <div class="sky-blue-bg  rounded-circle d-flex justify-content-center align-items-center" style="height: 150px; width: 150px;">
                            <div
                            class="bg-white rounded-circle d-flex justify-content-center align-items-center" style="height: 140px; width: 140px;"
                            >
                          <div class="dark-blue-bg text-white rounded-circle d-flex justify-content-center align-items-center fw-bold p-20 p-1" style="height: 120px; width: 120px;" >
                            $75 <br> month
                          </div>
                        </div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 mb-2">
                  <div class="card " style="">
                    <div class="card-header">
                      <h2 class="fw-bold">Confirm Billing Info.</h2>
                    </div>
                    <div class="card-body">
                     
                      <div class="text-input mb-3">
                        <input type="text" id="formControlLg" class="form-control" placeholder="Enter Clinic" />
                        <label class="text-input-label" for="formControlLg">Clinic</label>
                        <span class="input-icon"
                          ><i class="bi bi-person-fill"></i
                        ></span>
                      </div>
                      <div class="text-input mb-3">
                        <input type="email" id="formControlLg" class="form-control" placeholder="Enter email id" />
                        <label class="text-input-label" for="formControlLg">Email ID</label>
                        <span class="input-icon"
                          ><i class="bi bi-envelope-fill"></i
                        ></span>
                      </div>
 
                      <div class="mb-3">
                        <label class="custom-radio blue-text">
                            <span>Tier 1</span> <small class="font-12 fw-semibold d-block">$100.00/billed annually</small>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <span class="checkmark"></span>
                          </label>
                          <label class="custom-radio blue-text">
                            <span>Tier 2</span> <small class="font-12 fw-semibold d-block">$900.00/billed annually</small>
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <span class="checkmark"></span>
                          </label>
                      </div>
                      <div class="my-3 pt-3">
                        <div class="text-input mb-3">
                          <input type="text" id="formControlLg" class="form-control" placeholder="XXX XXX XXXXXXXX" />
                          <label class="text-input-label" for="formControlLg">Credit Card Number</label>
                          
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="text-input mb-3">
                              <input type="text" id="formControlLg" class="form-control" placeholder="MM/YY" />
                              <label class="text-input-label" for="formControlLg">MM/YY</label>
                              
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="text-input mb-3">
                              <input type="text" id="formControlLg" class="form-control" placeholder="CVC" />
                              <label class="text-input-label" for="formControlLg">CVC</label>
                             
                            </div>
                          </div>
                        </div>
  
                        <div class="mb-3 text-center">
                          <button
                            class="w-75 button button-bg button-color fw-semibold"
                          >
                          PAY <span>$100.00</span>
                          </button>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
                
                
               
               
               
              </div>
              <div style="height: 100px;" >
            </div>

          </div>
          <!-- Tabs content -->


        </div>
      </div>
    </div>
    </div>
  </main>

  <script src="{{ asset('Js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('Js/script.js') }}"></script>
</body>

</html>