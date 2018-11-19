<?php

namespace App\Http\Controllers;

use DB;
use Cookie;
use App\City;
use Illuminate\Http\Request;

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

   public function ajaxFetchCity(Request $request)
   {
      $query = $request->term;
      if ($query) {
         $cities = DB::table("cities")
         ->select('city_id','city_name')
         ->where("city_name", 'like', $query.'%')
         ->limit(5)
         ->get();
         if($cities != '[]'){
            return response()->json($cities);
         } else {
            $cities = DB::table("cities")
            ->select('city_id','city_name')
            ->where("city_name", 'like', '%'.$query.'%')
            ->limit(5)
            ->get();
            if($cities != '[]'){
               return response()->json($cities);
            } else {
               $val = '[{"city_id":0,"city_name":"Oops! No City Found"}]';
               return json_decode($val, true, JSON_UNESCAPED_SLASHES);
            }
         }
      }
   }

}
