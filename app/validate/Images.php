<?php

namespace app\validate;

use think\Validate;

class Images extends Validate
{
    protected $rule =   [
        'id'  => 'require|number|>=:0',
        'url'   => 'require|max:225',
        'sort'   => 'require|number|>=:0',
    ];
    
    protected $message  =   [

    ];
    
    protected $scene = [
        'edit'  =>  ['id','url','sort'],
    ];    
}