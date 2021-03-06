<?php

namespace GeekGhc\LaraFlash;
use Illuminate\Session\Store;
use Session;

//服务
class FlashNotifier
{
    // private $session;

    public function __construct()
    {
        // $this->session=$session;
    }

    public function success($message)
    {
        return $this->message($message,'success');
    }

    public function error($message)
    {
        return $this->message($message,'error');
    }

    public function warning($message)
    {
        return $this->message($message,'warning');
    }

    public function info($message){
        return $this->message($message,'info');
    }

    public function modal($message, $title = 'Message', $type = 'info')
    {
        $this->message($message, $type);
        Session::flash('flash_notification.modal', true);
        Session::flash('flash_notification.title', $title);
        return $this;
    }

    public function message($message,$type = 'info')
    {
        Session::flash('flash_notification.message',$message);
        Session::flash('flash_notification.type',$type);
        return $this;
    }

}