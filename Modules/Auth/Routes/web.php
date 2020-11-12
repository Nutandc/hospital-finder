<?php

Route::group(['middleware' => 'web', 'prefix' => 'auth'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    //Change password Routes
    Route::post('password/change', 'ChangePasswordController@changePassword')->name('changePassword');
});
Route::get('laravel-logs', function () {
    if (\Illuminate\Support\Facades\Auth::user()->isSuper()) {
        $controller = new \Rap2hpoutre\LaravelLogViewer\LogViewerController();
        return $controller->index();
    } else {
        abort(404);
    }
})->name('laravel.logs')->middleware('auth');

