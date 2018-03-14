<?php

namespace GeekGhc\LaraFlash;

use Illuminate\Support\ServiceProvider;
use GeekGhc\LaraFlash\FlashNotifier;

//服务提供者
class FlashProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/../views','laraflash');
        $this->publishes([
            __DIR__.'/../views' => $this->app->resourcePath('views/vendor/laraflash'),
        ], 'laraflash');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(
        //     'GeekGhc\LaraFlash\SessionStore',
        //     'GeekGhc\LaraFlash\LaravelSessionStore'
        // );

        $this->app->singleton('laraflash',function(){
            // return $this->app->make('GeekGhc\LaraFlash\FlashNotifier');
            return new FlashNotifier();
        });

        $this->app->bind('GeekGhc\LaraFlash\FlashNotifier',function(){
            return new FlashNotifier();
        });
    }
}
