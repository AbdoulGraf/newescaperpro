<?php

namespace App\Providers;

use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Builder::defaultStringLength(191);

        URL::forceScheme('https');

        Http::macro('sandbox', function () {
            return Http::withToken(Session::get('ACCESS_TOKEN'))
                ->withHeaders([
                    'Accept' => 'application/vnd.ni-payment.v2+json',
                    'Content-Type' => 'application/vnd.ni-payment.v2+json',
                ])->baseUrl(config('app.SANDBOX_URL'));
        });

        Http::macro('payment', function () {
            return Http::withHeaders([
                'Accept' => 'application/vnd.ni-payment.v2+json',
                'Content-Type' => 'application/vnd.ni-payment.v2+json',
            ])->withToken(Session::get('ACCESS_TOKEN'))->baseUrl(getenv('PAYMENT_URL'));
        });
    }
}
