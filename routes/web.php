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

//Basic Routing 
// Route::get('/hello', function () {
//     return '<h1>Hello world!!</h1>';
// });
// Route::get('/register', function () {
//     return '<h1>REGISTER!!</h1>';
// });
// Route::get('/ind', function () {
//         return view('welcome');
//     });

//dynamic routing for API
// Route::get('/users/{id}/{name}', function($id, $name) {
//     return 'The user is ' . $id . " and name is " . $name; 
// });
    

//Routing through Controller
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/login', 'PagesController@login');
Route::get('/company', 'PagesController@company');
Route::resource('posts', 'PostsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
