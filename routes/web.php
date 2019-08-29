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

// GET			/photos					index		photos.index
// GET			/photos/create			create		photos.create
// POST			/photos					store		photos.store
// GET			/photos/{photo}			show		photos.show
// GET			/photos/{photo}/edit	edit		photos.edit
// PUT/PATCH	/photos/{photo}			update		photos.update
// DELETE		/photos/{photo}			destroy		photos.destroy

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/test', 'HomeController@test');
Route::get('/wallpaper/{id}', 'WallpaperController@show')->name('wallpaper.show');

// upload routes
Route::get('/upload', 'WallpaperController@create')->name('upload');
Route::post('/upload', 'WallpaperController@store')->name('upload.store');

// Import route
Route::get('/import', 'ImportController@importToDB')->name('import');

// Admin
Route::get('/admin', 'AdminController@index')->name('admin');

