@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
         <div class="panel panel-form clearfix">
            <div class="panel-circle">
               <i class="fa fa-user-plus" style="margin-left: 5px;"></i>
               <span style="margin-left: 5px;">SIGN-UP</span>
            </div>
            <div class="panel-body">
               <form id="registerForm" class="form-horizontal clearfix" method="POST" action="{{ route('register') }}">
                  {{ csrf_field() }}
                  <div class="col-xs-10 col-xs-offset-1">
                     <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 fname-xs">
                           <div class="form-group form-group-mat{{ $errors->has('fname') ? ' has-error' : '' }}">
                              <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autocomplete="off" spellcheck="false">
                              <label for="fname" class="control-label"><i class="fa fa-user m-r-5"></i> First Name</label><i class="bar"></i>
                              <div id="error_fname" class=""></div>

                              @if ($errors->has('fname'))
                              <span class="help-block"> {{ $errors->first('fname') }} </span>
                              @endif
                           </div>
                        </div>
                        <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-5 col-xs-offset-1 lname-xs">
                           <div class="form-group form-group-mat{{ $errors->has('lname') ? ' has-error' : '' }}">
                              <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autocomplete="off" spellcheck="false">
                              <label for="lname" class="control-label"><i class="fa fa-user m-r-5"></i> Last Name</label><i class="bar"></i>
                              <div id="error_lname" class=""></div>

                              @if ($errors->has('lname'))
                              <span class="help-block"> {{ $errors->first('lname') }} </span>
                              @endif
                           </div>
                        </div>
                     </div>

                     <div class="form-group form-group-mat{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="off" spellcheck="false">
                        <label for="email" class="control-label"><i class="fa fa-envelope m-r-5"></i> E-Mail Address</label><i class="bar"></i>
                        <div id="error_email" class=""></div>

                        @if ($errors->has('email'))
                        <span class="help-block"> {{ $errors->first('email') }} </span>
                        @endif
                     </div>

                     <div class="form-group form-group-mat{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="off" spellcheck="false">
                        <label for="password" class="control-label"><i class="fa fa-lock m-r-5"></i> Password</label><i class="bar"></i>
                        <div id="error_password" class=""></div>

                        @if ($errors->has('password'))
                        <span class="help-block"> {{ $errors->first('password') }} </span>
                        @endif
                     </div>

                     <div class="form-group form-group-mat">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off" spellcheck="false">
                        <label for="password-confirm" class="control-label"><i class="fa fa-lock m-r-5"></i> Confirm Password</label><i class="bar"></i>
                        <div id="error_password-confirm" class=""></div>
                     </div>

                     <div class="form-group form-group-mat" style="text-align:center;">
                        <button type="submit" onclick="validateRegister()" class="btn btn-primary" data-ripple="rgba(255,255,255,0.5)" style="width:40%; margin-top: 20px;">
                           Register
                        </button>
                     </div>
                  </div>
               </form>
               <div style="position: relative;">
                  <hr style="border-top-color: #ccc;width: 80%;margin-top: 40px;margin-bottom: 40px;">
                  <span style="font-size: 18px;font-style: italic;z-index: 10;position: absolute;top: -13px;right: calc(50% - 13px);background: white;width: 26px;padding: 0 6px 0 2px;">Or</span>
                  <div class="row">
                     <div class="col-sm-6">
                        <button data-ripple="rgba(255,255,255,0.7)" class="btn btn-lg fb-bg form-bg-btn">
                           <i class="fa fa-facebook m-r-5"></i> Join with Facebook
                        </button>
                     </div>
                     <div class="col-sm-6">
                        <button data-ripple="rgba(255,255,255,0.7)" class="btn btn-lg gp-bg form-bg-btn">
                           <i class="fa fa-google-plus m-r-5"></i> Join with Google
                        </button>
                     </div>
                  </div>
                  <span style="font-size: 12px;display: block;text-align: center;margin-top: 20px;">
                     By Signing Up, you agree to our <a href="#">Terms of Services</a> and <a href="#">Privacy Policy</a>.
                  </span>
                  <span style="display: block;text-align: center;margin-top: 20px;">
                     Have an account? <a href="{{ route('login') }}">Log in</a>
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
