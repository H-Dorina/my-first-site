<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// default welcome page
Route::get('/', function () {
    return view('welcome');
});
// pass a variable to a view
Route::get('/passVariable', function () {
    $nev="Dorina";
    return view('nezet',array('name'=>$nev));
});
// pass an executable javascript to a view (and execute it) - dangerous
Route::get('/runScript', function () {
    return view('runjs',array('script'=>'<script>alert("meg vagy tamadva!")</script>'));
});
// pass more data to a view using with method
Route::get('/passArray', function () {
 $tasks = [
 'Go to the store',
 'Go to the market',
 'Go to the work'
 ];
 $foobar = 'Most important task: make coffee';
 return view('tasklist')->with([
 'foo' => $foobar,
 'tasks' => $tasks
]);
});
// handle user input v1 static parameters
Route::get('/request-test', function () {
 return view('request-inputs', array('title' => request('title')));
});
// handle user input v2 dinamic routes based on dinamic parameters with error handling
Route::get('/posts/{post}', function ($post) {
 $posts = [
 'first-post' => 'Hello, this is my first blog post!',
 'second-post' => 'Now I am getting the hang of this blogging thing'
 ];
 if ( ! array_key_exists($post, $posts)) {abort(404);}
 return view('post', [
 'post' => $posts[$post] ?? 'Nothing here yet.'
]);
 });
 