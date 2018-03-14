<?php

use Illuminate\Routing\Router;

//后端路由

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('dbs', DbController::class);//数据源
	$router->resource('workers', WorkerController::class);//工人   
	$router->resource('workergroups', WorkergroupController::class);//电工小组
	$router->resource('msgs', MsgController::class);//工单消息

	
    
});




