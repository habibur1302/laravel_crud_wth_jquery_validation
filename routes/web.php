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




//.....registration route.....
Route::get('/registration','RegistrationController@register');
Route::post('/registration/check','RegistrationController@check')->name('registration.check');
Route::post('/registration/insert','RegistrationController@insert')->name('register.insert');


//...........admin route.........
Route::get('/admin-panel','AdminController@login');
Route::post('/admin-login-check','AdminController@login_check');
// Route::get('/admin-dashboard/{id}','AdminController@dashboard');
Route::get('/logout','AdminController@logout');

// Route::get('/admin/show','AdminController@manage_user')->name('admin');
Route::get('/admin/show','AdminController@show')->name('admin.show');
// Route::get('/admin/data','AdminController@getdata')->name('admin.data');
Route::get('/search','AdminController@search')->name('admin.data');
Route::get('/admin/edit/{id}','AdminController@edit')->name('admin.edit');
Route::post('/admin/update/{id}','AdminController@update')->name('admin.update');


