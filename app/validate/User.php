<?php

namespace app\validate;

use think\Validate;

class User extends Validate
{
    protected $rule =   [
        'username'  => 'require|max:20',
        'password'   => 'require|min:6|max:22',
    ];
    
    protected $message  =   [

    ];
    
    protected $scene = [
        'login'  =>  ['username','password'],
    ];    
}