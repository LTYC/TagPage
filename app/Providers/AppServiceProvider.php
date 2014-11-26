<?php namespace TagPage\Providers;

use Dotenv;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Dotenv::required([
            'DB_HOST',
            'DB_NAME',
            'DB_USERNAME',
            'DB_PASSWORD'
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
