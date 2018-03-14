<?php

// namespace App\Http\Controllers;
// use Session;
// use Request;
// use DB;
// use Log;
// use Intervention\Image\ImageManager;
// use File;
// use URL;
// use RongCloud;

// use App\Models\Adver;
// use App\Models\App;
// use App\Models\Article;
// use App\Models\Articleagree;
// use App\Models\Company;
// use App\Models\Component;
// use App\Models\Mailapply;
// use App\Models\Maillist;
// use App\Models\Msg;
// use App\Models\Notice;
// use App\Models\User;

// //总控制器
// class IndexController extends Controller
// {
//     function __construct(){
       
//     }

//     public function index(){
//         echo "good";
//     }
// }



/*IOC的学习*/

//超人
// class Superman {

//     protected $power;
//  //    public function __construct()
//  //    {
//  //        $this->power = new Power(999, 100);
// 	 //    $this->power = new Fight(9, 100);
// 	 //    $this->power = new Force(45);
// 	 //    $this->power = new Shot(99, 50, 2);
// 	 /*
// 	       $this->power = array(
// 	         new Force(45),
// 	         new Shot(99, 50, 2)
// 	       );
// 	 */
//  //    }
 	
   
//    public function __construct()
//     {
//         // 初始化工厂
//         $factory = new SuperModuleFactory;
 
//         // 通过工厂提供的方法制造需要的模块
//         $this->power = $factory->makeModule('Fight', [9, 100]);
//         // $this->power = $factory->makeModule('Force', [45]);
//         // $this->power = $factory->makeModule('Shot', [99, 50, 2]);
//         /*
//         $this->power = array(
//             $factory->makeModule('Force', [45]),
//             $factory->makeModule('Shot', [99, 50, 2])
//         );
//         */
//     }
// }

// class Superman
// {
//     protected $power;
 
//     public function __construct(array $modules)
//     {
//         // 初始化工厂
//         $factory = new SuperModuleFactory;
 
//         // 通过工厂提供的方法制造需要的模块
//         foreach ($modules as $moduleName => $moduleOptions) {
//             $this->power[] = $factory->makeModule($moduleName, $moduleOptions);
//         }
//     }
// }

// //超能力
// class Power {
//     /**
//      * 能力值
//      */
//     protected $ability;
 
//     /**
//      * 能力范围或距离
//      */
//     protected $range;
 
//     public function __construct($ability, $range)
//     {
//         $this->ability = $ability;
//         $this->range = $range;
//     }
// }

// //取消Power创建多个超能力的类
// class Flight
// {
//     protected $speed;
//     protected $holdtime;
//     public function __construct($speed, $holdtime) {}
// }
 
// class Force
// {
//     protected $force;
//     public function __construct($force) {}
// }
 
// class Shot
// {
//     protected $atk;
//     protected $range;
//     protected $limit;
//     public function __construct($atk, $range, $limit) {}
// }

// //工厂
// class SuperModuleFactory
// {
//     public function makeModule($moduleName, $options)
//     {
//         switch ($moduleName) {
//             case 'Fight':   return new Fight($options[0], $options[1]);
//             case 'Force':   return new Force($options[0]);
//             case 'Shot':    return new Shot($options[0], $options[1], $options[2]);
//         }
//     }
// }


// // 创建超人
// $superman = new Superman([
// 	'Fight' => [9, 100], 
// 	'Shot' => [99, 50, 2]
// ]);


// interface SuperModuleInterface
// {
//     /**
//      * 超能力激活方法
//      *
//      * 任何一个超能力都得有该方法，并拥有一个参数
//      *@param array $target 针对目标，可以是一个或多个，自己或他人
//      */
//     public function activate(array $target);
// }



// /**
//  * X-超能量
//  */
// class XPower implements SuperModuleInterface
// {
//     public function activate(array $target)
//     {
//         // 这只是个例子。。具体自行脑补
//     }
// }
 
// /**
//  * 终极炸弹 （就这么俗）
//  */
// class UltraBomb implements SuperModuleInterface
// {
//     public function activate(array $target)
//     {
//         // 这只是个例子。。具体自行脑补
//     }
// }

// class Superman
// {
//     protected $module;
 
//     public function __construct(SuperModuleInterface $module)
//     {
//         $this->module = $module
//     }
// }

// // 超能力模组
// $superModule = new XPower;
 
// // 初始化一个超人，并注入一个超能力模组依赖
// $superMan = new Superman($superModule);



// class Container
// {
//     protected $binds;
 
//     protected $instances;
 
//     public function bind($abstract, $concrete)
//     {
//         if ($concrete instanceof Closure) {
//             $this->binds[$abstract] = $concrete;
//         } else {
//             $this->instances[$abstract] = $concrete;
//         }
//     }
 
//     public function make($abstract, $parameters = [])
//     {
//         if (isset($this->instances[$abstract])) {
//             return $this->instances[$abstract];
//         }
 
//         array_unshift($parameters, $this);
 
//         return call_user_func_array($this->binds[$abstract], $parameters);
//     }
// }



namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use LaraFlash;
// use GeekGhc\LaraFlash\Flash;
// use Angkee\Laradmin\LaraAdmin;
use LarAdmin;
use Weix;
use LaraReb\Wechat\Weixin;

//总控制器
class IndexController extends Controller
{
    function __construct(){
       
    }

    public function home(){

        // 门面调用
        // Weix::checkAuth();die;
        
        //直接调用
        // $Weixin=new Weixin;
        // $Weixin->checkAuth();die;

        //app调用
        // app('weixin')->checkAuth();die;
        
        LaraFlash::success('Message');
        // Flash::success('Message');
        return view('home');
    }

    public function laradmin(){
    	// app('admin')->printRunning();
    	
    	// $LarAdmin=new LarAdmin;
    	// $LarAdmin->printRunning();
    	
    	LarAdmin::printRunning();
    }
}























?>