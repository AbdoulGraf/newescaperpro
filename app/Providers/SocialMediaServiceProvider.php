<?php

namespace App\Providers;

use App\Models\SocialMedia;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SocialMediaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            $socialMedia = SocialMedia::all(); // Fetch all social media links.
            $view->with('socialMedia', $socialMedia);
        });


    }
}
