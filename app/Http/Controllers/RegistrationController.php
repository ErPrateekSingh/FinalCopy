<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
   /*function to check if email is unique through ajax request on register page; returns true if unique*/
   public function checkUniqueEmail(Request $request) {
      return json_encode(!User::where('email', '=', $request->email)->exists());
   }

   /*function to redirect user to user details page after register page*/
   public function showRegisterUserDetailsForm() {
      return view('pages.registration.registerUserDetails');
   }
   public function showRegistrationForm() {
      return view('pages.registration.registration');
   }
}
