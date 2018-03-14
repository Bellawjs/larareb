<?php

namespace App\Admin\Controllers;

use App\Models\Db;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DbController extends Controller
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

            $content->header('数据源');

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

            $content->header('数据源');
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

            $content->header('数据源');

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
        return Admin::grid(DB::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('id',"id");
            $grid->column('db_type',"数据库类型");
            $grid->column('db_ip',"数据库ip");
            $grid->column('db_port',"数据库端口");
            $grid->column('db_user',"用户名");
            $grid->column('db_password',"密码");
            $grid->column('db_name',"数据库名");
            $grid->column('user_id',"用户id");

            // $grid->created_at();
            // $grid->updated_at();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(DB::class, function (Form $form) {

            $form->display('id', 'ID');

            // $form->display('created_at', 'Created At');
            // $form->display('updated_at', 'Updated At');
            
            $form->text('id',"id");
            $form->text('db_type',"数据库类型");
            $form->text('db_ip',"数据库ip");
            $form->text('db_port',"数据库端口");
            $form->text('db_user',"用户名");
            $form->text('db_password',"密码");
            $form->text('db_name',"数据库名");
            $form->text('user_id',"用户id");
            
        });
    }
}
