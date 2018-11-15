<?php
namespace App\Http\Controllers;

use Auth;
use Image;
use App\User;
use App\City;
use App\State;
use App\Detail;
use App\Image as Img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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
      return view('pages.registerUser.registerUserDetails', ['states'=> $states]);
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
      // $post->user_id = Auth::user()->id;
      $post->id = Auth::user()->id;
      $post->username = $request->username;
      $post->dob = $request->dob;
      $post->gender = $request->gender;
      $post->state_id = $request->state;
      $post->city_id = $request->city;
      $post->save();
      DB::table('users')->where('id', Auth::user()->id)->update(['status_id' => '2', 'updated_at' => \Carbon\Carbon::now()]);
      return redirect()->route('register.user.image');
   }

   /*function to upload image page after redirected from the register/user/details page*/
   public function showUserImageForm() {
      return view('pages.registerUser.registerUserImage');
   }

   /*function to post image after upload from the register/user/images page*/
   public function postUserImageForm(Request $request) {
      $validatedData = $request->validate([
         'userImage'      => 'required|image|dimensions:min_width=250,min_height=250',
      ]);

      if ($request->hasFile('userImage')) {
         if(!Storage::exists('/public/images/uploads/'.date("Y").'/avatar')) {
            Storage::makeDirectory('/public/images/uploads/'.date("Y").'/avatar', 0775, true); //creates directory for images upload
         }
         $cropped_value = $request->input("cropped_value"); // Width,height,x,y for cropping
         $cp_v = explode(",",$cropped_value); // Explode width,height,x,y
         $file = $request->file('userImage');
         $file_name = time() . '.' . $file->getClientOriginalExtension(); // Get Cropped Image Extention
         $location = storage_path('/app/public/images/uploads/'.date("Y").'/'.$file_name); //Cropped Image Upload Path
         $location_avtr = storage_path('/app/public/images/uploads/'.date("Y").'/avatar/'.$file_name); //Cropped Image Upload Path for Avatar
         $img = Image::make($file->getRealPath());
         $img->crop($cp_v[0],$cp_v[1],$cp_v[2],$cp_v[3]); // Crop Image
         $img->resize(250, 250)->save($location); // Resize Image & Save Image
         $img->resize(40, 40)->save($location_avtr); // Resize Image & Save Image for Avatar (Displays only 32X32)

         $id = Img::insertGetId(['image_path' => $file_name, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]); // Save Image path in database
         DB::table('images_user')->insert(['user_id' => Auth::user()->id, 'image_id' => $id, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
         DB::table('users')->where('id', Auth::user()->id)->update(['status_id' => '3', 'image_id' => $id, 'updated_at' => \Carbon\Carbon::now()]);
         return redirect()->route('home');
      }
   }
}
