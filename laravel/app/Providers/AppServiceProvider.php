<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

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
        // part 1/?
//        Builder::macro('whereLike', function(string $attribute, string $searchTerm) {
//            return $this->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
//        });
        Paginator::useBootstrapFour();
    }
}
