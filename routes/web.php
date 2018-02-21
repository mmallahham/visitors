<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome',function(){
    return view( 'welcome');
})->name('welcome');

Route::post('/welcome',function(){
    return view( 'welcome');
})->name('welcome');

Route::get('/indoor','StaticsController@indoor')->name('indoor');

Route::group(['prefix'=>'/visitors'],function(){

    Route::get('',function(){
        // [
        // 'uses' => 'VisitorController@listAllVisitors',
        // 'as' => 'visitor' ]
        return view( 'visitors.main',['success'=>'']);
    })->name('visitors.main');

    Route::post('', [
        'uses' => 'VisitorController@createVisitor',
        'as' => 'visitor.create'
    ]);

    Route::get('/register',function(){
        return view( 'visitors.register',['isNew' => true]);
    })->name('visitor.register');

    Route::post('/update/{id}', [
        'uses' => 'VisitorController@postUpdateVisitor',
        'as' => 'visitor.update'
    ]);

    Route::get('/{id}',[
        'uses' => 'VisitorController@updateVisitor',
        'as' => 'visitors.update'
    ]);


});


Route::get('/students',function(){
    return view( 'students.main');
})->name('students.main');

Route::get('/students/register',function(){
    return view( 'students.register');
})->name('students.register');

Route::get('/staff',function(){
    return view( 'staff.main');
})->name('staff.main');

Route::get('/staff/register',function(){
    return view( 'staff.register');
})->name('staff.register');



