<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterProfileController extends Controller
{
   public function showRegistrationForm() {
      $categories = DB::table("categories")->select('id','category_name','category_icon')->orderBy('category_name', 'asc')->get();
      return view('pages.registerProfile.registerProfileCategory', ['categories'=> $categories]);
   }
}
