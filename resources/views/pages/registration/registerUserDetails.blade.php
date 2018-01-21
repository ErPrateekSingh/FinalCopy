@extends('layouts.app')

@section('styles')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('content')
<style>
/* Hide all steps by default: */
.tab {
   width: 100%;
   display: none;
   min-height: 350px;
   position: relative;
}
.tabHead{
   font-size: 24px;
   margin-bottom: 10px;
}
.form-radio, .form-group-mat {
    margin-top: 60px;
}
.categoryName, .subCategoryName {
   font-size: 18px;
   margin-top: 7px;
   font-weight: 500;
   text-align: center;
}
.changeCategory, .changeSubCategory {
    float: right;
    color: #3097D1;
    font-size: 14px;
    margin-top: 11px;
    margin-right: 10px;
    text-decoration: none;
}
.changeCategory:hover, .changeSubCategory:hover {
   color: #216a94;
   cursor: pointer;
   text-decoration: underline;
}
.tabWrapper {
   width: 100%;
}
.categoryBox, .subCategoryBox {
   margin: 1%;
   cursor: pointer;
   font-size: 14px;
   line-height: 0.9;
   border: 1px solid;
   padding: 11px 15px;
   border-color: #ccc;
   display: inline-block;
   width: calc(23% - 3px);
}
.categoryBox:hover, .subCategoryBox:hover {
   color: #555;
   border-color: rgba(244, 84, 95, 0.6);
   background-color: rgba(244, 84, 95, 0.25);
}
.subCatSelected, .subCatSelected:hover {
   color: #444;
   border-color: rgba(0, 131, 0, 0.6);
   background-color: rgba(0, 131, 0, 0.25);
}
.subCatFade {
   opacity: 0.5;
}

#nextBtn {
   background-color: #4CAF50;
   color: #ffffff;
   border: none;
   padding: 10px 20px;
   font-size: 16px;
}
/*button {
   background-color: #4CAF50;
   color: #ffffff;
   border: none;
   padding: 10px 20px;
   font-size: 17px;
   font-family: Raleway;
   cursor: pointer;
}*/

button:hover {
   opacity: 0.8;
}

#prevBtn {
   background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
   height: 15px;
   width: 15px;
   margin: 0 2px;
   background-color: #bbbbbb;
   border: none;
   border-radius: 50%;
   display: inline-block;
   opacity: 0.5;
}

.step.active {
   opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
   background-color: #4CAF50;
}
</style>
<div class="container">
   <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
         <div class="panel panel-form clearfix" style="margin-top: 50px;border-color: #ccc;">
            <div class="panel-body">
               <div class="col-xs-10 col-xs-offset-1">
                  <form id="#" class="form-horizontal clearfix" action="#" method="POST" role="form">
                     <!-- One "tab" for each step in the form: -->
                     <div class="tab">
                        <div class="tabHead">User Details :</div>
                        <hr>
                        <div class="tabWrapper clearfix">
                           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 fname-xs">
                              <div class="form-group form-group-mat{{ $errors->has('dob') ? ' has-error' : '' }}">
                                 <input id="dob" type="text" class="form-control" name="dob" value="{{ old('dob') }}" required autocomplete="off" spellcheck="false">
                                 <label for="dob" class="control-label"><i class="fa fa-calendar m-r-5"></i> Date of Birth</label><i class="bar"></i>
                                 <div id="error_dob" class=""></div>
                                 @if ($errors->has('dob'))
                                 <span class="help-block"> {{ $errors->first('dob') }} </span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-5 col-xs-offset-2 lname-xs">
                              <div class="form-group form-group-mat{{ $errors->has('gender') ? ' has-error' : '' }}">
                                 <select class="form-control" id="gender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                 </select>
                                 <label for="gender" class="control-label"><i class="fa fa-road m-r-5"></i> Gender</label><i class="bar"></i>
                                 <div id="error_gender" class=""></div>
                                 @if ($errors->has('gender'))
                                 <span class="help-block"> {{ $errors->first('gender') }} </span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 fname-xs">
                              <div class="form-group form-group-mat{{ $errors->has('state') ? ' has-error' : '' }}">
                                 <select class="form-control" id="state" name="state">
                                    <option value="">Select State</option>
                                    <option value="H">Harayana</option>
                                    <option value="U">Uttar Pradesh</option>
                                 </select>
                                 <label for="state" class="control-label"><i class="fa fa-map m-r-5"></i> State</label><i class="bar"></i>
                                 <div id="error_state" class=""></div>
                                 @if ($errors->has('state'))
                                 <span class="help-block"> {{ $errors->first('state') }} </span>
                                 @endif
                              </div>
                           </div>
                           <div class="col-lg-5 col-lg-offset-2 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-2 col-xs-5 col-xs-offset-2 lname-xs">
                              <div class="form-group form-group-mat{{ $errors->has('city') ? ' has-error' : '' }}">
                                 <select class="form-control" id="city" name="city">
                                    <option value="">Select City</option>
                                    <option value="A">Allahabad</option>
                                    <option value="N">New Delhi</option>
                                 </select>
                                 <label for="city" class="control-label"><i class="fa fa-map-marker m-r-5"></i> City</label><i class="bar"></i>
                                 <div id="error_city" class=""></div>
                                 @if ($errors->has('city'))
                                 <span class="help-block"> {{ $errors->first('city') }} </span>
                                 @endif
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab">
                        <div class="tabHead">User Profile Image :</div>
                        <hr>
                        <div class="tabWrapper clearfix">
                           
                        </div>
                     </div>
                     <div style="overflow:auto;">
                        <div style="float:right;">
                           <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                           <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                     </div>
                     <!-- Circles which indicates the steps of the form: -->
                     <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('scripts')
   <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
   $( function() {
      $( "#dob" ).datepicker({
         changeYear: true,
         changeMonth: true,
         dateFormat: "dd-mm-yy",
         yearRange: "c-85:c-0"
      });
      $("#dob").click(function(){
         if ($("#dob").val() == '') {
            $("#dob").val(" ");
         }
      });
   });
   </script>

   <script>
   var currentTab = 0; // Current tab is set to be the first tab (0)
   showTab(currentTab); // Display the crurrent tab

   function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
         document.getElementById("prevBtn").style.display = "none";
      } else {
         document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
         document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
         document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
   }

   function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
         // ... the form gets submitted:
         document.getElementById("regForm").submit();
         return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
   }

   function validateForm() {
      // var valid = true;
      var x, y, i, valid = true;
      var dob = $("#dob").val();
      if (dob == '' || dob.indexOf(' ') >= 0) {
         $("#dob").closest("div").addClass('has-error');
         $("#error_dob").addClass('error').text('This field is Required!');
         $("#dob").val("");
         valid = false;
      } else {
         if (dob.length !== 10) {
            $("#dob").closest("div").addClass('has-error');
            $("#error_dob").addClass('error').text('Invalid Date format!');
            valid = false;
         } else {
            $("#dob").closest("div").removeClass('has-error');
            $("#error_dob").removeClass('error').text('');
            valid = true;
         }
      }
      if ($("#gender").val() == '') {
         $("#gender").closest("div").addClass('has-error');
         $("#error_gender").addClass('error').text('This field is Required!');
         valid = false;
      } else {
         $("#gender").closest("div").removeClass('has-error');
         $("#error_gender").removeClass('error').text('');
         valid = true;
      }
      if ($("#state").val() == '') {
         $("#state").closest("div").addClass('has-error');
         $("#error_state").addClass('error').text('This field is Required!');
         valid = false;
      } else {
         $("#state").closest("div").removeClass('has-error');
         $("#error_state").removeClass('error').text('');
         valid = true;
      }
      if ($("#city").val() == '') {
         $("#city").closest("div").addClass('has-error');
         $("#error_city").addClass('error').text('This field is Required!');
         valid = false;
      } else {
         if (true) {

         } else {
            $("#city").closest("div").removeClass('has-error');
            $("#error_city").removeClass('error').text('');
            valid = true;
         }
      }
      // This function deals with validation of the form fields
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
         // If a field is empty...
         if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
         }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
         document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
   }

   function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
         x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
   }
   </script>
@endsection
