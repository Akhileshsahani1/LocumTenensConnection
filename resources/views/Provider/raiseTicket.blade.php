@extends('layouts.main')
@section('main-section')
@push('title')
<title>Raise Ticket</title>
@endpush

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
            @include('layouts.topbar')
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid px-5 mob-p-0">
                    <div class="mb-4">
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
                                        <div class="col-lg-2"><b>S.No.</b></div>
                                            <div class="col-lg-2"><b>Ticket ID</b></div>
                                            <div class="col-lg-4 text-center"><b>Topic Title</b></div>
                                            <div class="col-lg-2"><b>Issue Date</b></div>
                                            <div class="col-lg-2"><b>Status</b></div>
                                        </div>

                                @foreach($arr as $ticket)
                                      <div class="row font-14 mb-2">
                                            <div class="col-lg-2"><span>{{$loop->iteration}}</span></div>
                                            <div class="col-lg-2">
                                           <a class="text-success" data-bs-toggle="collapse" href="#ticket{{$loop->iteration}}" aria-expanded="false" aria-controls="ticket{{$loop->iteration}}">TI#{{$ticket['ticketId']}}</a></div>
                                          
                                            <div class="col-lg-4 text-center"><span>{{$ticket['ticketTitle']}} </span></div>
                                            <div class="col-lg-2"><span>
                                            <?php
                                            $date=date_create($ticket['created_at']);
                                            echo date_format($date,"d/m/Y");
                                            ?>    
                                             </span></div>

                                            @if($ticket['ticketStatus'] == 1)
                                            <div class="col-lg-2"><a class="text-success" data-bs-toggle="collapse"
                                                    href="#ticket{{$loop->iteration}}" aria-expanded="false"
                                                    aria-controls="#ticket{{$loop->iteration}}">Open</a>
                                            </div>
                                            @else
                                            <div class="col-lg-2"><a class="text-danger" data-bs-toggle="collapse"
                                                    href="#ticket{{$loop->iteration}}" aria-expanded="false"
                                                    aria-controls="#ticket{{$loop->iteration}}">Close</a>
                                            </div>
                                            @endif
                                            

                                            
                                            <div class="col-lg-12">
                                                <div class="collapse my-3" id="ticket{{$loop->iteration}}">
                                                    <div class="card shadow">
                                                        <div class="card-header">
                                                            <h5 class="mb-0 font-15 fw-semibold">{{$ticket['ticketTitle']}}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="font-12"> {{$ticket['ticketDescription']}}  </p>
                                                            <div class="row mx-0">
                                                                 
                                                            <?php
                                                               $ticket=$ticket['attachFile'];
                                                               $array_length =  count(array($ticket));
                                                               
                                                               $data=explode(",",$ticket);
                                                            ?>
                                                            @foreach ($data as $key => $result)
                                                            @if(!empty($result))

                                                                    <img src="{{ asset('provider/uploads/attachFile')}}/{{$result}}" class="ticket-img">
                                                            @endif
                                                            
                                                            @endforeach 
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                   {{--     @foreach($AdminProviderTicketResolved as $ticketresolved)
                                        <!-- <div class="row font-14 mb-2">
                                            <div class="col-lg-2"><span>{{$ticketresolved->id}}</span></div>
                                            <div class="col-lg-2"><span>{{$ticketresolved->ticket_id}}</span></div>
                                            <div class="col-lg-4 text-center"><span>{{$ticketresolved->issue}}</span></div>
                                            <div class="col-lg-2"><span>{{$ticketresolved->created_at}}</span></div>
                                            <div class="col-lg-2"><a class="text-danger">Close</a></div>
                                        </div> -->
                                        <div class="row font-14 mb-2">
                                            <div class="col-lg-2"><span>{{$ticketresolved->id}}</span></div>
                                            <div class="col-lg-2">
                                            <a class="text-success" data-bs-toggle="collapse" href="#ticketresolved{{$loop->iteration}}" aria-expanded="false" aria-controls="ticketresolved{{$loop->iteration}}">{{$ticketresolved->ticket_id}}</a></div>
                                            <div class="col-lg-4 text-center"><span>{{$ticketresolved->issue}} </span></div>
                                            <div class="col-lg-2"><span>{{$ticketresolved->created_at}} </span></div>
                                            <div class="col-lg-2"><a class="text-success" data-bs-toggle="collapse"
                                                    href="#ticketresolved{{$loop->iteration}}" aria-expanded="false"
                                                    aria-controls="#ticketresolved{{$loop->iteration}}">Close</a></div>
                                            <div class="col-lg-12">
                                                <div class="collapse my-3" id="ticketresolved{{$loop->iteration}}">
                                                    <div class="card shadow">
                                                        <div class="card-header">
                                                            <h5 class="mb-0 font-15 fw-semibold">{{$ticketresolved->issue}}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <p class="font-12"> {{$ticketresolved->admin_message}}  </p>
                                                            <div class="row mx-0">
                                                                 
                                                            <?php
                                                               $ticketfile=$ticketresolved->screenshort;
                                                               $array_length =  count(array($ticketfile));
                                                               
                                                               $data=explode(",",$ticketfile);
                                                            ?>
                                                            @foreach ($data as $key => $result)
                                                             <img src="{{ asset('Admin/images')}}/{{$result}}" class="ticket-img">
                                                            @endforeach 
                                                             </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach   --}}  
                                    </div>
                                </div>
                            </div>
                                
                            <div class="col-lg-5">
                                <div class="card shadow">
                                <form action="{{ route('provider.RaiseTicket') }}" method="post" class="upload__box" enctype="multipart/form-data">
                                     @csrf   
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <input type="text" name="ticketTitle" class="form-control" placeholder="Ticket Title" maxlength="100">
                                                @if ($errors->has('ticketTitle'))
                                               <span class="text-danger">{{ $errors->first('ticketTitle') }}</span>
                                               @endif
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <textarea rows="5" id="ticketDescription" name="ticketDescription" class="form-control fw-500 text-dark" placeholder="Ticket Description" maxlength="1000"></textarea>
                                                @if ($errors->has('ticketDescription'))
                                               <span class="text-danger">{{ $errors->first('ticketDescription') }}</span>
                                               @endif 
                                               <p class='text-gray text-start'><span id="charCount"></span></p>
                                            </div>
                                        </div>
                                        <div class="upload__img-wrap"></div>
                                    </div>
                                    <div class="card-footer bg-white py-3">
                                        <button type="submit" name="raiseTicket" class="btn btn-sm btn-primary px-4" style="border-radius:12px;padding: 8px 0px;"><i class="bi bi-send"> </i>Send</button>
                                        <span class="custom-file">
                                            <label class="upload__btn">
                                                <i class="bi bi-paperclip"></i>
                                                <span class="text-grey font-15">Only 10 images allow to upload</span>
                                                <input type="file" name="file[]" multiple="multiple" id ="fileUpload" class="upload__inputfile" >
                                                @if ($errors->has('file'))
                                               <span class="text-danger">{{ $errors->first('file') }}</span>
                                               @endif 
                                               <span id ="errorraisfile" class="text-danger">{{ $errors->first('file') }}</span>
                                            </label>
                                            
                                        </span>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
</body>
@endsection