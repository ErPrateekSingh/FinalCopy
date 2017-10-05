<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
   <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Zendur') }}</title>

   <meta name="description" content=""><!--To be added Later-->
   <meta name="keywords" content=""><!--To be added Later-->
   <meta name="author" content=""><!--To be added Later-->

   <!-- Schema.org markup for Google+ -->
   <meta itemprop="name" content="The Name or Title Here">
   <meta itemprop="description" content="This is the page description">
   <meta itemprop="image" content="http://www.example.com/image.jpg">

   <!-- Twitter Card data -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:site" content="@publisher_handle">
   <meta name="twitter:title" content="Page Title">
   <meta name="twitter:description" content="Page description less than 200 characters">
   <meta name="twitter:creator" content="@author_handle">
   <!-- Twitter summary card with large image must be at least 280x150px -->
   <meta name="twitter:image:src" content="http://www.example.com/image.jpg">

   <!-- Open Graph data -->
   <meta property="og:title" content="Title Here" />
   <meta property="og:type" content="article" />
   <meta property="og:url" content="http://www.example.com/" />
   <meta property="og:image" content="http://example.com/image.jpg" />
   <meta property="og:description" content="Description Here" />
   <meta property="og:site_name" content="Site Name, i.e. Moz" />
   <meta property="article:published_time" content="2013-09-17T05:59:00+01:00" />
   <meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
   <meta property="article:section" content="Article Section" />
   <meta property="article:tag" content="Article Tag" />
   <meta property="fb:admins" content="Facebook numberic ID" />

   <meta name="robots" content="index, follow"><!--To be checked and modify Later-->
   <meta name="mobile-web-app-capable" content="yes"><!--To be checked and modify Later-->
   <meta name="apple-mobile-web-app-capable" content="yes"><!--To be checked and modify Later-->
   <meta name="apple-mobile-web-app-status-bar-style" content="default"><!--To be checked and modify Later-->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet"><!--Laravel's stylesheet-->
   <!-- /*<style>
      @media (max-width: 577px) {
         .m-header .m-search {display: none !important;}
         .m-header .m-city {float: right;margin-right: 15px;}
      }
      @media (min-width: 576px) {
         .m-header {display: none;}
      }
      /*form.navbar-form.navbar-left {display: none !important;}*/
   </style>*/ -->
</head>
<!-- Update your html tag to include the itemscope and itemtype attributes. -->
<body itemscope itemtype="http://schema.org/WebPage">
   <div id="app">
      <nav class="navbar navbar-default" role="navigation">
         <div class="container-fluid">
            <div class="navbar-header">
               <button data-ripple="rgba(0,0,0,0.5)" type="button" class="navbar-toggle" data-toggle="modal" data-target="#sideNavModal">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="{{ url('/') }}">
                  {{ config('app.name', 'Zendur<!--Laravel-->') }}
               </a>
               <div class="m-header">
                  <div data-ripple="rgba(0,0,0,0.5)" class="m-city" data-toggle="modal" data-target=".cityModal">
                     <span class="m-city-name">
                        <i class="fa fa-map-marker m-r-5"></i>Mumbai
                     </span>
                  </div>
                  @if(Auth::guest())
                     <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#searchModal">
                        <i class="fa fa-search"></i>
                     </button>
                  @else
                     <button class="m-button-round m-user-image flatButton" data-toggle="modal"
                      data-target="#searchModal" style="background-image: url({{ asset('images/userImage44.jpg') }});">
                     </button>
                     <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#searchModal">
                        <i class="fa fa-bell-o"></i>
                        <div class="notify-badge">20</div>
                     </button>
                     <button data-ripple="rgba(0,0,0,0.5)" class="m-button-round m-icon flatButton" data-toggle="modal" data-target="#searchModal">
                        <i class="fa fa-search"></i>
                     </button>
                  @endif
               </div>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse navbar-right" id="navCollapse">
               <form class="navbar-form navbar-left" role="search">
                  <div class="form-group">
                     <div data-ripple="rgba(0,0,0,0.5)" class="header-city-name" data-toggle="modal" data-target=".cityModal">
                        <i class="fa fa-map-marker m-r-5"></i>Banglore
                     </div>
                     <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button data-ripple type="submit" class="headerSubmit flatButton btn-red"><i class="fa fa-search"></i></button>
               </form>
               <ul class="nav navbar-nav">
                  <li><a  data-ripple="rgba(0,0,0,0.5)" href="#" class="" title="Add Free Listing"><i class="fa fa-plus-circle m-r-5"></i>Add Free Listing</a></li>
                  @if(Auth::guest())
                     <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('login') }}"><i class="fa fa-sign-in m-r-5"></i>Login</a></li>
                     <li><a data-ripple="rgba(0,0,0,0.5)" href="{{ route('register') }}"><i class="fa fa-user-plus m-r-5"></i>Sign Up</a></li>
                  @else
                     <li class="dropdown dd-notification">
                        <a href="#" class="btn dropdown-toggle bell" type="button" data-toggle="dropdown" aria-expanded="false" title="20 Notifications">
                           <i class="fa fa-bell-o m-r-5"></i>
                           <span>Notifications</span>
                           <div class="notify-badge">20</div>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                           <div class="dd-menu-header">
                              Notifications
                           </div>
                           <div class="dd-menu-body">
                              <!--Notification Body Goes Here-->
                           </div>
                           <div align="center" class="dd-menu-footer">
                              <a href="#">See All Notifications</a>
                           </div>

                           <div class="dropdown-arrow-1"></div>
                           <div class="dropdown-arrow-2"></div>
                        </ul>
                     </li>
                     <li class="dropdown dd-user m-l-10">
                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" title="Prateek Singh&#013;(Hanuman Mandir Store)">
                           <span class="navbar-user-image" style="background-image: url({{ asset('images/userImage44.jpg') }});"></span>
                           <span class="navbar-user-name text-trim"> Prateek<!--/*{/*{ Auth::user()->name }*/}*/--></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                           <div class="dd-menu-body">
                              <div align="center" class="dd-menu-image"><img src="{{ asset('images/userImage100.jpg') }}" alt="User Image"></div>
                              <div class="dd-menu-name text-trim">Prateek Singh</div>
                              <div class="dd-menu-city text-trim">Allahabad, Uttar Pradesh, India</div>
                           </div>
                           <div class="dd-menu-footer clearfix">
                              <button data-ripple class="btn btn-red pull-left" href="#">Profile</button>
                              <button data-ripple="rgba(0,0,0,0.5)" class="btn btn-default pull-right" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    Sign Out
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                 </form>
                              </button>
                           </div>
                           <div class="dropdown-arrow-1"></div>
                           <div class="dropdown-arrow-2"></div>
                        </ul>
                     </li>
                  @endif
               </ul>
            </div>
         </div>
      </nav>

      @yield('content')

      <footer>
         <!--Footer Goes Here-->
      </footer>
   </div>

   <!--SideNav Modal Starts Here-->
   <div class="modal fade sideNav" id="sideNavModal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            @if(Auth::guest())
               <div class="modal-header sideNav-header">
                  <button data-ripple="rgba(0,0,0,0.5)" type="button" class="close sideNav-close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                  </button>
                  <div align="center" class="sideNav-image"><i class="fa fa-user"></i></div>
                  <div class="sideNav-name text-trim m-t-10">Guest User</div>
                  <div class="sideNav-city text-trim">Allahabad, Uttar Pradesh, India</div>
               </div>
               <div class="modal-body sideNav-body">
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-home"></i>Home</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-th"></i>Browse Category</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-plus-circle"></i>Add Free Listing</a>
                  <div class="divider"></div>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-sign-in"></i>Login</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-user-plus"></i>Register</a>
                  <div class="divider"></div>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-envelope"></i>Feedback</a>
               </div>
            @else
               <div class="modal-header sideNav-header">
                  <button data-ripple="rgba(0,0,0,0.5)" type="button" class="close sideNav-close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                  </button>
                  <div align="center" class="sideNav-image"><img src="{{ asset('images/userImage100.jpg') }}" alt="User Image"></div>
                  <div class="sideNav-name text-trim m-t-10">Prateek Singh</div>
                  <div class="sideNav-city text-trim">Allahabad, Uttar Pradesh, India</div>
               </div>
               <div class="modal-body sideNav-body">
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-home"></i>Home</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-user"></i>Profile</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-th"></i>Browse Category</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-plus-circle"></i>Add Free Listing</a>
                  <div class="divider"></div>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-heart"></i>Favourites</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-bookmark"></i>Bookmarks</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-comment"></i>Queries</a>
                  <div class="divider"></div>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-envelope"></i>Feedback</a>
                  <a href="#" data-ripple="rgba(0,0,0,0.5)"><i class="fa fa-sign-out"></i>Sign Out</a>
               </div>
            @endif
            <div class="modal-footer sideNav-footer">
               <div class="social-text">Connect with Us</div>
               <div class="social-wrap">
                  <span class="social-cont">
                     <a data-ripple href="#" class="social-fb"></a>
                  </span>
                  <span class="social-cont">
                     <a data-ripple href="#" class="social-tw"></a>
                  </span>
                  <span class="social-cont">
                     <a data-ripple href="#" class="social-gp"></a>
                  </span>
                  <span class="social-cont">
                     <a data-ripple href="#" class="social-li"></a>
                  </span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!--SideNav Modal Ends Here-->
   <!--City Modal Starts Here-->
   <div class="modal fade cityModal" id="m-city-modal" tabindex="-1" role="dialog" aria-labelledby="m-city-modal-label">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header cityModal-header">
           <button data-ripple="rgba(255,0,0,0.5)" type="button" class="close cityModal-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h3 class="modal-title" id="m-city-modal-label">Choose A City</h3>
         </div>
         <div class="modal-body cityModal-body">
           <form><!--  Add Other Attributes By Laravel -->
             <div class="form-group cityModal-form">
               <i class="fa fa-map-marker"></i>
               <input type="text" class="form-control" id="location" placeholder="Please Enter Your City Name">
               <!-- Use this position for suggestion of city while typing in input box -->
             </div>
           </form>
           <div class="cityModal-topCities col-xs-10 col-xs-offset-1 clearfix">
             <h4>Top Cities</h4>
             <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Delhi</div>
             <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Noida</div>
             <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Mumbai</div>
             <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Pune</div>
             <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Banglore</div>
             <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Vishakhapatannam</div>
             <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Chandigarh</div>
             <div data-ripple="rgba(0,0,0,0.5)" class="cityCont text-trim">Dehradun</div>
           </div>
         </div>
         <div class="modal-footer cityModal-footer">
             <!-- Use the modified Zendur site logo here -->
         </div>
       </div>
     </div>
   </div>
   <!--City Modal Ends Here-->

   <!--Search Modal Starts Here-->
   <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal-label">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-body searchModal-body">
           <div class="searchWrap">
             <button data-ripple="rgba(0,0,255,0.7)" class="backIcon close flatButton" data-dismiss="modal" aria-label="Close"><i class="fa fa-arrow-left"></i></button>
             <div class="searchInput">
               <input type="text" class="form-control" id="headerSearch" placeholder="Search Everything In Mumbai">
             </div>
             <button data-ripple="rgba(255,0,0,0.7)" class="closeIcon flatButton"><i class="fa fa-times"></i></button>
           </div>
           <!-- Auto sugesstion div will be placed here -->
         </div>
       </div>
     </div>
   </div>
   <!--Search Modal Ends Here-->

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
