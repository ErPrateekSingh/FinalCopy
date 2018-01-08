<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
   public function index() {
      return redirect()->route('manage.dashboard');
   }
   /* CareZone is for Admin And SuperAdministrator Only */
   public function carezone() {
      /* return CareZone view for Admin And SuperAdministrator here */
   }
   public function dashboard() {
      return view('manage.dashboard');
   }
}
