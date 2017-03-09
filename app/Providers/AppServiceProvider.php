<?php

namespace App\Providers;
use Phirehose;
use App\TwitterStream;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $this->app->bind('App\TwitterStream', function ($app) {
          $twitter_access_token = env('TWITTER_ACCESS_TOKEN', null);
          $twitter_access_token_secret = env('TWITTER_ACCESS_TOKEN_SECRET', null);
          return new TwitterStream($twitter_access_token, $twitter_access_token_secret, Phirehose::METHOD_FILTER);
      });
      Schema::defaultStringLength(225);
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
