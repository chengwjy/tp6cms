<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\facade\Route;

// Route::get('think', function () {
//     return 'hello,ThinkPHP6!';
// });

Route::group('admin', function () {
    Route::get('/login', 'user/login');
    Route::post('/logindo', 'user/logindo');
    Route::get('/logout', 'user/logout')->middleware(\app\middleware\Auth::class);
    Route::post('/upload', 'user/upload')->middleware(\app\middleware\Auth::class);
});



Route::group('index', function () {
    Route::rule('', 'images/list');
    Route::rule('edit', 'images/edit');
    Route::rule('editdo', 'images/editdo');
    Route::rule('del', 'images/del');
})->middleware(\app\middleware\Auth::class);


Route::group('show', function () {
    Route::get('', 'show/index');
});
