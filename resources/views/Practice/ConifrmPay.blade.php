@include('Practice.header')

    <!--Main layout-->
    <main class="main-body   ">
        <div class="container-fluid pe-xl-5 pe-0 ">

            <!-- main body content  -->
            <div class="heading ps-5 pe-5   pt-3 me-xxl-5 ">
                <div class="mt-5 border-bottom pb-2">
                    <h3 class="p-20 fw-bold text-dark">Confirm and Pay</h3>
                </div>
            </div>

            <div class="row my-3 ps-lg-5 pe-5   pt-3 me-xxl-5">
                <div class="col-xl-8 col-12">
                    <div class="card mb-5">
                        
                        <div class="card-body">
                            <h6 class="fw-bold pb-3 border-bottom">Your Booking</h6>
                            <div class="d-flex justify-content-between align-items-center flex-wrap my-4">
                                <div>
                                    <h6 class="m-0 p-14 fw-bold">Start Date</h6>
                                    <p class="m-0 p-12">2-01-2023</p>
                                </div>
                                <div>
                                    <a href="#" class=" btn btn-outline-dark btn-sm rounded rounded-pill " data-mdb-toggle="modal" data-mdb-target="#exampleModalStart" >Edit</a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center flex-wrap my-4 mb-0">
                                <div>
                                    <h6 class="m-0 p-14 fw-bold">End Date</h6>
                                    <p class="m-0 p-12">2-01-2023</p>
                                </div>
                                <div>
                                    <a href="#" class=" btn btn-outline-dark btn-sm rounded rounded-pill " data-mdb-toggle="modal" data-mdb-target="#exampleModalEnd">Edit</a>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    <div class="card paymentMethod mb-5">
                        
                        <div class="card-body">
                            <h6 class="fw-bold pb-3 border-bottom">Select Payment Methods</h6>
                          
                            <div class="mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                                    <label class="form-check-label ms-3" for="flexRadioDefault1"> 
                                    <div>
                                        <p class="m-0 p-14 fw-bold">Pay with Debit/Credit Card</p>
                                        <p class="m-0 p-12">Safe money transfer using your Debit/Credit Cards.</p>
                                    </div>    
                                    </label>
                                  </div>
                            </div>

                            <div class="ms-5  my-3 d-flex flex-wrap">
                                <div class="me-3">
                                    <button class="btn btn-sm paymentMode" style="height: 40px; width: 100px;" > <img src="./Assets/images/visa.png" alt=""> </button>
                                </div>
                                <div class="me-3">
                                    <button class="btn btn-sm paymentMode" style="height: 40px; width: 100px;" > <img src="./Assets/images/MasterCard.png" alt=""> </button>
                                </div>
                                <div class="me-3">
                                    <button class="btn btn-sm paymentMode" style="height: 40px; width: 100px;" > <img src="./Assets/images/sbi.png" alt=""> </button>
                                </div>
                                <div class="me-3">
                                    <button class="btn btn-sm paymentMode" style="height: 40px; width: 100px;" > <img src="./Assets/images/paypal.png" alt=""> </button>
                                </div>
                                <div class="me-3">
                                    <button class="btn btn-sm paymentMode" style="height: 40px; width: 100px;" > <img src="./Assets/images/Bajaj.png" alt=""> </button>
                                </div>
                            </div>

                            <div class="ms-5 my-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label fw-semibold ">Cardholder Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter cardholder name">
                                  </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label fw-semibold ">Card Number</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Card Number">
                                  </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label fw-semibold ">Expiry Date</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Expiry Date">
                                  </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label fw-semibold ">CVV Code</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter code">
                                  </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label fw-semibold " for="flexCheckDefault">Save my payment details for future purchases subscriptions.</label>
                                  </div>
                            </div>
                        </div>

                        
                    </div>

                    <div class="card  mb-5">
                        
                        <div class="card-body">
                            
                          
                            <div class="mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                                    <label class="form-check-label ms-3" for="flexRadioDefault1"> 
                                    <div>
                                        <p class="m-0 p-14 fw-bold">Pay with Net Banking</p>
                                        <p class="m-0 p-12">Safe money transfer using Net Banking.</p>
                                    </div>    
                                    </label>
                                  </div>
                            </div>

                            <div class="ms-5  my-3 mt-5 ">
                                <div>
                                    <p class="m-0 p-14 fw-bold">Popular Bank</p>
                                </div>

                                <div class="mt-3 d-flex flex-wrap">
                                    <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                                        <label class="form-check-label ms-2" for="flexRadioDefault1"> 
                                            <div class="d-flex align-items-center">
                                                <img src="./Assets/images/hdfc logo.png" alt="">
                                                <div class="fw-semibold ms-1">HDFC Bank</div>
                                            </div>   
                                        </label>
                                      </div>

                                      <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                                        <label class="form-check-label ms-2" for="flexRadioDefault1"> 
                                        <div class="d-flex align-items-center">
                                            <img src="./Assets/images/icici logo.png" alt="">
                                            <div class="fw-semibold ms-1">ICICI Bank</div>
                                        </div>    
                                        </label>
                                      </div>

                                      <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                                        <label class="form-check-label ms-2" for="flexRadioDefault1"> 
                                        <div class="d-flex align-items-center">
                                            <img src="./Assets/images/axis logo.png" alt="">
                                            <div class="fw-semibold ms-1">AXIS Bank</div>
                                        </div>    
                                        </label>
                                      </div>
                                      <div class="form-check me-4">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"/>
                                        <label class="form-check-label ms-2" for="flexRadioDefault1"> 
                                        <div class="d-flex align-items-center">
                                            <img src="./Assets/images/sbi logo.png" alt="">
                                            <div class="fw-semibold ms-1">SBI Bank</div>
                                        </div>    
                                        </label>
                                      </div>
                                </div>
                            </div>

                            <div class="ms-5 my-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label fw-semibold ">Cardholder Name</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Select other options</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                      </select>
                                  </div>

                                
                            </div>

                           
                        </div>

                        
                    </div>

                    <div class="card paymentMethod mb-5">
                        
                        <div class="card-body">
                            <h6 class="fw-bold pb-3 border-bottom">Cancellation Policy</h6>
                          
                           <div class="mt-4">
                            This reservation is non-refundable. <span class="fw-semibold" >Learn more</span>
                           </div>
                        </div>

                        
                    </div>
                </div>
                <div class="col-xl-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="fw-semibold border-bottom pb-3">Checkout Summary</h4>
                            <!-- <span class="border px-2 py-2 shadow-2 rounded-3"> <input type="date" class="border-0"> <img
                                src="./Assets/icons/right-arrow-solid.svg" alt="" style="width:10px"> <input type="date" class="border-0">
                            </span> -->
                           
                           

                            <div>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="m-0 fw-semibold" >Rate ($10 x 7days)</p>
                                    <p class="m-0 fw-bolder" >$70.00</p>
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="m-0 fw-semibold" >Travel fee</p>
                                    <p class="m-0 fw-bolder" >$40.00</p>
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="m-0 fw-semibold" >Service charge</p>
                                    <p class="m-0 fw-bolder" >$30.00</p>
                                </div>
                                <div class="d-flex justify-content-between my-2">
                                    <p class="m-0 fw-semibold" >Processing Fee (2%)</p>
                                    <p class="m-0 fw-bolder" >$20.00</p>
                                </div>
                                <div class="d-flex justify-content-between my-2 mt-4" >
                                    <p class="m-0 fw-bolder" >Total Payment:</p>
                                    <p class="m-0 fw-bolder" >$160.00</p>
                                </div>
                            </div>

                            <div class="mb-3 mt-4">
                                <button class="w-100 button button-bg button-color fw-semibold" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                  Pay Now
                                </button>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <<!-- PAy Now -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" >
          <div class="modal-content">
            
            <div class="modal-body">
                <div class="text-center m-auto">
                    <div>
                        <img src="{{ asset('Assets/images/paymentdone.png') }}" alt="">
                    </div>
                    <div>
                        <h5 class="fw-bold m-0" >Payment Done </h5>
                        <h2 class="fw-bolder" >Successfully </h2>
                    </div>
                </div>
                <div class="mb-3 mt-4 text-center ">
                    <button class="w-75 button button-bg button-color fw-semibold" >
                        Continue
                    </button>
                    
                  </div>
            </div>
           
          </div>
        </div>
      </div>

      <!-- Start Date -->
      <div class="modal fade" id="exampleModalStart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" >
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Start Date</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
            <form  onsubmit="return validate_start_date()">
               @csrf
            <div class="modal-body">
                <div class="text-center m-auto">
                <input type='date' class="form-control" name="start_date" id="start_date" />
                <span class="text-danger" id="start_dateError"></span>
                </div>
                
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="button button-bg button-color fw-semibold px-2 w-100" data-mdb-dismiss="modal" aria-label="Close">Save </button>
              </div>
          </div>
          </form>
        </div>
      </div>

      <!-- End Date -->
      <div class="modal fade" id="exampleModalEnd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" >
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">End Date</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
                <div class="text-center m-auto">
                    <input type="date" class="form-control" />
                </div>
               
            </div>
            <div class="modal-footer">
               
                <button type="button" class="button button-bg button-color fw-semibold px-2 w-100" data-mdb-dismiss="modal" aria-label="Close">Save </button>
              </div>
           
          </div>
        </div>
      </div>

  


</div>

<script>
    function validate_start_date(){
        var start_date = $('#start_date').val();

        if(start_date == ''){
            $('#start_dateError').html('Select Start Date');
            return false;
        }else{
            $('#start_dateError').html('');
        }
    }


    function validate_end_date(){
        var end_date = $('#end_date').val();

        if(end_date == ''){
            $('#end_dateError').html('Select End Date');
            return false;
        }else{
            $('#end_dateError').html('');
        }
    }

</script>

     
  @include('Practice.footer')


    
  