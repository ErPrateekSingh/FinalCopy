<?php

namespace App\Http\Controllers;

use Cookie;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexPageController extends Controller
{
   //function to show index page
   public function index(Request $request) {
      if($request->hasCookie('CTID')) {
         $ctid = $request->cookie('CTID');
         $cityInfo = DB::table("cities")->select('city_id', 'city_name')->where("city_id",$ctid)->first();
      } else {
         $cityInfo = DB::table("cities")->select('city_id', 'city_name')->where("city_id", '135')->first();
      }
      return view('welcome', ['cityInfo'=> $cityInfo]);
   }
}
