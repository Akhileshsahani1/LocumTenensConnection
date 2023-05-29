<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body position-relative">
                <div class="iconouter">
                    <div class="logoutIcon"><img src="{{ asset('provider/img/logouticon.svg') }}" alt=""></div>
                </div>
                <div class="mt-5 text-center pt-3"><h5 class="font-18 fw-semibold" style="color:#616161;">Are you sure you want to log out?</h5></div>
                <div class="mb-3 mt-4 text-center">
                   <a href="{{ route('provider.logout')}}" class="btn btn-primary fw-semibold px-5 mx-2 ">Logout</a>
                     <button class="btn btn-outline-secondary fw-semibold px-5 mx-2" data-bs-dismiss="modal">CANCEL</button>
                  </div>
                </div>
            </div>
        </div>
      </div>
<script src="{{ asset('provider/js/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<script src="{{ asset('provider/js/Chart.js') }}"></script>
<script src="{{ asset('provider/js/moment.min.js') }}"></script>
<script src="{{ asset('provider/js/daterangepicker.min.js') }}"></script>
<script src="{{ asset('provider/js/bootstrap.bundle.min.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>

<script src="{{ asset('provider/js/script.js')}}"></script>
<script>

   jQuery(document).ready(function () {
    jQuery('#state').change(function () {
      
      
   let sid = jQuery(this).val();
     
   jQuery.ajax({
     url: 'provider-createsubmit/getCity',
     type: 'post',
     data: 'sid=' + sid + '&_token={{csrf_token() }}',
     success: function (result) {
   
        
       jQuery('#city').html(result)
     }
   });
   });
    });



  jQuery(document).ready(function () {
    jQuery('#state1').change(function () {
      
   let sid = jQuery(this).val();
   //alert(sid);
   jQuery.ajax({
     url: "{{route('provider.getCityById')}}",
     type: 'post',
     data: 'sid=' + sid + '&_token={{csrf_token() }}',
     success: function (result) {
   
       //alert('success');
       jQuery('#city1').html(result)
     }
   });
   });
});


   
$(function() {
  $("#start_Date").datepicker({
            dateFormat: "yy/mm/dd",
            altField: '#thealtdate',
            minDate: 0,
            onSelect: function (date) {
                // var dt2 = $('#end_Date');
                var startDate = $(this).datepicker('getDate');
                var minDate = $(this).datepicker('getDate');
                // dt2.datepicker('setDate', minDate);
                startDate.setDate(startDate.getDate() + "3M");
                // dt2.datepicker('option', 'maxDate', startDate);
                // dt2.datepicker('option', 'minDate', minDate);
                $(this).datepicker('option', 'minDate', minDate);
            }
        });
        // $('#end_Date').datepicker({
        //     dateFormat: "yy/mm/dd",
             
        // });
    });

    $(document).on('input', '#slider', function() {
    $('#slider_value').html( $(this).val() * 50000 );
    $('#slider_valuess').html( $(this).val());
});
  </script>


<!-- end data signup second password_get_info -->

<!-- <script>
	  		$( function() {
	   			$( "#start_date1" ).datepicker({
	   				minDate: 0
	   			});
	  		});
</script> -->
<script>
	  		$( function() {
	   			$( "#end_Date" ).datepicker({
            dateFormat: "yy/mm/dd",
	   				minDate: 0
	   			});
	  		});
</script>


<script>
$(document).on('input', '#slider', function() {
    $('#slider_value').html( $(this).val() * 50000 );
    $('#slider_valuess').html( $(this).val());
});
</script>

<!-- edit profile  -->


<script>
$(document).ready(function(){
  let dailyneeds_glovesize = $("#dailyneeds_GloveSize1").val();
   if(dailyneeds_glovesize){
    $("#dailyneeds_GloveSize_text1").show();
   }else{
    $("#dailyneeds_GloveSize_text1").hide();
}

let dailyneeds_specialdeeds = $("#dailyneeds_SpecialNeeds1").val();

if(dailyneeds_specialdeeds == 'Any Special Needs'){
 $("#dailyneeds_SpecialNeeds_text1").show();
}else{
  $("#dailyneeds_SpecialNeeds_text1").hide();
}
});
</script>


<!-- provider raise tickets file validation -->

<script>
// function imagecountvalidation() {
//   var file_element = document.getElementById('fileUpload').files;
//   if(file_element.length > 10 ){
//     $("#errorraisfile").html("Maximum 10 file can upload")
//     return false;
//   }
// }
</script>

<!-- text input limit raise tickets -->

<script>
$(document).ready(function() {
    var max_length = 1000;
    var data = $("#ticketDescription").val();
    $("#ticketDescription").keyup(function() {
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



<!-- text input limit bio sigup step 5 page -->

<script>
$(document).ready(function() {
    var max_length = 2500;
    var data = $("#description").val();
    $("#description").keyup(function() {
        var len = max_length - $(this).val().length;
        if (len > 0) {
            $("#charCountSignup").removeClass('text-danger');
            $("#charCountSignup").addClass('text-grey');
            $("#charCountSignup").text(
                'Bio field should not be of maximum 2500 characters length');
        } else {
            $("#charCountSignup").addClass('text-danger');
            $("#charCountSignup").removeClass('text-grey');
            $("#charCountSignup").text('Dont exceed more than 2500 characters');
        }
    });
});
</script>



<!-- update profile char count limitation -->


<script>
   $(document).ready(function () {
      var max_length = 2500;
      
      // var data = $('#description_update_profile').val();
      // var current_length = 2500-data.length;

      $('#charCount_update_profile').text(current_length);
			$('#description_update_profile').keyup(function () {
				var len = max_length - $(this).val().length;
				$('#charCount_update_profile').text(len);
			});

		});
	</script>



<script>
$(document).ready(function() {
    var max_length = 2500;
    var data = $("#description_update_profile").val();
    $("#description_update_profile").keyup(function() {
        var len = max_length - $(this).val().length;
        if (len > 0) {
            $("#charCount_update_profile").removeClass('text-danger');
            $("#charCount_update_profile").addClass('text-grey');
            $("#charCount_update_profile").text(
                'Bio field should not be of maximum 2500 characters length');
        } else {
            $("#charCount_update_profile").addClass('text-danger');
            $("#charCount_update_profile").removeClass('text-grey');
            $("#charCount_update_profile").text('Dont exceed more than 2500 characters');
        }
    });
});
</script>

</body>
</html>