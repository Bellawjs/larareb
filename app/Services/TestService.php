<?php

namespace App\Services;

use App\Contracts\TestContract;

//服务
class TestService implements TestContract
{
    public function callMe($controller)
    {
        dd('Call Me From TestServiceProvider In '.$controller);
    }

    public function getName($myname){
    	dd('my name is '.$myname);
    }
}