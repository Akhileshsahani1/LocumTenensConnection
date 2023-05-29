$(document).ready(function () {

  $('#sidebarToggle').click(function (e) {
    e.preventDefault();
    $('.sidebar').toggleClass('open-sidebar');
  });
});

// Signup Form Steps and Validation
var current_fs, next_fs, previous_fs;
var left, opacity;


//  validation
$("#next1").click(function () {
  var form = $(".msform ");
  var firstName = $('#firstName').val();
  var validFirstName = /^[A-Za-z]+$/;
  var lastName = $('#lastName').val();
  var validlastName = /^[A-Za-z]+$/;

  var pattern1 = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var email = $('#email').val();
  var validemail = pattern1.test(email);
  var phone = $('#phone').val();
  var state = $('#state').val();
  var city = $('#city').val();
  var zipcode = $('#zipcode').val();

  //var validzipcode = /^\d{5}$/;


  if (firstName == "") {
    $('#firstName_error').html("Please Enter your firstName");
    return false;
  } else {
    $('#firstName_error').html("");
  }

  if(firstName.length > 30)
  {
    $('#firstName_error').html("First name must be 30 character");
    return false;
  }else{
    $('#firstName_error').html("");
  }

  if (!validFirstName.test(firstName)) {
    $('#firstName_error').html("Please Enter only Character");
    return false;
  } else {
    $('#firstName_error').html("");
  }


  if (lastName == "") {
    $('#lastName_error').html("Please Enter your lastname");
    return false;
  }
  else {
    $('#lastName_error').html("");
  }


  if (!validlastName.test(lastName)) {
    $('#lastName_error').html("Please Enter only Character");
    return false;
  } else {
    $('#lastName_error').html("");
  }
  if (email == "") {
    $('#email_error').html("Please Enter your Valid Email");
    return false;
  }
  else if (!validemail) {
    $('#email_error').html("Please Enter only Valid Email");
    return false;

  }
  else {
    $('#email_error').html("");
  }
  if (phone == "") {
    $('#phone_error').html("Please Enter your  phone");
    return false;
  } else {
    $('#phone_error').html("");
  }
  var mobNum = $('#phone').val();
  // alert(mobNum.length);

  
    if (mobNum.length < 10) {
      $("#phone_error").html("Please enter min 10 digits mobile number");
      return false;
    } else {
      $("#phone_error").html(" ");
    }

    if (mobNum.length > 12) {
      $("#phone_error").html("Please enter max 12 digits with country code mobile number");
      return false;
    } else {
      $("#phone_error").html(" ");
    }
    if(isNaN(mobNum)){
      $("#phone_error").html("Please enter only number");
      return false;
    }else{
      $("#phone_error").html("");
    }

  if (state == "") {
    $('#state_error').html("Please Enter your state");
    return false;
  } else {
    $('#state_error').html("");
  }
  if (city == "") {
    $('#city_error').html("Please Enter your city");
    return false;
  } else {
    $('#city_error').html("");
  }
  if (zipcode == "") {
    $('#zipcode_error').html("Please Enter your zipcode");
    return false;
  } else {
    $('#zipcode_error').html("");
  }


  var mobNum1 = $('#zipcode').val();
  var filter1 = /^\d*(?:\.\d{1,2})?$/;

  if (filter1.test(mobNum1)) {
    if (mobNum1.length == 5) {
      $("#zipcode_error").html("");
    } else {
      $("#zipcode_error").html("Please put 5  digit Zipcode");
      return false;
    }
  }
  else {
    $("#zipcode_error").html("Not a valid Zipcode");
    return false;
  }

  // if (zipcode.value.match(validzipcode)) {
  //   $('#zipcode_error').html("Please Enter only five digit zipcode");
  //   return false;
  // } else {
  //   $('#zipcode_error').html("");
  // }


  form.validate({

  });
  if (form.valid() == true) {
    if ($('#account_information').is(":visible")) {
      current_fs = $('#account_information');
      next_fs = $('#personal_information');
    } else if ($('#personal_information').is(":visible")) {
      current_fs = $('#personal_information');
      next_fs = $('#professional_information');
    } else if ($
      ('#professional_information').is(":visible")) {
      current_fs = $('#professional_information');
      next_fs = $('#working_attribute');
    } else if ($('#working_attribute').is(":visible")) {
      current_fs = $('#working_attribute');
      next_fs = $('#upload_document');
    }
    next_fs.show();
    current_fs.hide();
  }
});


//2nd step
$("#next2").click(function () {
  //alert('fdf');
  var form = $(".msform ");
  var practitioner_Type = $('#practitioner_Type').val();
  var position_Type = $('#position_Type').val();
  var start_Date = $('#start_Date').val();
  var end_Date = $('#end_Date').val();
  var primary_Handedness = $('#primary_Handedness').val();
  var distance_Willing_To_Travel_One_Way = $('#distance_Willing_To_Travel_One_Way').val();
  var peferred_Daily_Working_Hours = $('#peferred_Daily_Working_Hours').val();
  if (practitioner_Type == "") {
    $('#practitioner_Type_error').html("Please Enter your Practitioner Type");
    return false;
  } else {
    $('#practitioner_Type_error').html("");
  }
  if (position_Type == "") {
    $('#position_Type_error').html("Please Enter your Position Type");
    return false;
  } else {
    $('#position_Type_error').html("");
  }
  if (start_Date == "") {
    $('#start_Date_error').html("Please Enter your Start Date");
    return false;
  } else {
    $('#start_Date_error').html("");
  }
  if (end_Date == "") {
    $('#end_Date_error').html("Please Enter your End Date");
    return false;
  } else {
    $('#end_Date_error').html("");
  }
  if (primary_Handedness == "") {
    $('#primary_Handedness_error').html("Please Enter your Primary Handedness");
    return false;
  } else {
    $('#primary_Handedness_error').html("");
  }
  if (distance_Willing_To_Travel_One_Way == "") {
    $('#distance_Willing_To_Travel_One_Way_error').html("Please Enter your Distance Willing");
    return false;
  } else {
    $('#distance_Willing_To_Travel_One_Way_error').html("");
  }
  if (peferred_Daily_Working_Hours == "") {
    $('#peferred_Daily_Working_Hours_error').html("Please Enter your Peferred Hours");
    return false;
  } else {
    $('#peferred_Daily_Working_Hours_error').html("");
  }

  form.validate({

  });
  if (form.valid() == true) {
    if ($('#account_information').is(":visible")) {
      current_fs = $('#account_information');
      next_fs = $('#personal_information');
    } else if ($('#personal_information').is(":visible")) {
      current_fs = $('#personal_information');
      next_fs = $('#professional_information');
    } else if ($('#professional_information').is(":visible")) {
      current_fs = $('#professional_information');
      next_fs = $('#working_attribute');
    } else if ($('#working_attribute').is(":visible")) {
      current_fs = $('#working_attribute');
      next_fs = $('#upload_document');
    }
    next_fs.show();
    current_fs.hide();
  }
});
//2nd step


//3rd step
$("#next3").click(function () {
  var form = $(".msform ");
  var preferred_Daily_Patient_Volume = $('#preferred_Daily_Patient_Volume').val();
  var are_You_Willing_Overnight = $('#are_You_Willing_Overnight').val();
  var booking_Availability_Requirements = $('#booking_Availability_Requirements').val();
  var preferred_Region = $('#preferred_Region').val();
  var professional_Experience = $('#professional_Experience').val();

  if (preferred_Daily_Patient_Volume == "") {
    $('#preferred_Daily_Patient_Volume_error').html("Please Enter Patient Volume ");
    return false;
  } else {
    $('#preferred_Daily_Patient_Volume_error').html("");
  }
  if (are_You_Willing_Overnight == "") {
    $('#are_You_Willing_Overnight_error').html("Please Enter Willing Overnight");
    return false;
  } else {
    $('#are_You_Willing_Overnight_error').html("");
  }
  if (professional_Experience == "") {
    $('#professional_Experience_error').html("Please Enter Professional Experience");
    return false;
  } else {
    $('#professional_Experience_error').html("");
  }
  if (booking_Availability_Requirements == "") {
    $('#booking_Availability_Requirements_error').html("Please Enter  Booking Availability ");
    return false;
  } else {
    $('#booking_Availability_Requirements_error').html("");
  }
  if (preferred_Region == "") {
    $('#preferred_Region_error').html("Please Enter Preferred Region");
    return false;
  } else {
    $('#preferred_Region_error').html("");
  }

  form.validate({

  });
  if (form.valid() == true) {
    if ($('#account_information').is(":visible")) {
      current_fs = $('#account_information');
      next_fs = $('#personal_information');
    } else if ($('#personal_information').is(":visible")) {
      current_fs = $('#personal_information');
      next_fs = $('#professional_information');
    } else if ($('#professional_information').is(":visible")) {
      current_fs = $('#professional_information');
      next_fs = $('#working_attribute');
    } else if ($('#working_attribute').is(":visible")) {
      current_fs = $('#working_attribute');
      next_fs = $('#upload_document');
    }
    next_fs.show();
    current_fs.hide();
  }
});
//3rd step
//4th step
$("#next4").click(function () {
  var form = $(".msform ");
  var available_Days = $('#available_Days').val();
  var procedure_Type = $('#procedure_Type').val();
  var advanced_Degree_Licences = $('#advanced_Degree_Licences').val();
  var comfortable_Treating_Children = $('#comfortable_Treating_Children').val();
  var qualities_Practice_Environment = $('#qualities_Practice_Environment').val();
  var average_Daily_Rate = $('#average_Daily_Rate').val();
  var average_hour_rate = $('#average_hour_rate').val();


  if (available_Days == "") {
    $('#available_Days_error').html("Please Enter  Available Days");
    return false;
  } else {
    $('#available_Days_error').html("");
  }
  if (procedure_Type == "") {
    $('#procedure_Type_error').html("Please Enter   Procedure Type");
    return false;
  } else {
    $('#procedure_Type_error').html("");
  }
  // if (advanced_Degree_Licences == "") {
  //   $('#advanced_Degree_Licences_error').html("Please Enter Degree Licences");
  //   return false;
  // } else {
  //   $('#advanced_Degree_Licences_error').html("");
  // }
  if (comfortable_Treating_Children == "") {
    $('#comfortable_Treating_Children_error').html("Please Enter Treating Children");
    return false;
  } else {
    $('#comfortable_Treating_Children_error').html("");
  }

  // if (qualities_Practice_Environment == "") {
  //   $('#qualities_Practice_Environment_error').html("Please Enter Practice Environment");
  //   return false;
  // } else {
  //   $('#qualities_Practice_Environment_error').html("");
  // }

  if (average_Daily_Rate == "") {
    $('#average_Daily_Rate_error').html("Please Enter Average Daily Rate");
    return false;
  } else {
    $('#average_Daily_Rate_error').html("");
  }

  if (average_hour_rate == "") {
    $('#average_hour_rate_error').html("Please Enter Average Hour Rate");
    return false;
  } else {
    $('#average_hour_rate_error').html("");
  }

  //4th step

  form.validate({

  });
  if (form.valid() == true) {
    if ($('#account_information').is(":visible")) {
      current_fs = $('#account_information');
      next_fs = $('#personal_information');
    } else if ($('#personal_information').is(":visible")) {
      current_fs = $('#personal_information');
      next_fs = $('#professional_information');
    } else if ($('#professional_information').is(":visible")) {
      current_fs = $('#professional_information');
      next_fs = $('#working_attribute');
    } else if ($('#working_attribute').is(":visible")) {
      current_fs = $('#working_attribute');
      next_fs = $('#upload_document');
    }


    next_fs.show();
    current_fs.hide();
  }
});
//4th step
//5th step
$("#next5").click(function () {
  var form = $(".msform ");
  var upload_Photo = $('#upload_Photo').val();
  var Virginia_Dental_File = $('#Virginia_Dental_File').val();
  var malpractices_Certificate = $('#malpractices_Certificate').val();
  var dea_License = $('#dea_License').val();
  var description = $('#description').val();

  if (upload_Photo == "") {
    $('#upload_Photo_error').html("Please Upload Image");
    return false;
  } else {
    $('#upload_Photo_error').html("");
  }
  if (Virginia_Dental_File == "") {
    $('#Virginia_Dental_File_error').html("Please Upload Dental File");
    return false;
  } else {
    $('#Virginia_Dental_File_error').html("");
  }
  if (malpractices_Certificate == "") {
    $('#malpractices_Certificate_error').html("Please Upload  Malpractices Certificate");
    return false;
  } else {
    $('#malpractices_Certificate_error').html("");
  }
  if (dea_License == "") {
    $('#dea_License_error').html("Please Upload Dea License");
    return false;
  } else {
    $('#dea_License_error').html("");
  }

  if (description == "") {
    $('#description_error').html("Please Enter your Bio");
    return false;
  } else {
    $('#description_error').html("");
  }

  form.validate({

  });
  if (form.valid() == true) {
    if ($('#account_information').is(":visible")) {
      current_fs = $('#account_information');
      next_fs = $('#personal_information');
    } else if ($('#personal_information').is(":visible")) {
      current_fs = $('#personal_information');
      next_fs = $('#professional_information');
    } else if ($('#professional_information').is(":visible")) {
      current_fs = $('#professional_information');
      next_fs = $('#working_attribute');
    } else if ($('#working_attribute').is(":visible")) {
      current_fs = $('#working_attribute');
      next_fs = $('#upload_document');
    }

    next_fs.show();
    current_fs.hide();
  }
});
//5th step

$('.previous').click(function () {
  if ($('#personal_information').is(":visible")) {
    current_fs = $('#personal_information');
    next_fs = $('#account_information');
  } else if ($('#professional_information').is(":visible")) {
    current_fs = $('#professional_information');
    next_fs = $('#personal_information');
  } else if ($('#working_attribute').is(":visible")) {
    current_fs = $('#working_attribute');
    //next_fs = $('#upload_document');
    next_fs = $('#professional_information');

  } else if ($('#upload_document').is(":visible")) {
    current_fs = $('#upload_document');
    next_fs = $('#working_attribute');
  }
  next_fs.show();
  current_fs.hide();
});
$(".submit").click(function () {
  return false;
});

$(document).ready(function () {
  $('#gloveSize').hide();
  $('#special_needs').hide();

  $('input:radio[name="daily_needs"]').change(
    function () {
      if ($(this).is(':checked') && $(this).val() == 'glove_size') {
        $('#gloveSize').show();
        $('#special_needs').hide();
      }
      else if ($(this).is(':checked') && $(this).val() == 'special_needs') {
        $('#gloveSize').hide();
        $('#special_needs').show();
      }
      else {
        $('#special_needs').hide();
        $('#gloveSize').hide();
      }
    });

});

function previewFile(input) {
  var file = $("input[type=file]").get(0).files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function () {
      $("#previewImg").attr("src", reader.result);
    }
    reader.readAsDataURL(file);
  }
}

// term and condition 

$("#example-basic").steps({
  headerTag: "a",
  bodyTag: ".content",
  transitionEffect: "slideLeft",
  autoFocus: true,
  onInit: function (event, current) {
    $('.actions > ul > li:first-child').attr('style', 'display:none');
  },
  labels: {
    next: "Accept",

  }
});


// Dashboard line chart

var colors = ['#4284DB'];
var chLine = document.getElementById("chLine");
var chartData = {
  labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "November"],
  datasets: [{
    data: [1000, 2200, 2500, 1500, 1500, 2900, 2300, 1600, 1600, 600,],
    backgroundColor: 'transparent',
    borderColor: colors[0],
    borderWidth: 3,
    pointBackgroundColor: colors[0]
  }
  ]
};
if (chLine) {
  new Chart(chLine, {
    type: 'line',
    data: chartData,
    options: {
      scales: {
        xAxes: [{
          ticks: {
            beginAtZero: false,
          },
          gridLines: {
            display: false
          }
        }]
      },
      legend: {
        display: false
      },
      responsive: true
    }
  });
}


// range datepicker
$(function () {
  $('input[name="daterange"]').daterangepicker({
    "autoApply": true,
    opens: 'left',
    icons: {
      date: "fa fa-calendar",
    }
  });
});

$(function () {
  $('input[name="dates"]').daterangepicker({
    "autoApply": true,
    opens: 'left',
    icons: {
      date: "fa fa-calendar",
    }
  });
});


$('#sm-ip-1').on('change', function (event) {
  var name = event.target.files[0].name;
  $('#file-name').text(name);
})



jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      // filesArr.forEach(function (f, index) {
      filesArr?.slice(0,10)?.forEach(function(f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
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
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
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

// checkbox clicking code

$("#dailyneeds_GloveSize_text").hide();
$("#dailyneeds_GloveSize").click(function () {
  if ($(this).is(":checked")) {
    $("#dailyneeds_GloveSize_text").show();
  } else {
    $("#dailyneeds_GloveSize_text").hide();
  }
});


$("#dailyneeds_SpecialNeeds_text").hide();
$("#dailyneeds_SpecialNeeds").click(function () {
  if ($(this).is(":checked")) {
    $("#dailyneeds_SpecialNeeds_text").show();
  } else {
    $("#dailyneeds_SpecialNeeds_text").hide();
  }
});

// $(document).ready(function () {
//   $(window).unload(saveSettings);
//   loadSettings();
// });

function loadSettings() {
  localStorage.firstName = $('#firstName').val();
  localStorage.lastName = $('#lastName').val();
  localStorage.email = $('#email').val();
  localStorage.phone = $("#phone").val();
}

function saveSettings() {
  $('#firstName').val(localStorage.firstName);
  $('#lastName').val(localStorage.lastName);
  $('#email').val(localStorage.email);
  $("#phone").val(localStorage.phone);
}
$(document).ready(function () {
  var hostname = window.location.hostname;
  var protocol = window.location.protocol;
  var port = window.location.port;
  var SITEURL = protocol + "//" + hostname;
  if (port !== "") {
    SITEURL += ":" + port;
  }
  var path = window.location.href;
  var path1 = SITEURL + "/provider/provider-changePassword";
  var path2 = SITEURL + "/provider/provider-raiseticket";
  if (path == path1 || path == path2) {
    $("#ggg").addClass('active');
  }
  $('.navbar-nav a').each(function () {
    if (this.href === path) {
      $(this).addClass('active');
    }
  });
});




