<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\City;
use App\State;
use App\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class RegisterUserController extends Controller
{
   /*function to check if email is unique through ajax request on register page; returns true if unique*/
   public function checkUniqueEmail(Request $request) {
      return json_encode(!User::where('email', '=', $request->email)->exists());
   }

   /*function to check if userName is unique through ajax request on register/user/details page using user's api; returns true if unique*/
   public function apiCheckUniqueUserName(Request $request) {
      return json_encode(!Detail::where('username', '=', $request->username)->exists());
   }

   /*function to check if userName is unique through ajax request on register/user/details page usins user api; returns true if unique*/
   public function ajaxGetCity(Request $request) {
      $cities = DB::table("cities")->select('city_id','city_name')->where("state_id",$request->state_id)->get();
      return response()->json($cities);
   }

   /*function to redirect user to user details page after register page*/
   public function showUserDetailsForm() {
      $states = State::all();
      return view('pages.registration.registerUserDetails', ['states'=> $states]);
   }

   /*function to post and save data to the database*/
   public function postUserDetailsForm(Request $request) {
      $validatedData = $request->validate([
         'username' => 'required|alpha_num|min:6|max:20|unique:details,username',
         'dob'      => 'required|date',
         'gender'   => 'required|string',
         'state'    => 'required|numeric',//validation rule for max min values
         'city'     => 'required|numeric',//validation rule for max min values
      ]);

      $post = new Detail;
      $post->user_id = Auth::user()->id;
      $post->username = $request->username;
      $post->dob = $request->dob;
      $post->gender = $request->gender;
      $post->state_id = $request->state;
      $post->city_id = $request->city;
      $post->save();
      return redirect()->route('register.user.image');
   }

   /*function to upload image page after redirected from the register/user/details page*/
   public function showUserImageForm() {
      return view('pages.registration.registerUserImage');
   }

   /*function to post image after upload from the register/user/images page*/
   public function postUserImageForm(Request $request) {

   }


   // public function showRegistrationForm() {
   //    return view('pages.registration.registration');
   // }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }
}
