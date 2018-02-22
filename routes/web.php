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
        return view( 'visitors.main',['title'=>'']);
    })->name('visitor.welcome');

    Route::post('main',[
        'uses' => 'VisitorController@mainVisitors',
        'as' => 'visitor.main' 
    ]);

    Route::post('', [
        'uses' => 'VisitorController@createVisitor',
        'as' => 'visitor.create'
    ]);

    Route::get('/register',function(){
        return view( 'visitors.register',['isNew' => true]);
    })->name('visitor.register');

    Route::post('/update/{id}', [
        'uses' => 'VisitorController@postUpdateVisitor',
        'as' => 'visitor.Update'
    ]);

    Route::get('/update/{id}',[
        'uses' => 'VisitorController@updateVisitor',
        'as' => 'visitor.update'
    ]);

    Route::get('delete/{id}',[
        'uses' => 'VisitorController@deleteVisitor',
        'as' => 'visitor.delete'
    ]);
    
    Route::get('log/{id}',[
        'uses' => 'VisitorController@showLog',
        'as' => 'visitor.log'
    ]);

    Route::get('checkin/{id}',[
        'uses' => 'VisitorController@checkin',
        'as' => 'visitor.checkin'
    ]);

    Route::get('checkout/{id}',[
        'uses' => 'VisitorController@checkout',
        'as' => 'visitor.checkout'
    ]);

});



Route::group(['prefix'=>'/employee'],function(){

    Route::get('',function(){
        return view( 'employee.main',['title' => '']);
    })->name('employee.welcome');
    
    Route::get('/register',function(){
        return view( 'employee.register',['isNew'=>true]);
    })->name('employee.register');

    Route::post('main',[
        'uses' => 'EmployeesController@mainEmployees',
        'as' => 'employee.main' 
    ]);

    Route::post('', [
        'uses' => 'EmployeesController@createEmployee',
        'as' => 'employee.create'
    ]);

    Route::post('/update/{id}', [
        'uses' => 'EmployeesController@postUpdateEmployee',
        'as' => 'employee.Update'
    ]);

    Route::get('/update/{id}',[
        'uses' => 'EmployeesController@updateEmployee',
        'as' => 'employee.update'
    ]);

    Route::get('delete/{id}',[
        'uses' => 'EmployeesController@deleteEmployee',
        'as' => 'employee.delete'
    ]);
    
    Route::get('log/{id}',[
        'uses' => 'EmployeesController@showLog',
        'as' => 'employee.log'
    ]);

    Route::get('checkin/{id}',[
        'uses' => 'EmployeesController@checkin',
        'as' => 'employee.checkin'
    ]);

    Route::get('checkout/{id}',[
        'uses' => 'EmployeesController@checkout',
        'as' => 'employee.checkout'
    ]);

});



Route::get('/students',function(){
    return view( 'students.main');
})->name('students.main');

Route::get('/students/register',function(){
    return view( 'students.register');
})->name('students.register');



