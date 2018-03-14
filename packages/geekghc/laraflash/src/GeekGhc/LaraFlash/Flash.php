<?php
namespace GeekGhc\LaraFlash;
use Illuminate\Support\Facades\Facade;


//门面
class Flash extends Facade
{
    public static function getFacadeAccessor()
    {
        // return 'laraflash';
        return \GeekGhc\LaraFlash\FlashNotifier::class;
    }
}