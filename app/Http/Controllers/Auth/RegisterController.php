<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


     //email validation link here, after email validation redirect here.
     //
    protected $redirectTo = '/register/user/details';/* Redirected to '/user/details' page rather than '/home' */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6', /*'|confirmed' - Removed to avoid password confimation*/
            'g-recaptcha-response' => 'required|captcha', /* g-captcha validation*/
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'fname' => ucwords(strtolower($data['fname'])),
            'lname' => ucwords(strtolower($data['lname'])),
            'email' => strtolower($data['email']),
            'password' => bcrypt($data['password']),
        ]);
        // This will assign users with 'subscriber' role
        $user->attachRole('subscriber');
        $user->save();
        return $user;
    }
}
