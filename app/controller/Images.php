<?php
namespace app\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Session;
use think\Request;
use app\model\Images as ImagesModel;
use app\validate\Images as ImagesValidate;
class Images extends BaseController
{
    public function list(ImagesModel $model)
    {

        $list = $model->order('sort')->select();
        View::assign('list', $list);
        return View::fetch();
    }

    public function edit($id = 0, ImagesModel $model){
        View::assign('id', $id);

        if($id){
            $obj = $model->where(['id' => $id])->find();
            View::assign('obj', $obj);
        }

        return View::fetch();
    }
    public function del($id, ImagesModel $model){
        $model->destroy($id);
        return json(['status' => 1]);
    }   

    public function editdo(Request $request, ImagesValidate $validate, ImagesModel $model){
        $data = $request->param();
        if (!$validate->check($data)) {
            return json(['status' => -1, 'message' => $validate->getError()]);
        }
        $id = $data['id'];
        unset($data['id']);
        if($id){
            $model->where(['id' => $id])->update($data);
        }else{
            
            $model->create($data);
        }
        return json(['status' => 1]);
    }
}
