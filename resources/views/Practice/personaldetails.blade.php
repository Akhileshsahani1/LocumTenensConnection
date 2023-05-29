@include('Practice.header')
<style>
#start_date-error {
    color: red
}

#end_date-error {
    color: red
}
</style>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<!--Main layout-->
<main class="main-body   ">
    <div style="height: 200px;">
        <img src="{{asset('Assets/images/img_prsn_page.png')}}" alt="" class="img-fluid" style="height: 100%;">
    </div>
    <div class="container-fluid pe-xl-5 pe-0  ps-lg-5">


        <div class="d-flex position-relative mb-5">

        @if(!empty($users->upload_Photo))
            <div class="border bg-white rounded-circle p-1 position-absolute"
                style="width: 190px; height: 190px; top:-60px;"> <img
                    src="{{ asset('provider/uploads/upload_photo/'.$users->upload_Photo) }}" alt=""
                    style="width:100%; height: 100%; object-fit:fill;" class="rounded-circle">
            </div>
        @else
        <div class="border bg-white rounded-circle p-1 position-absolute"
                style="width: 190px; height: 190px; top:-60px;"> <img
                    src="{{ asset('provider/img/profile.png') }}" alt=""
                    style="width:100%; height: 100%; object-fit:fill;" class="rounded-circle">
        </div>
        @endif
            <div class=" person_name">

           
                <h3 class="p-30  fw-bold ">{{$users->practitioner_Type }} </h3>
                <span class=" px-3 bg-white py-1 shadow-2 rounded-2">
                    <span class="p-14 mb-0 fw-semibold">{{$users->professional_Experience}} years experience</span>
                </span>
            </div>
        </div>

        <div class="">
            <!-- Tabs navs -->
            <ul class="nav nav-tabs mb-3 pt-4 " id="ex-with-icons" role="tablist"
                style="border-bottom: 1px solid #c4c4c4;">
                <li class="nav-item " role="presentation">
                    <a class="nav-link active text-dark" id="ex-with-icons-tab-1" data-mdb-toggle="tab"
                        href="#ex-with-icons-tabs-1" role="tab" aria-controls="ex-with-icons-tabs-1"
                        aria-selected="true"><i class="fas fa-chart-pie fa-fw me-2"></i>Personal Details</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#ex-with-icons-tabs-2"
                        role="tab" aria-controls="ex-with-icons-tabs-2" aria-selected="false"><i
                            class="fas fa-chart-line fa-fw me-2"></i>Reviews</a>
                </li>

            </ul>
            <!-- Tabs navs -->

            <!-- Tabs content -->
            <div class="tab-content" id="ex-with-icons-content">
                <div class="tab-pane fade show active" id="ex-with-icons-tabs-1" role="tabpanel"
                    aria-labelledby="ex-with-icons-tab-1">
                    <div class="row">
                        <div class="col-xl-8 col-12">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h4 class="fw-semibold">Personal Details</h4>
                                    <div>
                                        <p class="m-0 p-12 opacity-50 lh-sm">
                                            {{ $users->description }}
                                        </p>
                                    </div>
                                    <div class="my-3">
                                        <div class="row ">
                                            <div class="col-md-7">
                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Position type</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">{{$users->position_Type}}
                                                    </div>
                                                </div>

                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Availability Start Date</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">{{$users->start_Date}}
                                                    </div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">End Date</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">{{$users->end_Date}}</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Primary Handedness</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">
                                                        {{$users->primary_Handedness}}</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Distance to travel</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">
                                                        {{$users->distance_Willing_To_Travel_One_Way}}</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Daily working hours</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">
                                                        {{$users->peferred_Daily_Working_Hours}}</div>
                                                </div>

                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Daily patient volume</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">
                                                        {{$users->preferred_Daily_Patient_Volume}}</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Experience</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">
                                                        {{$users->professional_Experience}}</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Preferred Region</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">
                                                        {{$users->preferred_Region}}</div>
                                                </div>
                                                <div class="row my-3">
                                                    <div class="col-6 fw-semibold">Rate per hour</div>
                                                    <div class="col-auto">:-</div>
                                                    <div class="col-4 fw-semibold opacity-50">
                                                        ${{$users->average_hour_rate}}</div>
                                                </div>

                                            </div>
                                            <div class="col-md-5"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  
                                          $digreelicence = explode(',', $users->advanced_Degree_Licences);
                                                     
                                                       
                                        ?>
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h4 class="fw-semibold">Advanced Degree Licenses</h4>

                                    <div class="my-3">
                                        <div class="row ">
                                            <div class="col-md-7 d-flex justify-content-between ">

                                                @foreach($digreelicence as $licence)
                                                <div>
                                                    <div class="my-4">
                                                        <img src="{{asset('Assets/images/2205242_college_course_degree_education_university_icon.png')}}"
                                                            alt="">
                                                        <span class="ms-2 fw-semibold">{{ $licence }} </span>
                                                    </div>
                                                </div>

                                                @endforeach

                                            </div>
                                            <div class="col-md-5"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fw-semibold">Checkout Summary</h4>
                                    <!-- <span class="border px-2 py-2 shadow-2 rounded-3"> <input type="date" class="border-0"> <img
                                            src="./Assets/icons/right-arrow-solid.svg" alt="" style="width:10px"> <input type="date" class="border-0">
                                        </span> -->
                                    <form action="{{route('PracticeHire')}}" method='POST' id="registration" autocomplete="off">
                                        @csrf
                                        <div class="border px-1 py-2 row">

                                            <div class="col-lg-6 border-end text-center">
                                                <div class="p-10
                                                ">Start Date</div>
                                                <input type="text" name="start_date" id="start_date"
                                                    class=" border-0 form-control">
                                            </div>

                                            <div class="col-lg-6 text-center">
                                                <div class="p-10
                                                ">End Date</div>
                                                <input type="text" name="end_date" id="end_date"  onclick="myFunction()"
                                                    class=" border-0 form-control">
                                            </div>
                                            <input type="hidden" name="provider_id" class=" border-0 "
                                                value={{$user->id}}>
                                        </div>
                                        <div class="my-3">
                                            <button class="w-100  button button-bg button-color fw-semibold" id="myButton"">
                                                Hire Now
                                            </button>
                                        </div>
                                    </form>
                                    <div class="text-center my-4 fw-semibold opacity-50">
                                        You wan't be charged
                                    </div>

                                    <div>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="m-0 fw-semibold">Rate ($10 x 7days)</p>
                                            <p class="m-0 fw-bolder">$70.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="m-0 fw-semibold">Travel fee</p>
                                            <p class="m-0 fw-bolder">$40.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="m-0 fw-semibold">Service charge</p>
                                            <p class="m-0 fw-bolder">$30.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="m-0 fw-semibold">Processing Fee (2%)</p>
                                            <p class="m-0 fw-bolder">$20.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between my-2 mt-4">
                                            <p class="m-0 fw-bolder">Total Payment:</p>
                                            <p class="m-0 fw-bolder">$160.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="ex-with-icons-tabs-2" role="tabpanel"
                    aria-labelledby="ex-with-icons-tab-2">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class=" shadow-1">
                                <h6>Review</h6>
                                <div class=" p-3 shadow-2  rounded-3 review mb-lg-4 mb-md-3 mb-3">
                                    <div
                                        class="d-flex justify-content-between align-items-top border-bottom  mb-2 pb-2">
                                        <div class="d-flex align-items-center ">
                                            <div style="width: 40px; height: 37px; " class="me-2">
                                                <img src="./Assets/images/welcome.svg" alt=""
                                                    style="width: 100%; height: 100%; object-fit: cover;" class="rounded-circle  
                                                    ">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 p-16">Nickey Joe</h6>
                                                <p class="mb-0 p-12">18 Dec 2022</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="p-12 mb-0">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ever since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has survived not only five
                                            centuries,</p>
                                    </div>
                                </div>
                                <div class=" p-3 shadow-2  rounded-3 review mb-lg-4 mb-md-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-top border-bottom mb-2 pb-2">
                                        <div class="d-flex align-items-center ">
                                            <div style="width: 40px; height: 37px; " class="me-2">
                                                <img src="./Assets/images/welcome.svg" alt=""
                                                    style="width: 100%; height: 100%; object-fit: cover;" class="rounded-circle  
                                                    ">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 p-16">Nickey Joe</h6>
                                                <p class="mb-0 p-12">18 Dec 2022</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/half_star.svg" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="p-12 mb-0">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ever since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has survived not only five
                                            centuries,</p>
                                    </div>
                                </div>
                                <div class=" p-3 shadow-2 rounded-3  review mb-lg-4 mb-md-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-top border-bottom mb-2 pb-2">
                                        <div class="d-flex align-items-center ">
                                            <div style="width: 40px; height: 37px; " class="me-2">
                                                <img src="./Assets/images/welcome.svg" alt=""
                                                    style="width: 100%; height: 100%; object-fit: cover;" class="rounded-circle  
                                                    ">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 p-16">Nickey Joe</h6>
                                                <p class="mb-0 p-12">18 Dec 2022</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/half_star.svg" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="p-12 mb-0">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ever since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has survived not only five
                                            centuries,</p>
                                    </div>
                                </div>
                                <div class=" p-3 shadow-2  rounded-3 review mb-lg-4 mb-md-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-top border-bottom mb-2 pb-2">
                                        <div class="d-flex align-items-center ">
                                            <div style="width: 40px; height: 37px; " class="me-2">
                                                <img src="./Assets/images/welcome.svg" alt=""
                                                    style="width: 100%; height: 100%; object-fit: cover;" class="rounded-circle  
                                                    ">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 p-16">Nickey Joe</h6>
                                                <p class="mb-0 p-12">18 Dec 2022</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/half_star.svg" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="p-12 mb-0">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ever since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has survived not only five
                                            centuries,</p>
                                    </div>
                                </div>
                                <div class=" p-3 shadow-2 rounded-3  review mb-lg-4 mb-md-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-top border-bottom mb-2 pb-2">
                                        <div class="d-flex align-items-center ">
                                            <div style="width: 40px; height: 37px; " class="me-2">
                                                <img src="./Assets/images/welcome.svg" alt=""
                                                    style="width: 100%; height: 100%; object-fit: cover;" class="rounded-circle  
                                                    ">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 p-16">Nickey Joe</h6>
                                                <p class="mb-0 p-12">18 Dec 2022</p>
                                            </div>
                                        </div>
                                        <div>
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/full_star.svg" alt="">
                                            <img src="./Assets/icons/half_star.svg" alt="">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="p-12 mb-0">Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text ever since the 1500s, when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has survived not only five
                                            centuries,</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="fw-semibold">Checkout Summary</h4>
                                    <!-- <span class="border px-2 py-2 shadow-2 rounded-3"> <input type="date" class="border-0"> <img
                                            src="./Assets/icons/right-arrow-solid.svg" alt="" style="width:10px"> <input type="date" class="border-0">
                                        </span> -->
                                    <div class="border px-1 py-2 flex-wrap d-flex justify-content-around">
                                        <div>
                                            <div class="p-10
                                                ">Start Date</div>
                                            <input type="date" name='start_date' class=" border-0 ">
                                        </div>
                                        <div class="border-start"></div>
                                        <div>
                                            <div class="p-10
                                                ">End Date</div>
                                            <input type="date" name='end_date' class=" border-0 ">
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <button type="submit" class="w-100 button button-bg button-color fw-semibold">

                                            Hire Now

                                        </button>

                                    </div>

                                    <div class="text-center my-4 fw-semibold opacity-50">
                                        You wan't be charged
                                    </div>

                                    <div>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="m-0 fw-semibold">Rate ($10 x 7days)</p>
                                            <p class="m-0 fw-bolder">$70.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="m-0 fw-semibold">Travel fee</p>
                                            <p class="m-0 fw-bolder">$40.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="m-0 fw-semibold">Service charge</p>
                                            <p class="m-0 fw-bolder">$30.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between my-2">
                                            <p class="m-0 fw-semibold">Processing Fee (2%)</p>
                                            <p class="m-0 fw-bolder">$20.00</p>
                                        </div>
                                        <div class="d-flex justify-content-between my-2 mt-4">
                                            <p class="m-0 fw-bolder">Total Payment:</p>
                                            <p class="m-0 fw-bolder">$160.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Tabs content -->
        </div>


        <div style="height: 100px;"></div>


    </div>

</main>
<script>
$(document).ready(function() {
    
$("#end_date").prop('disabled', true); 
$("#start_date").click(function(){
     
var startdate= $("#start_date").val(); 
if(startdate!=" ")
   {
      
    $("#end_date").prop('disabled', false); 
   }
});

    
    $("#registration").validate({
        // Specify validation rules
        rules: {
            start_date: "required",

            end_date: {
                required: true,
            }
        },
        messages: {
            start_date: {
                required: "start_date Field is required",
            },
            end_date: {
                required: "End date Field is required",
            },

        },

    });
});
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
 
<script>
var check_in = [
    @foreach($provideravailable_busy as $key => $pa)["{{ $pa -> event_start}} ", "{{ $pa -> event_end}} "],
    @endforeach
]; //disabled days
var enableDays = [
    @foreach($provideravailable_available as $key => $pa)["{{ $pa -> event_start}} ", "{{ $pa -> event_end}} "],
    @endforeach
]; //enabled days

var SITEURL = "{{ url('/') }}";
$('#start_date').datepicker({
    dateFormat: 'yy-mm-dd',

    //onSelect: function (dateString, txtDate) {
    
        //salert(dateString);
          //  },

    beforeShowDay: function(date) {
        //var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        var string = date;
        var disabled = false;
        var enabled = false;

        // Check if the current date is in the disabled dates array
        for (var i = 0; i < check_in.length; i++) {
            var from = new Date(check_in[i][0]);
            var to = new Date(check_in[i][1]);
            var current = new Date(string);
            if (current >= from && current <= to) {
                disabled = true;
                break;
            }
        }

        // Check if the current date is in the enabled dates array
        for (var i = 0; i < enableDays.length; i++) {
            var from = new Date(enableDays[i][0]);
            var to = new Date(enableDays[i][1]);
            var current = new Date(string);
            if (current >= from && current <= to) {
                enabled = true;
                break;
            }
        }

        // Return the appropriate result
        if (disabled) {
            return [false];
        } else if (enabled) {
            return [true];
        } else {
            return [false];
        }
    }
});
</script>


<script>

 

var check_in = [
    @foreach($provideravailable_busy as $key => $pa)["{{ $pa -> event_start}} ", "{{ $pa -> event_end}} "],
    @endforeach
]; //disabled days
var enableDays = [
    @foreach($provideravailable_available as $key => $pa)["{{ $pa -> event_start}} ", "{{ $pa -> event_end}} "],
    @endforeach
]; //enabled days
$('#end_date').datepicker({
    dateFormat: 'yy-mm-dd',
    beforeShowDay: function(date) {

        

        //var string = jQuery.datepicker.formatDate('yy-mm-dd', date);
        var string = date;
        var disabled = false;
        var enabled = false;

        // Check if the current date is in the disabled dates array
        for (var i = 0; i < check_in.length; i++) {
            var from = new Date(check_in[i][0]);
            var to = new Date(check_in[i][1]);
            var current = new Date(string);
            if (current >= from && current <= to) {
                disabled = true;
                break;
            }
        }

        // Check if the current date is in the enabled dates array
        for (var i = 0; i < enableDays.length; i++) {
            var from = new Date(enableDays[i][0]);
            var to = new Date(enableDays[i][1]);
            var current = new Date(string);
            if (current >= from && current <= to) {
                enabled = true;
                break;
            }
        }

        // Return the appropriate result
        if (disabled) {
            return [false];
        } else if (enabled) {
            return [true];
        } else {
            return [false];
        }
    }
});


</script>


@include('Practice.footer')
