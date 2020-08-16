<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::redirect('/', '/admin/home');
    Route::get('/home', 'HomeController@index')->name('home');


    // roles
    Route::resource('roles', 'RoleController');
    Route::delete('roles/massDestroy', 'RoleController@massDestroy')->name('roles.mass.destroy');

    // mass destruction
    Route::resource('users', 'UserController');
    Route::delete('users/massDestroy', 'UserController@massDestroy')->name('users.mass.destroy');

    // role and permission
    Route::post('{role}/assignPermissions', 'RolePermissionController@assignPermissions')->name('assign.role.permissions');

    // roles and user
    Route::post('{user}/assignRoles', 'RoleUserController@store')->name('role.user.store');

    // Locations
    Route::delete('countries/massDestroy', 'CountryController@massDestroy')->name('countries.mass.destroy');
    Route::resource('countries', 'CountryController');

    Route::delete('cities/massDestroy', 'CityController@massDestroy')->name('cities.mass.destroy');
    Route::resource('cities', 'CityController');

    Route::delete('areas/massDestroy', 'AreaController@massDestroy')->name('areas.mass.destroy');
    Route::resource('areas', 'AreaController');

    Route::delete('addresses/massDestroy', 'AddressController@massDestroy')->name('addresses.mass.destroy');
    Route::resource('addresses', 'AddressController');

    // subscriptions
    Route::delete('subscriptions/massDestroy', 'SubscriptionController@massDestroy')->name('subscriptions.mass.destroy');
    Route::resource('subscriptions', 'SubscriptionController');

    //subscriptions type
    Route::delete('subscription-types/massDestroy', 'SubscriptionTypeController@massDestroy')->name('subscription.types.mass.destroy');
    Route::resource('subscription-types', 'SubscriptionTypeController');

});
