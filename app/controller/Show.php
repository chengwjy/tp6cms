<?php
namespace app\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Session;
use think\Request;
use app\model\Images as ImagesModel;
use app\validate\Images as ImagesValidate;
class Show extends BaseController
{
    public function index(ImagesModel $model)
    {
        $list = $model->order('sort')->select();
        View::assign('list', $list);
        return View::fetch();
    }
   
}
