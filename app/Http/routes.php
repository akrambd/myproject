<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/about', function () {
//    return "Hi this is About page";
//});
//
//Route::get('/about/{id}/{name}', function ($id,$name) {
//    return "Age: ". $id. "</br> Name: ". $name;
//});
//
//
//Route::get('/admin/post/example',array('as'=>'admin.home', function(){
//
//
//
//   // $url= route('admin.home');
//
//    return "This page url is ". $url;
//
//
//}));

//Route::get('/post','PostsController@index');

Route::resource('posts','PostsController');


Route::get('/contact','PostsController@contact');


Route::get('/post/{id}','PostsController@showPost');





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
