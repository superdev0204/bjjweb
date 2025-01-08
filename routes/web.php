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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'App\Http\Controllers\IndexController@index');
Route::get('/search', 'App\Http\Controllers\IndexController@search');
Route::post('/search', 'App\Http\Controllers\IndexController@search');
Route::get('/dojo/new', 'App\Http\Controllers\GymController@create');
Route::post('/dojo/new', 'App\Http\Controllers\GymController@create');
Route::get('/user/login', 'App\Http\Controllers\LoginController@login');
Route::post('/user/login', 'App\Http\Controllers\LoginController@login');
Route::post('/user/loginPopup', 'App\Http\Controllers\LoginController@loginPopup');
Route::get('/user/logout', 'App\Http\Controllers\LoginController@logout');
Route::get('/user/new', 'App\Http\Controllers\RegisterController@index');
Route::post('/user/new', 'App\Http\Controllers\RegisterController@index');
Route::get('/user/activate', 'App\Http\Controllers\RegisterController@activate');
Route::post('/user/signupPopup', 'App\Http\Controllers\RegisterController@signupPopup');
Route::get('/contact', 'App\Http\Controllers\ContactController@index');
Route::post('/contact', 'App\Http\Controllers\ContactController@index');
Route::pattern('statename', '[a-z\-]+');
Route::pattern('cityname', '[a-z\-]+');
Route::get('/{statename}-dojos', 'App\Http\Controllers\GymController@state');
Route::get('/{statename}-dojos/{cityname}-city', 'App\Http\Controllers\GymController@city');
Route::get('/dojo-detail/{id}', 'App\Http\Controllers\GymController@show');
Route::get('/dojo/update', 'App\Http\Controllers\GymController@edit');
Route::post('/dojo/update', 'App\Http\Controllers\GymController@edit');
Route::get('/dojo/uploadphoto', 'App\Http\Controllers\ImageController@upload');
Route::post('/dojo/uploadphoto', 'App\Http\Controllers\ImageController@upload');
Route::get('/send_review', 'App\Http\Controllers\ReviewController@send_review');
Route::post('/send_review', 'App\Http\Controllers\ReviewController@send_review');
Route::get('/send_question', 'App\Http\Controllers\QuestionController@send_question');
Route::post('/send_question', 'App\Http\Controllers\QuestionController@send_question');
Route::get('/send_answer', 'App\Http\Controllers\QuestionController@send_answer');
Route::post('/send_answer', 'App\Http\Controllers\QuestionController@send_answer');
Route::post('/helpful_counter', 'App\Http\Controllers\ReviewController@helpful_counter');
Route::post('/nohelp_counter', 'App\Http\Controllers\ReviewController@nohelp_counter');
Route::post('/states_in_country', 'App\Http\Controllers\GymController@states_in_country');

// Password Reset Routes
Route::get('/user/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/user/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/user/pwdreset', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/user/pwdreset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');


Route::get('/admin', 'App\Http\Controllers\Admin\IndexController@index');
Route::get('/admin/comment', 'App\Http\Controllers\Admin\CommentController@index');
Route::get('/admin/gym-log/show/id/{id}', 'App\Http\Controllers\Admin\GymLogController@show');
Route::get('/admin/visitor_counts', 'App\Http\Controllers\Admin\IndexController@visitor_counts');
Route::get('/admin/visitor_delete', 'App\Http\Controllers\Admin\IndexController@delete_visitor');
Route::post('/admin/gym/approve', 'App\Http\Controllers\Admin\GymLogController@approve_gym');
Route::post('/admin/gym/disapprove', 'App\Http\Controllers\Admin\GymLogController@disapprove_gym');
Route::get('/admin/gym/edit', 'App\Http\Controllers\Admin\GymLogController@edit');
Route::post('/admin/gym/edit', 'App\Http\Controllers\Admin\GymLogController@edit');
Route::post('/admin/gym/delete', 'App\Http\Controllers\Admin\GymLogController@delete_gym');
Route::post('/admin/gym-log/approve', 'App\Http\Controllers\Admin\GymLogController@approve_gymlog');
Route::post('/admin/gym-log/disapprove', 'App\Http\Controllers\Admin\GymLogController@disapprove_gymlog');
Route::post('/admin/gym-log/delete', 'App\Http\Controllers\Admin\GymLogController@delete_gymlog');
Route::post('/admin/approve_review_ok', 'App\Http\Controllers\ReviewController@approve_review_ok');
Route::post('/admin/approve_review_no', 'App\Http\Controllers\ReviewController@approve_review_no');
Route::post('/admin/approve_question_ok', 'App\Http\Controllers\QuestionController@approve_question_ok');
Route::post('/admin/approve_question_no', 'App\Http\Controllers\QuestionController@approve_question_no');
Route::post('/admin/approve_answer_ok', 'App\Http\Controllers\QuestionController@approve_answer_ok');
Route::post('/admin/approve_answer_no', 'App\Http\Controllers\QuestionController@approve_answer_no');
Route::get('/admin/review_editor', 'App\Http\Controllers\ReviewController@review_editor');
Route::post('/admin/review_update', 'App\Http\Controllers\ReviewController@review_update');
Route::get('/admin/question_editor', 'App\Http\Controllers\QuestionController@question_editor');
Route::post('/admin/question_update', 'App\Http\Controllers\QuestionController@question_update');
Route::get('/admin/answer_editor', 'App\Http\Controllers\QuestionController@answer_editor');
Route::post('/admin/answer_update', 'App\Http\Controllers\QuestionController@answer_update');
Route::get('/admin/manage_contact', 'App\Http\Controllers\ContactController@manage_contact');
Route::get('/admin/contact_delete', 'App\Http\Controllers\ContactController@delete_contact');
Route::post('/admin/image/approve', 'App\Http\Controllers\Admin\ImageController@approve');
Route::post('/admin/image/disapprove', 'App\Http\Controllers\Admin\ImageController@disapprove');
Route::post('/admin/image/delete', 'App\Http\Controllers\Admin\ImageController@delete');
Route::get('/admin/gym/search', 'App\Http\Controllers\Admin\GymLogController@search');
Route::post('/admin/gym/search', 'App\Http\Controllers\Admin\GymLogController@search');
