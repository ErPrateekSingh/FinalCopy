require('./bootstrap');
require('./ripple');

window.Vue = require('vue');

// code to prevent dropdown from closing on click inside STARTS
$(document).on('click', '.dd-user .dropdown-menu', function (e) { e.stopPropagation(); });
$(document).on('click', '.dd-notification .dropdown-menu', function (e) { e.stopPropagation(); });
// code to prevent dropdown from closing on click inside ENDS

// code to delay display of modal by 100 millisecond STARTS
$('[data-toggle=modal]').on('click', function (e) {
    var $target = $($(this).data('target'));
    $target.data('triggered',true);
    setTimeout(function() {
        if ($target.data('triggered')) {
            $target.modal('show')
                .data('triggered',false); // prevents multiple clicks from reopening
        };
    }, 100); // milliseconds
    return false;
});
// code to delay display of modal by 300 millisecond ENDS

// Code to validate form fields STARTS
function field_error(id){
   $('#error_'+id).attr('class', 'error');
   var div = $("#"+id).closest("div");
   div.removeClass("has-success");
   div.addClass("has-error has-feedback");
   $("#glyphcn"+id).remove();
   div.append('<span id="glyphcn'+id+'" class="glyphicon glyphicon-remove form-control-feedback"></span>');
}
function field_success(id){
   $('#error_'+id).attr('class', '');
   $('#error_'+id).text('');
   var div = $("#"+id).closest("div");
   div.removeClass("has-error");
   div.addClass("has-success has-feedback");
   $("#glyphcn"+id).remove();
   div.append('<span id="glyphcn'+id+'" class="glyphicon glyphicon-ok form-control-feedback"></span>');
}
function Validate(idName,type){
   var id = $("#"+idName).val();
   if(id==null||id=="") {
      $("#error_"+idName).text("This field is Required!");
      field_error(idName);
      return false;
   }else{
      if(type == 'a-s-only'){
         if (!id.match(/^[a-zA-Z ]+$/)) {
            $("#error_"+idName).text("Only alphabets and spaces are allowed!");
            field_error(idName);
            return false;
         } else {
            $("#error_"+idName).text("");
            field_success(idName);
            return true;
         }
      } else if(type == 'password'){
         if (id.length >= 6) {
            if (!id.match(/^[a-zA-Z0-9]+$/)) {
               $("#error_"+idName).text("Only alphabets and numbers are allowed!");
               field_error(idName);
               return false;
            } else {
               if (idName == 'password-confirm') {
                  if ($("#password-confirm").val() != $("#password").val()) {
                     $("#error_"+idName).text("Passwords not matched!");
                     field_error(idName);
                     return false;
                  }
               }
               $("#error_"+idName).text("");
               field_success(idName);
               return true;
            }
         } else {
            $("#error_"+idName).text("Min. 6 characters Allowed!");
            field_error(idName);
            return false;
         }
      } else if (type == "email") {
         if(!id.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/)) {
            $("#error_"+idName).text("Enter a valid Email Address!");
            field_error(idName);
            return false;
         } else {
            $("#error_"+idName).text("");
            field_success(idName);
            return true;
         }
      }
   }
}
// Code to validate form fields ENDS

// Code for indivadual Register fields STARTS
$('#fname').focusout(function(){Validate('fname','a-s-only');});
$('#lname').focusout(function(){Validate('lname','a-s-only');});
$('#email').focusout(function(){Validate('email','email');});
$('#password').focusout(function(){Validate('password','password');});
$('#password-confirm').focusout(function(){Validate('password-confirm','password');});
// Code for indivadual Register fields ENDS

//Code for Register Form Submit STARTS
$('#registerForm').on('submit', function(e){
   if(!(Validate('fname','a-s-only') && Validate('lname','a-s-only') && Validate('email','email') && Validate('password','password') && Validate('password-confirm','password'))) {
     e.preventDefault();
   }
});
//Code for Register Form Submit ENDS

// const app = new Vue({
//     el: '#app'
// });
