<?php

namespace App\Admin\Controllers;

use App\Models\Worker;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class WorkerController extends Controller
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

            $content->header('工人');

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

            $content->header('工人');

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

            $content->header('工人');

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
        return Admin::grid(Worker::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('zkcn61519278454','类型');
            $grid->column('zkcn61519278535','姓名');
            $grid->column('zkcn61519278547','手机');
            $grid->column('zkcn61519278574','账号');
            
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Worker::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->select('zkcn61519278454','类型')->options(['电工' => '电工', '水工'=> '水工']);
            $form->text('zkcn61519278535','姓名');
            $form->text('zkcn61519278547','手机');
            $form->text('zkcn61519278574','账号');
            $form->text('zkcn61519278589','密码')->placeholder('要修改密码则填写');

            $form->saving(function (Form $form) {
                if($form->zkcn61519278589)
                    $form->zkcn61519278589=md5($form->zkcn61519278589);
            });

        });
    }
}
