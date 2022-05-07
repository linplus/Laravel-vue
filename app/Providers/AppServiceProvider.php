<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Http::macro('github', function () {
            return Http::withHeaders([
                'X-log-id' => 'example',
            ])->baseUrl('https://githubdsadasdsadasdasd.com');
        });
    }
}
