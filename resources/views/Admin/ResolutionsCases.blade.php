@extends('Admin.layouts.master')
@section('content')
<div class="admin_dashboard_inner px-5 pt-5">
    <div class="row mb-3 mx-0">
        <div class="col-lg-12">
            <ul class="nav tabs_header title_header " id="myTab" role="tablist">
                <li class="nav-item me-5 active" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true"><img
                            src="{{asset('Admin/images/open_tsb.svg') }}" class="me-2 " />Open Cases</a>
                </li>
                <li class="nav-item me-3" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false"><img
                            src="{{asset('Admin/images/open_tsb.svg') }}" class="me-2" />Closed Cases</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row py-4 mx-0">
        <div class="col-lg-12">
            <div class="tab-content" id="myTabContent">
                <!-- open tab -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row mb-3 mx-0">
                        <div class="col-lg-12 px-0  commn_title_header">
                            @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{session('error')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <p class="mb-2">Open Cases</p>
                        </div>

                    </div>

                    <div class="row table_wrapper cases_table_wrapper px-2">
                        <div class="col-lg-12 px-0">
                            <table class="table text-center roboto_family" id="resolution">
                                <thead>
                                    <tr>
                                        <th scope="col" class="w-10 text-center">S.No.</th>
                                        <th scope="col" class="w-20 text-center">Name</th>
                                        <th scope="col" class="w-20 text-center">Email</th>
                                        <th scope="col" class="w-30 text-center">Issue</th>
                                        <th scope="col" class="w-10 text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- provider resolution start -->


                                    @foreach($resolution_data as $resolution_provider)

                                    <tr class="align-middle">

                                        <td scope="row">{{$loop->iteration}}.</td>
                                        <td id="resolutionopenmodal">
                                            <span data-bs-toggle="modal"
                                                data-bs-target="#openModalProvider{{$loop->iteration}}">
                                                {{ $resolution_provider->firstName . ' '. $resolution_provider->lastName}}<span>
                                        </td>
                                        <td>{{$resolution_provider->email}}</td>
                                        @if(!empty($resolution_provider->provider_id))
                                        <td><div class="ellips">{{substr($resolution_provider->ticketDescription, 0,100)}}</div></td>
                                        @else
                                        <td>{{$resolution_provider->message}}</td>
                                        @endif
                                        <td><span class="badge rounded-pill green_pill btn">open</span>
                                        </td>
                                    </tr>

                                    <!-- open Modal -->
                                    <div class="modal fade resolution_open_modal"
                                        id="openModalProvider{{$loop->iteration}}" tabindex="-1"
                                        aria-labelledby="openModalProvider" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered  modal-lg">
                                            <div class="modal-content">
                                                <div class="open_modal_header_wrapper">
                                                    <div class="modal-header border-0 pb-0 mb-2">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ticket Raised
                                                        </h5>
                                                        <button type="button" class="btn-close new_btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="sub_header p-3 pt-2 d-flex justify-content-between">
                                                        <div class="user_info">
                                                            <p class="mb-0">{{$resolution_provider->email}}</p>
                                                        </div>
                                                        @if(!empty($resolution_provider->provider_id))
                                                        <div class="user_id">
                                                            <p class="mb-0">#{{$resolution_provider->ticketId}}</p>
                                                        </div>
                                                        @else
                                                        <div class="user_id">
                                                            <p class="mb-0">{{$resolution_provider->Ticket_ID}}</p>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-body upload__box p-4">
                                                    <div class="heading border-bottom">
                                                        @if(!empty($resolution_provider->provider_id))
                                                        <h6 class="modal-title" id="exampleModalLabel">
                                                            {{$resolution_provider->ticketTitle	}}</h6>
                                                        @else
                                                        {{$resolution_provider->Issue}}</h6>
                                                        @endif
                                                    </div>
                                                    <div class="py-3">
                                                        @if(!empty($resolution_provider->provider_id))
                                                        <p>
                                                            {{$resolution_provider->ticketDescription}}
                                                        </p>
                                                        @else
                                                        {{$resolution_provider->message}}
                                                        @endif
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                    <div class="attachment_wrapper d-flex flex-wrap mb-4">

                                                        @if(!empty($resolution_provider->provider_id))
                                                        <?php
                                                               $aa=$resolution_provider->attachFile;
                                                               $array_length =  count(array($aa));
                                                               
                                                               $aaa=explode(",",$aa);
                                                            ?>
                                                        @foreach ($aaa as $key => $aaaa)
                                                        @if($aaaa)
                                                        <div class="attachment_img_container">

                                                            <a href="{{ asset('provider/uploads/attachFile/'.$aaaa) }}"><img
                                                                    src="{{ asset('provider/uploads/attachFile/'.$aaaa) }}"
                                                                    class="ticket-img" /></a>

                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        @else
                                                        <?php  
                                                     $path = explode(',', $resolution_provider->screenShort);
                                                        ?>
                                                        @foreach($path as $DATA)
                                                        @if($DATA)
                                                        <div class="attachment_img_container">

                                                            <a href="{{ asset('Practice/'.$DATA) }}"><img
                                                                    src="{{ asset('Practice/'.$DATA) }}"
                                                                    class="ticket-img" /></a>

                                                        </div>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="reply_wrapper d-flex align-items-center justify-content-between">

                                                        @if(!empty($resolution_provider->provider_id))
                                                        <form
                                                            action="{{ route('UpdateTicketProvider', $resolution_provider->id) }}"
                                                            method="post" enctype="multipart/form-data"
                                                            onsubmit="return imagecountvalidationPro()">
                                                            @csrf
                                                            <div class="ticket_control_group w-100 pe-2">
                                                                <textarea rows="3" cols="50" name="admin_message"
                                                                    id="admin_message_pro{{$loop->iteration}}"
                                                                    placeholder="Type here..."
                                                                    class="form-control form-control-lg me-3 pe-5 custm_scroll"
                                                                    maxlength="1000"></textarea>

                                                                <div class="error text-danger" id="adminerrorpro">
                                                                </div>

                                                                <p class='text-gray text-start mb-0'><span
                                                                        id="charCount_provide{{$loop->iteration}}"></span>
                                                                </p>

                                                                <input type="hidden" name="email"
                                                                    value="{{ $resolution_provider->email  }}" />
                                                                <input type="hidden" name="provider_id"
                                                                    value="{{ $resolution_provider->provider_id  }}" />
                                                                <input type="hidden" name="ticket_id"
                                                                    value="{{ $resolution_provider->ticketId  }}" />
                                                                <input type="hidden" name="issue"
                                                                    value="{{ $resolution_provider->ticketTitle  }}" />
                                                                <div class="upload__btn-box attachment_image_upload">
                                                                    <label class="upload__btn">
                                                                        <img class="attchment_icon"
                                                                            src="{{ asset('./Admin/images/file_attachment.svg') }}" />
                                                                        <input type="file"
                                                                            name="screenshort_resolved_provider[]"
                                                                            class="upload__inputfile"
                                                                            data-max_length="10" id="fileUpload"
                                                                            multiple>

                                                                    </label>
                                                                </div>
                                                                <span id="errorfileuploadpro"
                                                                    class="text-danger"></span>

                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn_commn_semi_round">Send</button>
                                                        </form>
                                                        @else

                                                        <form
                                                            action="{{ route('UpdateTicketPractice', $resolution_provider->id) }}"
                                                            method="post" enctype="multipart/form-data"
                                                            onsubmit="return imagecountvalidationPract()">
                                                            @csrf
                                                            <div class="ticket_control_group w-100 pe-2">
                                                                <textarea rows="3" cols="50" name="admin_message"
                                                                    id="admin_message_pract{{$loop->iteration}}" placeholder="Type here..."
                                                                    class="form-control form-control-lg me-3 pe-5 custm_scroll"
                                                                    maxlength="1000"></textarea>
                                                                    <span class="text-grey">Only 10 images allow to upload</span>
                                                                <div class="error text-danger" id="adminerrorpract">
                                                                </div>
                                                                <p class="text-gray text-start"><span
                                                                        id="charCount_practice{{$loop->iteration}}"></span></p>

                                                                <input type="hidden" name="email"
                                                                    value="{{ $resolution_provider->email  }}" />
                                                                <input type="hidden" name="practice_id"
                                                                    value="{{ $resolution_provider->practice_id  }}" />
                                                                <input type="hidden" name="ticket_id"
                                                                    value="{{ $resolution_provider->Ticket_ID  }}" />
                                                                <input type="hidden" name="issue"
                                                                    value="{{ $resolution_provider->Issue  }}" />
                                                                <input type="hidden" name="issue_date"
                                                                    value="{{ $resolution_provider->Issue_Date  }}" />
                                                                <div class="upload__btn-box attachment_image_upload">
                                                                    <label class="upload__btn">
                                                                        <img class="attchment_icon"
                                                                            src="{{ asset('./Admin/images/file_attachment.svg') }}" />
                                                                            
                                                                        <input type="file"
                                                                            name="screenshort_resolved_admin[]"
                                                                            class="upload__inputfile"
                                                                            data-max_length="10" id="fileUpload1"
                                                                            multiple>
                                                                        <span id="errorfileuploadprac"
                                                                            class="text-danger"></span>
                                                                    </label>
                                                                   
                                                                </div>

                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn_commn_semi_round">Send</button>
                                                        </form>

                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end open modal -->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- closed tab -->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row mb-5 mx-0">
                        <div class="col-lg-12 px-0 commn_title_header">
                            <p class="mb-2">Closed Cases</p>
                        </div>
                    </div>
                    <div class="row table_wrapper cases_table_wrapper px-2">
                        <div class="col-lg-12 px-0">
                            <table class="table text-center roboto_family" id="resolvedissue">
                                <thead>
                                    <tr>
                                        <th scope="col" class="w-10 text-center">S.No.</th>
                                        <th scope="col" class="w-20 text-center">Name</th>
                                        <th scope="col" class="w-20 text-center">Email</th>
                                        <th scope="col" class="w-30 text-center">Issue</th>
                                        <th scope="col" class="w-10 text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- provider resolution start  -->
                                    @foreach($resolution_closedata as $provider_issue__close)

                                    <tr class="align-middle">
                                        <td scope="row">{{$loop->iteration}}.</td>
                                        @if(!empty($provider_issue__close->provider_id))
                                        <td>{{ $provider_issue__close->firstName . ' '. $provider_issue__close->lastName}}
                                        </td>
                                        @else
                                        <td>{{ $provider_issue__close->firstName . ' '. $provider_issue__close->lastName}}
                                            @endif
                                            @if(!empty($provider_issue__close->provider_id))
                                        <td>{{$provider_issue__close->email}}</td>
                                        @else
                                        <td>{{$provider_issue__close->email}}</td>
                                        @endif
                                        @if(!empty($provider_issue__close->provider_id))
                                        <td><div class="ellips">{{$provider_issue__close->ticketDescription}}</div></td>
                                        @else
                                        <td>{{$provider_issue__close->message}}</td>
                                        @endif
                                        <td><span class="badge rounded-pill danger_pill">Resolved</span></td>
                                    </tr>
                                    @endforeach
                                    <!-- practice resolution end  -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
      var imgArray = [];
$(document).ready(function() {
    $('#resolution').DataTable({
        searching: true,
        paging: true,
        bInfo: false,
        bLengthChange: true,
        ordering: false
    });
});

$(document).ready(function() {
    $('#resolvedissue').DataTable({
        searching: true,
        paging: true,
        bInfo: false,
        bLengthChange: true,
        ordering: false
    });
});
</script>

<script>
$(document).ready(function() {
    var path = window.location.href;

    $('#navi a').each(function() {
        if (this.href === path) {

            $(this).addClass('active');
        }

    });

});

jQuery(document).ready(function() {
    ImgUpload();
});

function ImgUpload() {
    var imgWrap = "";
    // var imgArray = [];


    $('.upload__inputfile').each(function() {
        $(this).on('change', function(e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
            // var file_element = document.getElementById('fileUpload').value(imgArray);

            var maxLength = $(this).attr('data-max_length');
            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            // console.log(filesArr,maxLength)
            filesArr?.slice(0,10)?.forEach(function(f, index) {
                
                // console.log(f)
                if (!f.type.match('image.*')) {
                    return;
                }

                if (imgArray.length > maxLength) {

                    return false
                }
                 else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var html =
                                "<div class='upload__img-box'><div style='background-image: url(" +
                                e.target.result + ")' data-number='" + $(
                                    ".upload__img-close").length + "' data-file='" + f
                                .name +
                                "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        }
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $('body').on('click', ".upload__img-close", function(e) {
        var file = $(this).parent().data("file");
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}
</script>

<!-- provider raise tickets file validation -->


<script>
function imagecountvalidationPro() {
    var file_element = document.getElementById('fileUpload').files;
    // Object.keys(exampleObject).length
    // if (file_element.length > 10) {
    //     // $("#errorfileuploadpro").html("uploaded");
    //     var file_element = document.getElementById('fileUpload').value(file_element.slice(1,9));
    // } else {
    //     $("#errorfileuploadpro").html("");
    // }

    $adminmessage = $("#admin_message_pro").val();
    if ($adminmessage == '') {
        $("#adminerrorpro").html("This field is Required");
        return false;
    } else {
        $("#adminerrorpro").html("");
    }


    if ($adminmessage.length > 1000) {
        $("#adminerrorpro").html("Maximum 1000 character is allow");
        return false;
    } else {
        $("#adminerrorpro").html("");
    }
}


function imagecountvalidationPract() {
    var file_element = document.getElementById('fileUpload1').files;
    // if (file_element.length > 10) {
    //     $("#errorfileuploadprac").html("Maximum 10 file can upload");
    //     return false;
    // } else {
    //     $("#errorfileuploadprac").html("");
    // }


    $adminmessage_prac = $("#admin_message_pract").val();
    if ($adminmessage_prac == '') {
        $("#adminerrorpract").html("This field is Required");
        return false;
    } else {
        $("#adminerrorpract").html("");
    }


    if ($adminmessage_prac.length >= 1000) {
        $("#adminerrorpract").html("Maximum 1000 character is allow");
        return false;
    } else {
        $("#adminerrorpract").html("");
    }


}
</script>
@foreach($resolution_data as $resolution_provider)
@if(!empty($resolution_provider->provider_id))
<script>
$(document).ready(function() {
    var max_length = 1000;

    var data = $("#admin_message_pro{{$loop->iteration}}").val();

    // var current_length = max_length-data.length;

    // $('#charCount').text(current_length);
    $("#admin_message_pro{{$loop->iteration}}").keyup(function() {
        var len = max_length - $(this).val().length;
        if (len > 0) {
            $("#charCount_provide{{$loop->iteration}}").removeClass('text-danger');
            $("#charCount_provide{{$loop->iteration}}").addClass('text-grey');
            $("#charCount_provide{{$loop->iteration}}").text(
                'Admin Message should not be of maximum 1000 characters length');
        } else {
            $("#charCount_provide{{$loop->iteration}}").addClass('text-danger');
            $("#charCount_provide{{$loop->iteration}}").removeClass('text-grey');
            $("#charCount_provide{{$loop->iteration}}").text('Dont exceed more than 1000 characters');
        }
    });

});
</script>
@else
<script>
$(document).ready(function() {
    var max_length = 1000;

    var data = $("#admin_message_pract{{$loop->iteration}}").val();
    // var current_length = max_length-data.length;

    // $('#charCount').text(current_length);
    $("#admin_message_pract{{$loop->iteration}}").keyup(function() {
        var len = max_length - $(this).val().length;
        if (len > 0) {
            $("#charCount_practice{{$loop->iteration}}").removeClass('text-danger');
            $("#charCount_practice{{$loop->iteration}}").addClass('text-grey');
            $("#charCount_practice{{$loop->iteration}}").text('Bio should not be of maximum 1000 characters length');
        } else {
            $("#charCount_practice{{$loop->iteration}}").addClass('text-danger');
            $("#charCount_practice{{$loop->iteration}}").removeClass('text-grey');
            $("#charCount_practice{{$loop->iteration}}").text('Dont exceed more than 1000 characters');
        }
    });

});
</script>
@endif
@endforeach
@endsection