<?php
namespace App\Providers;

use Auth;
use App\User;
use App\Image;
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
      $this->composeNavbarUserImage();
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

    private function composeNavbarUserImage()
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
