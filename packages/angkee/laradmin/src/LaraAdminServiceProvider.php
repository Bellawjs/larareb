<?php

namespace Angkee\Laradmin;

use Illuminate\Support\ServiceProvider;
use Angkee\Laradmin\LaraAdmin;

class LaraAdminServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->singleton('admin', function () {
            return new LaraAdmin();
        });


        $this->app->bind('Angkee\Laradmin\LaraAdmin',function(){
            return new LaraAdmin();
        });
    }
}