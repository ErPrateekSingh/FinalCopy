<?php
namespace App\Providers;

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
         $view->with('userImage',User::join('images', 'users.image_id', '=', 'images.id')
            ->join('details', 'users.id', '=', 'details.user_id')
            ->select('images.image_path', 'images.created_at', 'details.username')
            ->first());
      });
    }
}
