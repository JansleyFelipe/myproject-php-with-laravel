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

// Route::get('/contact', function () {
//     return "Hi about page";
// });

// Route::get('/post/{id}/{name}', function($id, $name){

//     return "This is post number " . $id . $name;
// });

// Route::get('admin/posts/example', array('as' => 'admin.home', function(){

//     $url = route('admin.home');

//     return "This url is " . $url;

// }));

// Route::get('/post/{id}', 'PostsController@index');

// Route::resource('posts', 'PostsController');

// Route::get('/contact', 'PostsController@contact');

// Route::get('post/{id}/{name}/{passwd}', 'PostsController@show_post');



/*
|--------------------------------------------------------------------------
| DATABASE Raw SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function(){

//     DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with laravel', 'Laravel is the best thing that has happened to PHP']);

// });

// Route::get('/read', function(){

//     $results = DB::select('select * from posts where id=?', [1]);

//     foreach($results as $post){

//     return $post->content;

//     }
// });

// Route::get('/update', function(){

//     $updated = DB::update('update posts set title="Updated title" where id=?', [1]);

//     return $updated;

// });

// Route::get('/delete', function(){

//     $deleted = DB::delete('delete from posts where id=?', [1]);

//     return $deleted;

// });