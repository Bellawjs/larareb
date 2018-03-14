<?php
namespace Angkee\Laradmin;

use Illuminate\Support\Facades\Facade;


//门面
class LarAdmin extends Facade
{
    public static function getFacadeAccessor()
    {
        // return 'laraflash';
        return \Angkee\Laradmin\LaraAdmin::class;
    }
}