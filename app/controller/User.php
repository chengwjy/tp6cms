<?php
namespace app\controller;

use app\BaseController;
use think\facade\View;
use think\Request;
use app\validate\User as UserValidate;
use app\model\User as UserModel;
use think\facade\Session;
class User extends BaseController
{
  

    public function login()
    {
        return View::fetch();
    }

    public function logout(){
        Session::delete('id');
        return redirect('/admin/login');
    }
    public function logindo(Request $request,UserValidate $validate,UserModel $model)
    {
        $data = $request->param();
        if (!$validate->check($data)) {
            return json(['status' => -1, 'message' => $validate->getError()]);
        }
        $u = $model->where(['username' => $data['username'], 'password' => sha1($data['password'])])->find();
        if(!$u){
            return json(['status' => -1, 'message' => '用户名或密码错误']);
        }
        
        Session::set('id', $u->id);
        return json(['status' => 1]);
    }


    public function upload()
    {
        $file = request()->file('file');
        // 上传到本地服务器
        $savename = \think\facade\Filesystem::disk('public')->putFile( 'images', $file);
        $savename  = '/storage/' . $savename;
        return json(['status' => 1, 'src' => ['code' => 0, 'msg' => '', 'data' => ['src' => $savename]]]);
    }
}
