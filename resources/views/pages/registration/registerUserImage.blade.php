@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
   .tabHeader{font-size: 24px;}
   .tabWrapper {width: 100%;}
   .tabButton{float: right;border: none;color: #ffffff;font-size: 18px;margin-top: 60px;padding: 8px 40px;margin-bottom: 20px;background-color: #4CAF50;}
   .tabButton:hover {opacity: 0.8;}
   .form-group-mat {margin-top: 60px;}
   select:required:invalid {color: gray;}
   option[value=""][disabled] {display: none;}
   option {color: black;}
</style>
@endsection

@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-12">
         <div class="panel panel-form clearfix" style="margin-top: 50px;border-color: #ccc;">
            <div class="panel-body">
               <div class="col-xs-10 col-xs-offset-1">
                  <form id="registerUserDetails" class="form-horizontal clearfix" method="POST" action="{{ route('register.user.details') }}" role="form" novalidate>
                     {{ csrf_field() }}
                     <div class="tabHeader">User Image :</div>
                     <div class="tabWrapper clearfix">
                        <div class="col-xs-12">
                           <div class="form-group form-group-mat{{ $errors->has('username') ? ' has-error' : '' }}">
                              <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="off" spellcheck="false">
                              <label for="username" class="control-label"><i class="fa fa-user m-r-5"></i> Username</label><i class="bar"></i>
                              <div id="error_username" class=""></div>
                              @if ($errors->has('username'))
                              <span class="help-block"> {{ $errors->first('username') }} </span>
                              @endif
                           </div>
                        </div>
                     </div>
                     <button type="submit" class="tabButton">Next</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
