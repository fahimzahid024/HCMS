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




// Route::get('/test', 'User\PatiantController@test')->name('home');

// ----------------------Admin Panal----------------------
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','User\homePageController@index')->name('/');
Route::get('/doctor','User\homePageController@doctor')->name('view-doctor');
Route::get('/clinic','User\homePageController@clinic')->name('view-clinic');

// -----------------------Doctor Controller -------------------
Route::get('/home/doctor', 'User\LoginController@user')->name('user');
Route::get('/home/doctor', 'User\LoginController@doctor')->name('doctor');
Route::get('/home/doctor', 'User\LoginControlleSr@admin')->name('admin');
Route::get('/home/doctor/view/doctor/', 'User\DoctorController@view_doctor')->name('view-doctor');

// ----------------------- Patiants Controller -------------------
Route::get('/home/signup', 'User\PatiantController@signup')->name('signup');
Route::get('/home/signin', 'User\PatiantController@signin')->name('signin');
Route::post('/home/signup/save-patiant', 'User\PatiantController@save_patiant')->name('save-patiant');
Route::post('/home/signin', 'User\PatiantController@login_patiant')->name('login-process');
Route::get('/home/logout', 'User\PatiantController@logout')->name('flash');
Route::get('/patient-booking/{id}', 'User\PatiantController@patient_booking')->name('patient-booking');
Route::post('/patient-booking/save-ticket', 'User\PatiantController@save_ticket_booking')->name('save-ticket-booking');






// ------------------------------------------------------------
Route::get('/home/add-doctor', 'Admin\doctor\doctorController@add_doctor')->name('add-doctor');
Route::get('/home/manage-doctor', 'Admin\doctor\doctorController@manage_doctor')->name('manage-doctor');
Route::post('/home/save-doctor', 'Admin\doctor\doctorController@save_doctor')->name('save-doctor');
Route::get('/delete-doctor/{id}', 'Admin\doctor\doctorController@delete_doctor')->name('delete-doctor');
Route::get('/home/doctor-login', 'Admin\doctor\doctorController@doctor_login')->name('doctor-login');
// Route::post('/home/doctor-login-process', 'Admin\doctor\doctorController@doctor_login_process')->name('doctor-login-process');


// -----------------------Add Clinic Controller -------------------
Route::get('/home/add-clinic', 'Admin\clinic\clinicController@add_clinic')->name('add-clinic');
Route::get('/home/save-clinic', 'Admin\clinic\clinicController@manage_clinic')->name('manage-clinic');

// ------------------------Add Category Controller ----------------
Route::get('/home/manage-category', 'Admin\medicin\categoryController@manage_category')->name('manage-category');
Route::post('/home/save-category', 'Admin\medicin\categoryController@save_category')->name('save-category');
Route::get('/home/view-category', 'Admin\medicin\categoryController@view_category')->name('view-category');
Route::get('/home/delete-category/{id}', 'Admin\medicin\categoryController@delete_category')->name('delete-category');
Route::get('/home/category-wise-product/{category_id}', 'Admin\medicin\categoryController@category_wise_product')->name('category-wise-product');



// ------------------------Add Product Controller --------------------
Route::get('/home/manage-product', 'Admin\medicin\productController@manage_product')->name('manage-product');
Route::post('/home/save-product', 'Admin\medicin\productController@save_product')->name('save-product');
Route::get('/home/view-product', 'Admin\medicin\productController@view_product')->name('view-product');
Route::get('/home/delete-product/{id}', 'Admin\medicin\productController@delete_product')->name('delete-product');


// ------------------------User Doctor COntroller ----------------------- //
Route::get('/home/doctor-login','User\doctor\doctorController@index')->name('doctor-login');
Route::get('/home/doctor/doctor-profile', 'User\doctor\doctorController@doctor_profile')->name('doctor-profile');
Route::post('/home/doctor-login-process','User\doctor\doctorController@doctor_login_process')->name('doctor-login-process');
Route::get('/delete-patient/{id}', 'User\doctor\doctorController@delete_patient')->name('delete-patient');


// ----------------------- Cabin Controller -------------------//
Route::get('/home/manage-cabin', 'Admin\cabin\CabinController@manage_cabin')->name('manage-cabin');
Route::get('/home/view-cabin', 'Admin\cabin\CabinController@view_cabin')->name('view-cabin');
Route::post('/home/save-cabin', 'Admin\cabin\CabinController@save_cabin')->name('save-cabin');
Route::get('/delete-cabin/{id}', 'Admin\cabin\CabinController@delete_cabin')->name('delete-cabin');
Route::get('/edit-cabin/{id}', 'Admin\cabin\CabinController@edit_cabin')->name('edit-cabin');
Route::post('/update-cabin/{id}', 'Admin\cabin\CabinController@update_cabin')->name('update-cabin');
Route::get('/cabin-booking/manage', 'Admin\cabin\CabinController@cabin_booking_manage')->name('manage-cabin-booking');
Route::get('/confirm-cabin/{id}', 'Admin\cabin\CabinController@confirm_cabin')->name('confirm-booking');
Route::get('/delete-booking-cabin/{id}', 'Admin\cabin\CabinController@dismiss_cabin')->name('dismiss-booking');

// ----------------------- User Panal cabin Controller --------------------
Route::get('/view-cabin/', 'User\cabin\CabinController@view_cabin')->name('user-view-cabin');
Route::get('/cabin-booking/{id}', 'User\cabin\CabinController@cabinBooking')->name('cabin-booking');
Route::post('/save/cabin-booking/', 'User\cabin\CabinController@save_cabin')->name('save-cabin-booking');

