<?php
namespace LaraReb\Wechat;

use Illuminate\Support\Facades\Facade;

class Weix extends Facade
{
    public static function getFacadeAccessor()
    {
        return \LaraReb\Wechat\Weixin::class;
    }
}