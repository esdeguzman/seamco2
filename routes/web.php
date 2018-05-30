<?php

Route::get('/', function () { return view('welcome'); });

Auth::routes();


// Routes and Middleware for Admins
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'user_type:admin']], function () {

    Route::get('dashboard', 'ShowDashboard')->name('admin.dashboard');

    Route::get('profile', function () { return view('admin.profile'); });

});


// Routes and Middleware for Members
Route::group(['prefix' => 'member', 'middleware' => ['web', 'user_type:member']], function () {

    Route::get('dashboard', 'ShowDashboard')->name('member.dashboard');

});
