<?php

namespace App\Providers;
use App\Spider_article;
use App\Observers\SpiderArticleObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function ($query) {
            // echo $query->sql;
            // $query->bindings
            // $query->time
        });
        // register observers of Spider_article
        Spider_article::observe(SpiderArticleObserver::class);
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
