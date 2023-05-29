@include('Practice.header')
<!--Main layout-->
<main class="main-body">
    <div class="container-fluid px-5 mob-p-0 ">
        <div class="mb-4 pt-4">
            <div class="row">
                <div class="col-lg-12">
                    <p class="fw-bold me-3 font-20">Raise Ticket</p>
                </div>
                <div class="col-lg-7">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0 font-16">Latest Raise History</h5>
                            <p class="mb-0 font-13">Here is your most recent history</p>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3 py-2 border-bottom font-14">
                                <div class="col-lg-2"id="sNo"><b>S.No.</b></div>
                                <div class="col-lg-2"><b>Ticket ID</b></div>
                                <div class="col-lg-4 text-center"><b>Topic</b></div>
                                <div class="col-lg-2"><b>Issue Date</b></div>
                                <div class="col-lg-2"><b>Status</b></div>
                            </div>
                              @foreach ($arr as $Ticket)

                                    <div class="row font-14 mb-2">
                                        <div class="col-lg-2"><span>{{$loop->iteration }}</span></div>
                                        <div class="col-lg-2"><span>TI#{{ $Ticket['Ticket_ID'] }}</span></div>
                                        <div class="col-lg-4 text-center"><span>{{ $Ticket['Issue'] }}</span></div>
                                        <div class="col-lg-2"><span>20-02-2023</span></div>
                                        @if($Ticket['practice_raise_tickets_status'] == 1)
                                        <div class="col-lg-2"><a class="text-success" data-mdb-toggle="collapse"
                                                href="#ticket{{ $loop->iteration }}" aria-expanded="false"
                                                aria-controls="ticket{{ $loop->iteration }}">Open</a>
                                        </div>
                                        @else
                                        <div class="col-lg-2"><a class="text-danger" data-mdb-toggle="collapse"
                                                href="#ticket{{ $loop->iteration }}" aria-expanded="false"
                                                aria-controls="ticket{{ $loop->iteration }}">Close</a>
                                        </div>
                                        @endif
                                        


                                        <div class="col-lg-12">
                                            <div class="collapse my-3" id="ticket{{ $loop->iteration }}">
                                                <div class="card shadow">
                                                    <div class="card-header">
                                                        <h5 class="mb-0 font-15 fw-semibold">{{ $Ticket['Issue'] }}</h5>
                                                    </div>

                                                    <div class="card-body">
                                                        <p class="font-12">{{ $Ticket['message'] }}</p>


                                                        <?php
                                                        $path = explode(',', $Ticket['screenShort']);
                                                        
                                                        ?>
                                                        <div class="row mx-0">
                                                            @foreach ($path as $DATA)
                                                            @if(!empty($DATA))
                                                                <img src=" {{ asset('Practice/' . $DATA) }}"
                                                                    class="ticket-img">
                                                            @endif
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               
                            @endforeach
                            <div id="dddddddddddd"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">

                    <div class="card shadow">

                        <form action="{{ route('PracticeTicketsubmit') }}" method="POST" class="upload__box"
                            enctype="multipart/form-data" id="registration" onsubmit="return validationImage()">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <input type="text" name="Issue" class="form-control"
                                            placeholder="Ticket Title" value="" maxlength="100">
                                        @if ($errors->has('Issue'))
                                            <span class="text-danger">{{ $errors->first('Issue') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 mb-3">

                                        <textarea rows="10" id="message" class="form-control p-13 fw-500 text-dark raiseticketTextarea" name="message" maxlength='1000'></textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                        <p class='text-grey text-start'><span id="charCount"></span></p>
                                    </div>
                                </div>
                                <div class="upload__img-wrap"></div>
                            </div>
                            <div class="card-footer bg-white py-3">
                                <button type="submit"
                                    class="button button-bg button-color fw-semibold py-2 px-4"></i>Send</button>
                                <span class="custom-file">
                                    <label class="upload__btn">
                                        <i class="bi bi-paperclip"></i>
                                        <span class="text-grey">Only 10 images allow to upload</span>
                                        <input type="file" name="file[]" value="" multiple=""
                                            data-max_length="10" class="upload__inputfile" id="practice_upload_image">
                                        @if ($errors->has('file'))
                                            <span class="text-danger">{{ $errors->first('file') }}</span>
                                        @endif

                                        <span class="text-danger" id="errorfileuploadprac"></span>
                                    </label>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!--Main layout-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body position-relative">
                <div class="text-center m-auto">
                    <div class="logoutIcon">
                        <img src="./Assets/images/logout icon.svg" alt="">
                    </div>
                    <div style="height: 50px;">

                    </div>
                    <div>
                        <h5 class="m-0 fw-semibold">Are you sure you want to log out?</h5>
                    </div>
                </div>
                <div class="mb-3 mt-4 text-center  ">

                    <button class=" button button-bg button-color fw-semibold px-5 mx-2 ">
                        LOG OUT
                    </button>

                    <button class=" button  fw-semibold px-5 mx-2">
                        CANCEL
                    </button>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function validationImage() {
  var practice_upload_image = document.getElementById('practice_upload_image').files;
  if(practice_upload_image.length > 10 ){
    $("#errorfileuploadprac").html("Maximum 10 file can upload");
  }else{
    $("#errorfileuploadprac").html("");
  }
}
</script>
<script>
$(document).ready(function() {
    var max_length = 1000;
    var data = $("#message").val();
    $("#message").keyup(function() {
        var len = max_length - $(this).val().length;
        if (len > 0) {
            $("#charCount").removeClass('text-danger');
            $("#charCount").addClass('text-grey');
            $("#charCount").text(
                'Message should not be of maximum 1000 characters length');
        } else {
            $("#charCount").addClass('text-danger');
            $("#charCount").removeClass('text-grey');
            $("#charCount").text('Dont exceed more than 1000 characters');
        }
    });
});
</script>
@include('Practice.footer')
