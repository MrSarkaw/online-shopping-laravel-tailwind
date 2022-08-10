<?php

namespace App\Providers;

use App\Models\FavCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        view()->composer('layouts.public', function ($view) {
            $dt = [];
            if(Auth::user()){
                $dt = FavCart::where('user_id', Auth::id())->with('post')->get();
            }

            $view->with(['dtFav'=>$dt]);
        });
    }
}
