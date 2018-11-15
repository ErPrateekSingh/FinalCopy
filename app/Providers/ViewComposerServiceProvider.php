<?php
namespace App\Providers;

use Auth;
use Cookie;
use App\City;
use App\User;
use App\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      $this->composeCityInfo();
      $this->composeNavbarUserInfo();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function composeCityInfo()
    {
      view()->composer(['_includes.nav.mainNav','_includes.modals.cityModal','welcome'],function($view)
      {
         $minutes = 60 * 24 * 365 * 10; // ten years should be long enough
         if (Cookie::get('CTID') !== null){
            Cookie::queue(Cookie::make('CTSID', '2', $minutes));//For City Status ID
            Cookie::queue('CTSID', '2', $minutes, null, null, false, false);
            $ctid = Cookie::get('CTID');
         } else {
            Cookie::queue(Cookie::make('CTID', '135', $minutes));//For City ID
            Cookie::queue('CTID', '135', $minutes);
            Cookie::queue(Cookie::make('CTSID', '1', $minutes));//For City Status ID
            Cookie::queue('CTSID', '1', $minutes);
            $ctid = '135';
         }
         $view->with('cityName',DB::table("cities")
               ->select('city_id', 'city_name')
               ->where("city_id",$ctid)
               ->first());
      });
   }

    private function composeNavbarUserInfo()
    {
      view()->composer('_includes.nav.mainNav',function($view)
      {
         if(Auth::check())
         {
            if(Auth::user()->status_id==2){
               $view->with('userImage',User::join('details', 'users.id', '=', 'details.id')
                  ->select('details.username')
                  ->where('users.id', '=', Auth::user()->id)
                  ->get());
            }
            if(Auth::user()->status_id >= 3){
               $view->with('userImage',User::join('images', 'users.image_id', '=', 'images.id')
                  ->join('details', 'users.id', '=', 'details.id')
                  ->select('images.image_path', 'images.created_at', 'details.username')
                  ->where('users.id', '=', Auth::user()->id)
                  ->get());
            }
         }
      });
    }
}
