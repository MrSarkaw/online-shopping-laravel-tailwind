<?php

namespace App\Providers;

use App\Models\Category;
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
                $dt = FavCart::where('user_id', Auth::id())->where('state', 0)->with('post')->get();
                $dt2 = FavCart::where('user_id', Auth::id())->where('state', 1)->with('post')->get();
            }

            $category = Category::all();

            $view->with(['dtFav'=>$dt, 'dtCard'  => $dt2, 'category'=>$category]);
        });
    }
}
