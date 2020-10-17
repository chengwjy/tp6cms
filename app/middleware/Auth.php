<?php

namespace app\middleware;
use think\facade\Session;
class Auth
{
    public function handle($request, \Closure $next)
    {
        if ($request->param('name') == 'think') {
            return redirect('index/think');
        }
        $id = Session::get('id');
        if(!$id){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}