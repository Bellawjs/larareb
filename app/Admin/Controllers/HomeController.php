<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Chart\Bar;
use Encore\Admin\Widgets\Chart\Doughnut;
use Encore\Admin\Widgets\Chart\Line;
use Encore\Admin\Widgets\Chart\Pie;
use Encore\Admin\Widgets\Chart\PolarArea;
use Encore\Admin\Widgets\Chart\Radar;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;
use DB;
use App\Models\Component;
use Encore\Admin\Widgets\Navbar;
use View;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Auth;
use Request;

class HomeController extends Controller
{
    public function index()
    {
        //布局右侧数据库
        return Admin::content(function (Content $content) {

            $content->header('控制面板');
            $headers = [];
            
            $webdatas['os'] = PHP_OS;
            $webdatas['apacheversion'] =php_uname('s').php_uname('r') ;
            $webdatas['zend_version'] =Zend_Version();
            $webdatas['server_ip']=GetHostByName($_SERVER['SERVER_NAME']);
            
            $webdatas['sysos'] = $_SERVER["SERVER_SOFTWARE"];      //获取服务器标识的字串
            $webdatas['sysversion'] = PHP_VERSION;                   //获取PHP服务器版本
            
            $con=mysqli_connect(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));  
            $webdatas['mysqlinfo']=mysqli_get_server_info($con);

            //从服务器中获取GD库的信息
            if(function_exists("gd_info")){                  
            $webdatas['gd'] = gd_info();
            $webdatas['gdinfo'] = $webdatas['gd']['GD Version'];
            }else {
            $webdatas['gdinfo'] = "未知";
            }
            //从GD库中查看是否支持FreeType字体
            $webdatas['freetype'] = $webdatas['gd']["FreeType Support"] ? "支持" : "不支持";
            //从PHP配置文件中获得是否可以远程文件获取
            $webdatas['allowurl']= ini_get("allow_url_fopen") ? "支持" : "不支持";
            //从PHP配置文件中获得最大上传限制
            $webdatas['max_upload'] = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
            //从PHP配置文件中获得脚本的最大执行时间
            $webdatas['max_ex_time']= ini_get("max_execution_time")."秒";
            //以下两条获取服务器时间，中国大陆采用的是东八区的时间,设置时区写成Etc/GMT-8
            date_default_timezone_set("Etc/GMT-8");
            $webdatas['systemtime'] = date("Y-m-d H:i:s",time());

            $rows = [
                ['操作系统', $webdatas['os'] ],
                ['服务器', $webdatas['apacheversion'] ],
                ['PHP版本', $webdatas['sysversion'] ],
                ['MySQL版本', $webdatas['mysqlinfo'] ],
                ['Zend版本', $webdatas['zend_version'] ],
                ['GD库版本', $webdatas['gdinfo'] ],
                ['FreeType', $webdatas['freetype'] ],
                ['远程文件获取', $webdatas['allowurl']  ],
                ['最大上传限制', $webdatas['max_upload']  ],
                ['最大执行时间', $webdatas['max_ex_time']  ],
                ['服务器时间', $webdatas['systemtime']  ],
                ['服务器IP', $webdatas['server_ip']  ],
            ];

            $content->row((new Box('服务器配置', new Table($headers, $rows)))->style('info')->solid());

        });


        
    }
}
