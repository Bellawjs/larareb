<?php

namespace App\Admin\Extensions\Tools;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Tools\AbstractTool;

class SendMsg extends AbstractTool
{
    protected function script()
    {
        return <<<EOT

$('#sendmsg_id').on('click', function() {
    window.location.href = "sendmsg";
});

EOT;
    }

    public function render()
    {
        Admin::script($this->script());

        return view('admin.tools.sendmsg');
    }
}
