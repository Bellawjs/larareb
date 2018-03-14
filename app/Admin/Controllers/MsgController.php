<?php

namespace App\Admin\Controllers;

use App\Models\Msg;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use App\Admin\Extensions\Tools\SendMsg;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\User;
use RongCloud;
use Illuminate\Support\MessageBag;
use Encore\Admin\Widgets\Box;

class MsgController extends Controller
{
    use ModelForm;
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('消息');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('消息');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('消息');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Msg::class, function (Grid $grid) {

            $grid->model()->where('zkcn61516268724', '=','工单消息');

            $grid->id('ID')->sortable();

            $grid->column('zkcn61516268724','消息类型')->display(function ($text) {
                $str="";
                switch ($text) {
                    case '会话消息':
                        $str="<span class='label label-success'>".$text."</span>";
                        break;
                    case '工单消息':
                        $str="<span class='label label-warning'>".$text."</span>";
                        break;
                    case '系统消息':
                        $str="<span class='label label-primary'>".$text."</span>";
                        break;
                }
                return $str;
            });
            // $grid->column('zkcn61516268761','内容');
            $grid->column('zkcn61516268784','用户id');
            $grid->column('zkcn61516268811','用户类型');
            $grid->column('zkcn61516268858','是否读取');
            $grid->column('zkcn61516268889','日期');

            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
            });
            
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Msg::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('zkcn61516268724','类型');
            $form->textarea('zkcn61516268761','内容')->row(10);
            $form->text('zkcn61516268784','用户id');
            $form->select('zkcn61516268811','用户类型')->options(['普通用户' => '普通用户', '企业'=> '企业']);
            $form->text('zkcn61516268858','是否读取');
            $form->datetime('zkcn61516268889','日期')->format('YYYY-MM-DD HH:mm:ss');
            $form->text('zkcn61516269359','好友id');
            $form->select('zkcn61516269387','好友类型')->options(['普通用户' => '普通用户', '企业'=> '企业']);

        });
    }

}
