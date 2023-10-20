<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Validator::extend('end_date_after_start', function ($attribute, $value, $parameters, $validator) {
            $start_date = $validator->getData()['start_date'];
            return $value > $start_date;
        });
    
    }
}
