@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
         <div class="panel panel-form clearfix">
            <div class="panel-circle">
               <i class="fa fa-lock" style="margin-top: 5px;"></i>
               <span style="font-size: 16px;line-height: 1.1;">Reset Password</span>
            </div>
            <div class="panel-body">
               @if (session('status'))
                  <div class="alert alert-success">
                     {{ session('status') }}
                  </div>
               @endif

               <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                  {{ csrf_field() }}
                  <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                     <div class="form-group form-group-mat{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                        <label for="email" class="control-label"><i class="fa fa-envelope m-r-5"></i> E-Mail Address</label><i class="bar"></i>
                        <div id="error_email" class=""></div>
                        @if ($errors->has('email'))
                           <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                        @endif
                     </div>

                     <div class="form-group form-group-mat" style="text-align:center;">
                        <button type="submit" class="btn btn-primary" data-ripple="rgba(255,255,255,0.5)" style="width:95%; margin-top: 10px;">
                           Send Password Reset Link
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
