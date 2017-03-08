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

Route::get('/about', function () {
	$articles = \App\Article::paginate(10);
	
		return view('about', compact('articles'));
}); 

// Category Controllers
//-------------------------------------------------------------------
Route::post('/kategori/{id}', 'CategoryController@update');

Route::get('/kategori/{id}/edit', 'CategoryController@edit');

Route::get('/kategori/{id}/delete', 'CategoryController@destroy');

Route::post('/kategori', 'CategoryController@store');

Route::get('/kategori/create', 'CategoryController@create');
//-------------------------------------------------------------------

//Video Controllers
//-------------------------------------------------------------------
Route::get('/video/create', 'VideoController@create');

Route::get('/video/{article}', 'VideoController@show');

Route::post('/video', 'VideoController@store');

Route::get('/', 'VideoController@index');

Route::get('/video/{id}/edit', 'VideoController@edit');

Route::get('/video/{id}/delete', 'VideoController@destroy');

Route::post('/video/{id}', 'VideoController@update');
//-------------------------------------------------------------------


//Login and Logout
//-------------------------------------------------------------------
Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');


//User/admin related
//-------------------------------------------------------------------
Route::get('/admin', 'AdminController@index');

Route::get('/admin/change', 'SessionsController@edit');

Route::post('/admin', 'SessionsController@update');

Route::get('/register/create', 'AdminController@create');

Route::post('/register', 'AdminController@store');
//-------------------------------------------------------------------


// Password Reset
//-------------------------------------------------------------------
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('/password.reset/');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//-------------------------------------------------------------------

Route::get('/arkiv/{year}', function ($year) {
	
	$articles = DB::table('articles')->where('date', 'like', $year . '%')->paginate(9);
	
    return view('archiveView', compact('articles'));
	
	//$categories = DB::table('categories')->get();
    //return view('archiveView', compact('articles'), compact('categories'));
});

Route::get('/{tag}', function ($tag) {
	
	$getTag = DB::table('categories')->where('tag', $tag)->first();
	$articles = DB::table('articles')->where('category', $getTag->category)->paginate(9);
	
    return view('categoryView', compact('articles'));
});