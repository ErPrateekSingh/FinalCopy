<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $states = State::all();
      // $cities = DB::table("cities")->select('city_id','city_name')->where("state_id",$request->state_id)->get();
      // return view('home', ['states'=> $states]);
      return view('home');
    }
}
