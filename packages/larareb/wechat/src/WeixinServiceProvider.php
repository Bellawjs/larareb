<?php
namespace LaraReb\Wechat;

use Illuminate\Support\ServiceProvider;
use LaraReb\Wechat\Weixin;

class WeixinServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views','wechat');
        $this->publishes([
            __DIR__.'/../views'  => base_path('resources/views/vendor/wechat'),
            __DIR__.'/../assets' => public_path('vendor/wechat'),
            __DIR__.'/../config/wechat-config.php' => config_path('wechat-config.php')
        ], 'larareb');
    }

    public function register()
    {
        $this->app->singleton('weixin', function () {
            return new Weixin();
        });

        $this->app->bind('LaraReb\Wechat\Weixin',function(){
            return new Weixin();
        });
    }
}
?>