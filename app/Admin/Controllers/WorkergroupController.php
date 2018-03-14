<?php

namespace App\Admin\Controllers;

use App\Models\Workergroup;

use App\Models\Worker;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use DB;

class WorkergroupController extends Controller
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

            $content->header('电工小组');

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

            $content->header('电工小组');

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

            $content->header('电工小组');

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
        return Admin::grid(Workergroup::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('zkcn61519280002','小组名称');

            $grid->column('zkcn61519280021','电工成员')->display(function ($text) {
                $arr=array_filter(explode("|", $text));
                $workers=Worker::where('zkcn61519278454','=','电工')->get();
                $arr_label=array();
                foreach ($workers as $key => $worker) {
                    $arr_label[$worker->id]=$worker->zkcn61519278535;
                }
                $str="";
                foreach ($arr as $key => $arr_one) {
                    $str.="<span class='label label-warning' style='margin-left:2px'>".$arr_label[$arr_one]."</span>";
                }
                return $str;
            });
            
            $grid->column('zkcn61519280074','小组组长')->display(function ($text) {
                $worker=Worker::find($text);
                $str="<span class='label label-info' style='margin-left:2px'>".$worker->zkcn61519278535."</span>";
                return $str;
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
        return Admin::form(Workergroup::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('zkcn61519280002','小组名称');
            
            $workers=Worker::where('zkcn61519278454','=','电工')->get();
            $workers_array=array();
            foreach ($workers as $key => $worker) {
                $workers_array[$worker->id]=$worker->zkcn61519278535;
            }
            $form->multipleSelect('zkcn61519280021','电工成员')->options($workers_array);
            
            $form->select('zkcn61519280074','小组组长')->options($workers_array);
            
            $form->saving(function (Form $form) {

                if($form->zkcn61519280021)
                    $form->zkcn61519280021=implode("|",$form->zkcn61519280021);

            });

        });
    }

}
