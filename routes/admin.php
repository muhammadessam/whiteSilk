<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::redirect('/', '/admin/home');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');

    // role and permission
    Route::post('{role}/assignPermissions', 'RolePermissionController@assignPermissions')->name('assign.role.permissions');

    // roles and user
    Route::post('{user}/assignRoles', 'RoleUserController@store')->name('role.user.store');
});
