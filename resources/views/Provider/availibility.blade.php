@extends('layouts.main')
@section('main-section')
@push('title')
<title>Availability</title>
@endpush
 <style>
 

 .Availablebox
 {
  background-color:#c3dbf3;
  height: 10px;
  width:10px;
  display: inline-block;
 }
 .Busybox
 {
  background-color:#d399aa;
  height: 10px;
  width:10px;
  display: inline-block;
 }

     .disabled {
    pointer-events: none;
    opacity: 0.5;
  }

  .fchighlight {
    opacity: 0.3;
    background: var(--fc-highlight-color);
  }

  .fc-day-past {
    /* pointer-events: none; */
    opacity: 0.5;
    user-select: none;
    /* Standard syntax */
    cursor: not-allowed;
  }
  .fc-h-event .fc-event-title-container {
    text-align: center;
  }
  .fc-h-event .fc-event-title-container {
    visibility: hidden;
  }
  .fc .fc-bg-event .fc-event-title {
    visibility: hidden;
  }
  .fc-event {
    height: 35px;
    cursor:pointer;
  }
  .fc .fc-daygrid-day-bg .fc-bg-event {
    z-index: 9 !important;
  }
  .popper,
  .tooltip {
    position: absolute;
    z-index: 9999;
    background: #ff2525;
    color: #fff;
    width: 130px;
    border-radius: 3px;
    box-shadow: 0 0 2px rgba(0,0,0,0.5);
    padding: 0px !important;
    text-align: center;
    font-size: 0.85rem;
    padding: 4px 4px 4px 4px !important;
    opacity: 1 !important;
  }
  .style5 .tooltip {
    background: #1E252B;
    color: #FFFFFF;
    max-width: 200px;
    width: auto;
    font-size: .5rem !important;
    padding: .2em 1em !important;
  }
  .popper .popper__arrow,
  .tooltip .tooltip-arrow {
    width: 0;
    height: 0;
    border-style: solid;
    position: absolute;
    margin: 5px;
  }

  .tooltip .tooltip-arrow,
  .popper .popper__arrow {
    border-color: #ff2525;
  }
  .style5 .tooltip .tooltip-arrow {
    border-color: #1E252B;
  }
  .popper[x-placement^="top"],
  .tooltip[x-placement^="top"] {
    margin-bottom: 5px;
  }
  .popper[x-placement^="top"] .popper__arrow,
  .tooltip[x-placement^="top"] .tooltip-arrow {
    border-width: 5px 5px 0 5px;
    border-left-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    bottom: -5px;
    /* left: calc(50% - 5px); */
    margin-top: 0;
    margin-bottom: 0;
  }
  .popper[x-placement^="bottom"],
  .tooltip[x-placement^="bottom"] {
    margin-top: 5px;
  }
  .tooltip[x-placement^="bottom"] .tooltip-arrow,
  .popper[x-placement^="bottom"] .popper__arrow {
    border-width: 0 5px 5px 5px;
    border-left-color: transparent;
    border-right-color: transparent;
    border-top-color: transparent;
    top: -5px;
    /* left: calc(50% - 5px); */
    margin-top: 0;
    margin-bottom: 0;
  }
  .tooltip[x-placement^="right"],
  .popper[x-placement^="right"] {
    margin-left: 5px;
  }
  .popper[x-placement^="right"] .popper__arrow,
  .tooltip[x-placement^="right"] .tooltip-arrow {
    border-width: 5px 5px 5px 0;
    border-left-color: transparent;
    border-top-color: transparent;
    border-bottom-color: transparent;
    left: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
  }
  .popper[x-placement^="left"],
  .tooltip[x-placement^="left"] {
    margin-right: 5px;
  }
  .popper[x-placement^="left"] .popper__arrow,
  .tooltip[x-placement^="left"] .tooltip-arrow {
    border-width: 5px 0 5px 5px;
    border-top-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    right: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
  }

  .tooltipevent
  {
    width: 120px;
    position: absolute;
    z-index: 10001;
    background: #3775cb;
    color: #FFFFFF;
    font-size: 0.85rem;
    padding: 5px 5px 5px 5px;
    text-align: center;
    top: 57px;
    left: -20px;
    border-radius: 7px;
}
.tooltipevent:before {
bottom: -20px;
content: " ";
display: block;
height: 20px;
left: 0;
position: absolute;
width: 100%;
}
.tooltipevent:after {
border-left: solid transparent 10px;
border-right: solid transparent 10px;
border-top: solid #3775cb 10px;
bottom: 20px;
rotate: 180deg;
content: " ";
height: 0;
left: 50%;
margin-left: -13px;
position: absolute;
width: 0;
}
</style>




<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">

<script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>
 
<script>
  $(document).ready(function() {
    var SITEURL = "{{ url('/') }}";
    //document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      selectable: true,
      timeZone: 'UTC',
      initialView: 'multiMonthYear',
      editable: false,
      eventDidMount: function(info) {
        var tooltip = new Tooltip(info.el, {
          title: info.event.extendedProps.description,
          placement: 'top',
          trigger: 'hover',
          container: 'body'
        });
      },
      events: [
        @foreach($data as $item) {
          id: '{{ $item->id }}',
          title: '{{ $item->event_name }}',
          start: '{{ $item->event_start}}',
          end: '{{ $item->event_end }}',
          color: '{{ $item->color }}',
          display: 'background',
          description: 'Click For Delete!!'
        },
        @endforeach
      ],
      headerToolbar: {
        left: '',
        center: 'title',
        right: ''
      },
      //jo select kr lia vo dubra select ni ho skta..
      // selectOverlap: function(event) {
      //   return event.rendering === 'background';
      // },
      dateClick: function(info, event) {
        //alert('clicked ' + info.dateStr); 
      },
      select: function(info) {
        let date1 = new Date(info.startStr);
        let date2 = new Date(info.endStr);
        let diffTime = Math.abs(date2 - date1);
        let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        //console.log(diffDays);
        if (diffDays > 7) {
          alert("Please Select Only Week Days / Max. 7 Days");
          calendar.unselect();
        } else {
          Swal.fire({
            title: 'Do you want to show your availability?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
          }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
              var event_start = info.startStr;
              var event_end = info.endStr;
              $.ajax({
                url: SITEURL + "/provider/provider-calendar-crud-ajax",
                data: {
                  _token: "{{ csrf_token() }}",
                  event_name: "...",
                  event_start: event_start,
                  event_end: event_end,
                  type: 'create'
                },
                type: 'POST',
                success: function(data) {
                  window.location.reload();
                }
              });
              Swal.fire('Saved!', '', 'info');
            } else if (result.isDenied) {

              let randomnum = Math.random() * 100;
              var event_start = info.startStr;
              var event_end = info.endStr;
              $.ajax({
                url: SITEURL + "/provider/provider-calendar-crud-ajax",
                data: {
                  _token: "{{ csrf_token() }}",
                  event_name: "...",
                  event_start: event_start,
                  event_end: event_end,
                  bookingid: randomnum,
                  type: 'createfalse'
                },
                type: 'POST',
                success: function(data) {
                  window.location.reload();
                }
              });
              Swal.fire('Saved', '', 'danger');
            }

          })
        }
        calendar.unselect();
      },

      eventClick: function(event_name) {
     
        var idd = event_name.event._def.publicId;
       
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              
              url: SITEURL + "/provider/provider-calendar-crud-ajax",
              data: {
                _token: "{{ csrf_token() }}",
                id: idd,
                type: 'delete'
              },
              type: 'POST',
              success: function(response) {
                // calendar.fullCalendar('removeEvents', idd);
                //displayMessage("Event removed");
                //alert('Deleted Sucussfull');
              }
            });

            Swal.fire(
              'Deleted!',
              'Delete Successfull.',
              'success'
            );
            window.location.reload();
          }
        })
      }
    });
    calendar.render();
  });
  </script>
  <script>
  $(document).ready(function() {
    var dateObjj = new Date();
    var year = dateObjj.getUTCFullYear();
    let random = Math.random() * 100;
    for (let i = 1; i <= 9; i++) {
      // jan to sept month start
      $(`[data-date=${year}-0${i}]`).on('click', '.fc-col-header-cell', function(e) {
        var day = $(this).text().toLowerCase();
        $(`[data-date=${year}-0${i}] table .fc-day`).removeClass('fchighlight')
          .filter('.fc-day-' + day).addClass('fchighlight');
        var className = $(".fchighlight .fc-scrollgrid-sync-inner .fc-daygrid-day-top a");
        Swal.fire({
          title: 'Do you want to show your availability?',
          showDenyButton: true,
          showCancelButton: true,
          confirmButtonText: 'Yes',
          denyButtonText: `No`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {

            let random = Math.random() * 100;
            for (let i = 0; i <= className.length; i++) {
              var abcc = className[i];
              var aaa = $(abcc).attr("aria-label");
              var aaaid = $(abcc).attr("id");
              if (aaaid) {
                const dateString = aaa;
                const date = new Date(dateString);
                const formattedDate = date.toISOString().slice(0, 10);
                const dateObj = new Date(formattedDate);
                const newDateObj = new Date(dateObj.setDate(dateObj.getDate() + 1));
                const formattedDates1 = newDateObj.toISOString().slice(0, 10);
                console.log(formattedDates1);
                const dateObj2 = new Date(formattedDate);
                const newDateObj2 = new Date(dateObj2.setDate(dateObj2.getDate() + 2));
                const formattedDates2 = newDateObj2.toISOString().slice(0, 10);
                console.log(formattedDates2);
                console.log("yes", i);
                var SITEURL = "{{ url('/') }}";

                var event_start = formattedDates1;
                var event_end = formattedDates2;
                $.ajax({
                  url: SITEURL + "/provider/provider-calendar-crud-ajax",
                  data: {
                    _token: "{{ csrf_token() }}",
                    event_name: "...",
                    event_start: event_start,
                    event_end: event_end,
                    bookingid: random,
                    type: 'createweek'
                  },
                  type: 'POST',
                  success: function(data) {}
                });
              }
            }
            Swal.fire('Saved!', '', 'danger');
            window.location.reload();
          } else if (result.isDenied) {
            let random = Math.random() * 100;
            for (let i = 0; i <= className.length; i++) {
              var abcc = className[i];
              var aaa = $(abcc).attr("aria-label");
              var aaaid = $(abcc).attr("id");
              if (aaaid) {
                const dateString = aaa;
                const date = new Date(dateString);
                const formattedDate = date.toISOString().slice(0, 10);
                const dateObj = new Date(formattedDate);
                const newDateObj = new Date(dateObj.setDate(dateObj.getDate() + 1));
                const formattedDates1 = newDateObj.toISOString().slice(0, 10);
                console.log(formattedDates1);
                const dateObj2 = new Date(formattedDate);
                const newDateObj2 = new Date(dateObj2.setDate(dateObj2.getDate() + 2));
                const formattedDates2 = newDateObj2.toISOString().slice(0, 10);
                console.log(formattedDates2);
                console.log("yes", i);
                var SITEURL = "{{ url('/') }}";

                var event_start = formattedDates1;
                var event_end = formattedDates2;
                $.ajax({
                  url: SITEURL + "/provider/provider-calendar-crud-ajax",
                  data: {
                    _token: "{{ csrf_token() }}",
                    event_name: "...",
                    event_start: event_start,
                    event_end: event_end,
                    bookingid: random,
                    type: 'creates'
                  },
                  type: 'POST',
                  success: function(data) {}
                });
              }
            }
            Swal.fire('Saved!', '', 'info');
            window.location.reload();
          }

        })
      })
      // jan  to sept month end
    } //for loop end

    // Oct month start
    $(`[data-date=${year}-10]`).on('click', '.fc-col-header-cell', function(e) {
      var day = $(this).text().toLowerCase();
      $(`[data-date=${year}-10] table .fc-day`).removeClass('fchighlight')
        .filter('.fc-day-' + day).addClass('fchighlight');
      var className = $(".fchighlight .fc-scrollgrid-sync-inner .fc-daygrid-day-top a");


      Swal.fire({
        title: 'Do you want to show your availability?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
      }).then((result) => {
        if (result.isConfirmed) {
          let random = Math.random() * 100;
          for (let i = 0; i <= className.length; i++) {
            var abcc = className[i];
            var aaa = $(abcc).attr("aria-label");
            var aaaid = $(abcc).attr("id");
            if (aaaid) {
              const dateString = aaa;
              const date = new Date(dateString);
              const formattedDate = date.toISOString().slice(0, 10);
              const dateObj = new Date(formattedDate);
              const newDateObj = new Date(dateObj.setDate(dateObj.getDate() + 1));
              const formattedDates1 = newDateObj.toISOString().slice(0, 10);
              console.log(formattedDates1);
              const dateObj2 = new Date(formattedDate);
              const newDateObj2 = new Date(dateObj2.setDate(dateObj2.getDate() + 2));
              const formattedDates2 = newDateObj2.toISOString().slice(0, 10);
              console.log(formattedDates2);
              console.log("yes", i);
              var SITEURL = "{{ url('/') }}";

              var event_start = formattedDates1;
              var event_end = formattedDates2;
              $.ajax({
                url: SITEURL + "/provider/provider-calendar-crud-ajax",
                data: {
                  _token: "{{ csrf_token() }}",
                  event_name: "...",
                  event_start: event_start,
                  event_end: event_end,
                  bookingid: random,
                  type: 'createweek'
                },
                type: 'POST',
                success: function(data) {}
              });

            }
          }
          window.location.reload();
          Swal.fire('Saved!', '', 'info');
        } else if (result.isDenied) {
          let random = Math.random() * 100;
          for (let i = 0; i <= className.length; i++) {
            var abcc = className[i];
            var aaa = $(abcc).attr("aria-label");
            var aaaid = $(abcc).attr("id");
            if (aaaid) {
              const dateString = aaa;
              const date = new Date(dateString);
              const formattedDate = date.toISOString().slice(0, 10);
              const dateObj = new Date(formattedDate);
              const newDateObj = new Date(dateObj.setDate(dateObj.getDate() + 1));
              const formattedDates1 = newDateObj.toISOString().slice(0, 10);
              console.log(formattedDates1);
              const dateObj2 = new Date(formattedDate);
              const newDateObj2 = new Date(dateObj2.setDate(dateObj2.getDate() + 2));
              const formattedDates2 = newDateObj2.toISOString().slice(0, 10);
              console.log(formattedDates2);
              console.log("yes", i);
              var SITEURL = "{{ url('/') }}";

              var event_start = formattedDates1;
              var event_end = formattedDates2;
              $.ajax({
                url: SITEURL + "/provider/provider-calendar-crud-ajax",
                data: {
                  _token: "{{ csrf_token() }}",
                  event_name: "...",
                  event_start: event_start,
                  event_end: event_end,
                  bookingid: random,
                  type: 'creates'
                },
                type: 'POST',
                success: function(data) {}
              });

            }
          }
          window.location.reload();
          Swal.fire('Saved!', '', 'danger');
        }
      })
    })
    // Oct month end
    // NOv month start
    $(`[data-date=${year}-11]`).on('click', '.fc-col-header-cell', function(e) {
      var day = $(this).text().toLowerCase();
      $(`[data-date=${year}-11] table .fc-day`).removeClass('fchighlight')
        .filter('.fc-day-' + day).addClass('fchighlight');
      var className = $(".fchighlight .fc-scrollgrid-sync-inner .fc-daygrid-day-top a");
      Swal.fire({
        title: 'Do you want to show your availability?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
      }).then((result) => {

        if (result.isConfirmed) {
          let random = Math.random() * 100;
          for (let i = 0; i <= className.length; i++) {
            var abcc = className[i];
            var aaa = $(abcc).attr("aria-label");
            var aaaid = $(abcc).attr("id");
            if (aaaid) {
              const dateString = aaa;
              const date = new Date(dateString);
              const formattedDate = date.toISOString().slice(0, 10);
              const dateObj = new Date(formattedDate);
              const newDateObj = new Date(dateObj.setDate(dateObj.getDate() + 1));
              const formattedDates1 = newDateObj.toISOString().slice(0, 10);
              console.log(formattedDates1);
              const dateObj2 = new Date(formattedDate);
              const newDateObj2 = new Date(dateObj2.setDate(dateObj2.getDate() + 2));
              const formattedDates2 = newDateObj2.toISOString().slice(0, 10);
              console.log(formattedDates2);
              console.log("yes", i);
              var SITEURL = "{{ url('/') }}";

              var event_start = formattedDates1;
              var event_end = formattedDates2;
              $.ajax({
                url: SITEURL + "/provider/provider-calendar-crud-ajax",
                data: {
                  _token: "{{ csrf_token() }}",
                  event_name: "...",
                  event_start: event_start,
                  event_end: event_end,
                  bookingid: random,
                  type: 'createweek'
                },
                type: 'POST',
                success: function(data) {}
              });

            }
          }
          Swal.fire('Saved!', '', 'info');
          window.location.reload();

        } else if (result.isDenied) {
          let random = Math.random() * 100;
          for (let i = 0; i <= className.length; i++) {
            var abcc = className[i];
            var aaa = $(abcc).attr("aria-label");
            var aaaid = $(abcc).attr("id");
            if (aaaid) {
              const dateString = aaa;
              const date = new Date(dateString);
              const formattedDate = date.toISOString().slice(0, 10);
              const dateObj = new Date(formattedDate);
              const newDateObj = new Date(dateObj.setDate(dateObj.getDate() + 1));
              const formattedDates1 = newDateObj.toISOString().slice(0, 10);
              console.log(formattedDates1);
              const dateObj2 = new Date(formattedDate);
              const newDateObj2 = new Date(dateObj2.setDate(dateObj2.getDate() + 2));
              const formattedDates2 = newDateObj2.toISOString().slice(0, 10);
              console.log(formattedDates2);
              console.log("yes", i);
              var SITEURL = "{{ url('/') }}";

              var event_start = formattedDates1;
              var event_end = formattedDates2;
              $.ajax({
                url: SITEURL + "/provider/provider-calendar-crud-ajax",
                data: {
                  _token: "{{ csrf_token() }}",
                  event_name: "...",
                  event_start: event_start,
                  event_end: event_end,
                  bookingid: random,
                  type: 'creates'
                },
                type: 'POST',
                success: function(data) {}
              });

            }
          }
          Swal.fire('Saved!', '', 'info');
          window.location.reload();
        }
      })
    })
    // NOv month end
    // Dec month start
    $(`[data-date=${year}-12]`).on('click', '.fc-col-header-cell', function(e) {
      var day = $(this).text().toLowerCase();
      $(`[data-date=${year}-12] table .fc-day`).removeClass('fchighlight')
        .filter('.fc-day-' + day).addClass('fchighlight');
      var className = $(".fchighlight .fc-scrollgrid-sync-inner .fc-daygrid-day-top a");

      Swal.fire({
        title: 'Do you want to show your availability?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Yes',
        denyButtonText: `No`,
      }).then((result) => {

        if (result.isConfirmed) {
          let random = Math.random() * 100;
          for (let i = 0; i <= className.length; i++) {
            var abcc = className[i];
            var aaa = $(abcc).attr("aria-label");
            var aaaid = $(abcc).attr("id");
            if (aaaid) {
              const dateString = aaa;
              const date = new Date(dateString);
              const formattedDate = date.toISOString().slice(0, 10);
              const dateObj = new Date(formattedDate);
              const newDateObj = new Date(dateObj.setDate(dateObj.getDate() + 1));
              const formattedDates1 = newDateObj.toISOString().slice(0, 10);
              console.log(formattedDates1);
              const dateObj2 = new Date(formattedDate);
              const newDateObj2 = new Date(dateObj2.setDate(dateObj2.getDate() + 2));
              const formattedDates2 = newDateObj2.toISOString().slice(0, 10);
              console.log(formattedDates2);
              console.log("yes", i);
              var SITEURL = "{{ url('/') }}";

              var event_start = formattedDates1;
              var event_end = formattedDates2;
              $.ajax({
                url: SITEURL + "/provider/provider-calendar-crud-ajax",
                data: {
                  _token: "{{ csrf_token() }}",
                  event_name: "...",
                  event_start: event_start,
                  event_end: event_end,
                  bookingid: random,
                  type: 'createweek'
                },
                type: 'POST',
                success: function(data) {}
              });

            }
          }
          Swal.fire('Saved!', '', 'info');
          window.location.reload();
        } else if (result.isDenied) {
          let random = Math.random() * 100;
          for (let i = 0; i <= className.length; i++) {
            var abcc = className[i];
            var aaa = $(abcc).attr("aria-label");
            var aaaid = $(abcc).attr("id");
            if (aaaid) {
              const dateString = aaa;
              const date = new Date(dateString);
              const formattedDate = date.toISOString().slice(0, 10);
              const dateObj = new Date(formattedDate);
              const newDateObj = new Date(dateObj.setDate(dateObj.getDate() + 1));
              const formattedDates1 = newDateObj.toISOString().slice(0, 10);
              console.log(formattedDates1);
              const dateObj2 = new Date(formattedDate);
              const newDateObj2 = new Date(dateObj2.setDate(dateObj2.getDate() + 2));
              const formattedDates2 = newDateObj2.toISOString().slice(0, 10);
              console.log(formattedDates2);
              console.log("yes", i);
              var SITEURL = "{{ url('/') }}";

              var event_start = formattedDates1;
              var event_end = formattedDates2;
              $.ajax({
                url: SITEURL + "/provider/provider-calendar-crud-ajax",
                data: {
                  _token: "{{ csrf_token() }}",
                  event_name: "...",
                  event_start: event_start,
                  event_end: event_end,
                  bookingid: random,
                  type: 'creates'
                },
                type: 'POST',
                success: function(data) {}
              });

            }


          }
          Swal.fire('Saved!', '', 'info');
          window.location.reload();
        }
      })


 

    })
    // Dec month end
  });

 

$(document).ready(function() {
  $(".fc-day-future .fc-daygrid-day-frame").hover(function(){
    var tooltip = '<div class="tooltipevent">Drag To Select!!</div>';
    var $tooltip = $(tooltip).appendTo(this);
    }, function(){   
     $(".tooltipevent").remove();
  });
});
  </script>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column avility">
            <div id="content">
            @include('layouts.topbar')
                <!-- End of Topbar -->

                <!-- $data[0]->status==0  -->
                <!-- isset($data[0]) && $data[0]->status==0 -->
                <div class="px-5 mt-5">
                @if(isset($data[0]) && $data[0]->status==0)

                
                <form action="{{route('provider.ablecalander')}}" method="post">
                    @csrf
                      <input type="text" hidden name="uid" value="{{$user->id}}">
                      <button type="submit" name="show" id="show" class="btn btn-md btn-primary px-4 mb-2">Show</button>
                </form> 
                @elseif(isset($data[0]) && $data[0]->status==1) 
                  <form action="{{route('provider.disablecalander')}}" method="post">
                    @csrf
                      <input type="text" hidden name="uid" value="{{$user->id}}">
                      <button type="submit" name="hide" id="hide" class="btn btn-md btn-primary px-4 mb-2">Hide</button>
                    </form> 

                    @else
 
                    @endif


                <div> <span class="Availablebox"></span> Available</div>
                <div><span class="Busybox"></span> Busy</div>
                      
                 <div id='calendar'
                  @if(isset($data[0]) && $data[0]->status==0)       
                  class="disabled"
                  @else
                  class="notdisabled"
                   @endif></div>
 

<!-- <div id='calendar'></div> -->
               </div>
        </div>
    </div>
</body>
 @endsection

 

