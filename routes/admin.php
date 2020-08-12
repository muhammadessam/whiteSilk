<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');

    Route::post('{role}/assignPermissions', 'RolePermissionController@assignPermissions')->name('assign.role.permissions');
});
