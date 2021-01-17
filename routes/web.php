<?php

use Illuminate\Support\Facades\Route;

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





// ----------------------Admin Panal----------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','User\homePageController@index')->name('/');
Route::get('/doctor','User\homePageController@doctor')->name('view-doctor');
Route::get('/clinic','User\homePageController@clinic')->name('view-clinic');

// -----------------------Doctor Controller -------------------
Route::get('/home/add-doctor', 'Admin\doctor\doctorController@add_doctor')->name('add-doctor');
Route::get('/home/manage-doctor', 'Admin\doctor\doctorController@manage_doctor')->name('manage-doctor');
Route::post('/home/save-doctor', 'Admin\doctor\doctorController@save_doctor')->name('save-doctor');


// -----------------------Add Clinic Controller -------------------
Route::get('/home/add-clinic', 'Admin\clinic\clinicController@add_clinic')->name('add-clinic');
Route::get('/home/save-clinic', 'Admin\clinic\clinicController@manage_clinic')->name('manage-clinic');

// ------------------------Add Category Controller ----------------
Route::get('/home/manage-category', 'Admin\medicin\categoryController@manage_category')->name('manage-category');
Route::post('/home/save-category', 'Admin\medicin\categoryController@save_category')->name('save-category');
Route::get('/home/view-category', 'Admin\medicin\categoryController@view_category')->name('view-category');
Route::get('/home/category-wise-product/{category_id}', 'Admin\medicin\categoryController@category_wise_product')->name('category-wise-product');



// ------------------------Add Product Controller --------------------
Route::get('/home/manage-product', 'Admin\medicin\productController@manage_product')->name('manage-product');
Route::post('/home/save-product', 'Admin\medicin\productController@save_product')->name('save-product');
Route::get('/home/view-product', 'Admin\medicin\productController@view_product')->name('view-product');



