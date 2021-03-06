<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App;
use App\Contracts\TestContract;


//调用服务
class TestController extends Controller
{
    //依赖注入
    public function __construct(TestContract $test){
        $this->test = $test;
    }
    
    public function index()
    {
        // $test = App::make('test');
        // $test->callMe('TestController');
        // $this->test->callMe('TestController');
        $this->test->getName('wjs');
    }

}
