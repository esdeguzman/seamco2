<?php

Route::get('/', function () { return view('welcome'); });

Auth::routes();

/*
|--------------------------------------------------------------------------
| Admin Routes and Middleware
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'user_type:admin']], function () {

    Route::get('dashboard', 'ShowDashboard')->name('admin.dashboard');

    Route::get('profile', function () { return view('admin.profile'); });

    // MemberController
    Route::get('members', 'Admin\MemberController@index')
            ->name('admin.members.index');

    Route::get('members/{member}', 'Admin\MemberController@show')
            ->name('admin.members.show');

    Route::post('members/{member}/approve', 'Admin\MemberController@approve')
            ->name('admin.members.approve');

    Route::post('members/{member}/disapprove', 'Admin\MemberController@disapprove')
            ->name('admin.members.disapprove');

    Route::post('members/{member}/verify-pmes-attendance', 'Admin\MemberController@verifyPMESAttendance')
            ->name('admin.members.verify-pmes-attendance');

    Route::post('members/{member}/verify-fees-inform', 'Admin\MemberController@verifyFeesInform')
            ->name('admin.members.verify-fees-inform');

    Route::post('members/{member}/verify-id-release', 'Admin\MemberController@verifyIDRelease')
            ->name('admin.members.verify-id-release');

    Route::post('members/{member}/verify-give-share-certificate', 'Admin\MemberController@verifyGiveShareCertificate')
            ->name('admin.members.verify-give-share-certificate');
            
});


/*
|--------------------------------------------------------------------------
| Member Routes and Middleware
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'member', 'middleware' => ['web', 'user_type:member']], function () {

    Route::get('dashboard', 'ShowDashboard')->name('member.dashboard');

});
