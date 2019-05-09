<?php
use App\Post;
use App\User;
use App\Role;
use App\Image;

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

use Illuminate\Support\Facades\DB;

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

//Route::resource('posts','PostsController');
//
//
//Route::get('/contact','PostsController@contact');
//
//
//Route::get('/post/{id}','PostsController@showPost');


/*
 -----------------------------------------------------------------------------
 Database CRUD
-------------------------------------------------------------------------------
 */

// Insert Operation

//Route::get('/insert', function () {
//
//    DB::insert('insert into posts(title,content) values(?,?)', ['Laravel','Laravel is most using php framework']);
//
//});
//
// //Read Operation
//
//Route::get('/read', function () {
//
//   $results = DB::select('select * from posts where id=?',[1]);
//
//    foreach($results as $posts)
//    {
//            return $posts->title;
//    }
//
//});
//
//
//// Read Update
//
//Route::get('/update', function () {
//
//    $updated = DB::update('update posts set title="php with laravel" where id=?',[1]);
//
//    return $updated;
//
//});
//
//
//Route::get('/delete', function () {
//
//    $delete = DB::delete('delete from posts where id=?',[5]);
//
//    return $delete;
//
//});


/*
 -----------------------------------------------------------------------------
 Database ORM
-------------------------------------------------------------------------------
 */


//Route::get('/find', function(){
//
//    $posts= Post::find(1);
//
//
//    return $posts->title;
//
////    foreach($posts as $post) {
////
////        return $post->title;
////    }
//
//});


//Route::get('/findwhere', function(){
//
//    $posts= Post:: where('id=1')->orderBY('id','desc')->take(1)->get();
//
//
//    return $posts->title;
//
////    foreach($posts as $post) {
////
////        return $post->title;
////    }
//
//});


//Route::get('/create', function(){
//
//    Post::create(['title'=>'Python','content'=>'Django is common framework for laravel']);
//
//
//});


Route::get('/softDelete', function() {

    Post::where('admin',0)->first()->delete();

//    Post::find(1)->delete();


});

//Route::get('/readSoftDelete', function() {
//
//    $post=Post::withTrashed()->where('id',1)->get();
//
//    return $post;
//
//});

//Route::get('/restore', function() {
//
//    $post=Post::withTrashed()->where('id',3)->restore();
//
//    return $post;
//
//});


/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
|
*/
// Relationship 1 to 1 (user post)

//Route::get('/user/{id}/post', function($id){
//
////    return User::find($id)->post;
//
//    return User::find($id)->post->title;
//
//});
//
//
//// Relationship 1 to 1 inverse (user post)
//
//Route::get('/post/{id}/user', function($id){
//
//
//    return Post::find($id)->user;
//
//
//});
//
//
//// Relationship 1 to many relationship (user post)
//
//Route::get('/posts/{id}', function($id){
//
//
//    $user= User::find($id);
//
//    foreach($user->posts as $post){
//
//        echo $post->title."<br>";
//    }
//
//
//});

////Relationship Many to Many relationship (user role)
//
//
//Route::get('/user/{id}/role', function($id){
//
//    $user =  User::find($id);
//
//
//    foreach ($user->roles as $role){
//
//        echo $role->name."<br>";
//
//    }
//
//
//
//});


//Relationship Many to Many relationship (role to user)


Route::get('/role/{id}/user', function($id){

    $role =  Role::find($id);


    foreach ($role->users as $user){

        echo $user->name."<br>";

    }



});


//Relationship 1 to 1 Polymorphic (inage,user,post)

Route::get('user/images', function(){

    $user= User::find(1);

    foreach ($user->images as $image){

        return $image->url."<br>";

    }


});

//Relationship 1 to 1 Polymorphic (inage,user,post)

Route::get('post/images', function(){

    $post= Post::find(2);

    foreach ($post->images as $image){

        return $image."<br>";

    }


});



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
