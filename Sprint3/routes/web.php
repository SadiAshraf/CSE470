<?php

use App\Http\Controllers\peertopeer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewhomepage;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\group_related;
use App\Http\Controllers\viewcoursechat;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\for_pdf;

use League\CommonMark\Extension\CommonMark\Node\Block\Heading;
 
Route::controller(AuthController::class)->group(function () {

    Route::match(['get', 'post'], '/', 'showLoginForm')->name('/');
    
    Route::match(['get', 'post'],'/login', 'login')->name('login');
    
    
});
Route::controller(RegistrationController::class)->group(function () {
   
    Route::get( '/register', 'showRegistrationForm')->name('registershow');
    
    Route::post('/register', 'register')->name('register');

});
Route::controller(viewhomepage::class)->group(function () {

    Route::match(['get', 'post'], '/admin-home', 'admin')->name('show-admin');

    Route::get( '/homepage', 'gotohome')->name('homepage');
    
    route::match(['get', 'post'],'/user_profile','gotouserprofile')->name('userprofile');
});


Route::controller(viewcoursechat::class)->group(function () {
    Route::get('/course_chat', 'showchat')->name('coursechat');

    Route::match(['get','post'],'/{course_id}/{student_id}/req', 'grpreq')->name('grpreq');
    
    Route::post('/{course_id}/{student_id}', 'addmsg')->name('sendmsg');
});

Route::controller(peertopeer::class)->group(function () {
    Route::get('/{sender_id}/{reciver_id}/inbox' , 'senddm')->name('inbox');
    
    Route::post('/{sender_id}/{reciver_id}/inbox' , 'insertmsg')->name('send-dm-msg');
});

Route::controller(group_related::class)->group(function () {
    Route::get('/grp_chat' , 'show_grp_chat')->name('show_grp_chat');
    Route::post('/grp_chat' , 'add_grp_msg')->name('add_grp_msg');

    Route::get('/create_grp' , 'creategroup')->name('create-grp');
    Route::post('/create_grp' , 'submit_name')->name('submit-name');
});

Route::controller(for_pdf::class)->group(function () {

    Route::get('/pdf', 'showPdf')->name('show-pdf');

    Route::get('/resources', 'resource')->name('go-to-resource');


    Route::post('/course', 'add_course')->name('add-course');

    Route::post('/resource', 'add_resource')->name('add-resource');

});

