<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //---------------------------------
        view()->composer('*', function($view){
            $view_name = str_replace('.', '-', $view->getName());
            view()->share('view_name', $view_name);
        });
        //---------------------------------
        Str::macro('slug_utf8', function($title, $separator = '-'){
            $flip = $separator == '-' ? '_' : '-';
            $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);
            $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));
            $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);
            return trim($title, $separator);
        });
        //---------------------------------
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
