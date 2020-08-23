<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::redirect('/', '/admin/home');
    Route::get('/home', 'HomeController@index')->name('home');


    // roles
    Route::resource('roles', 'RoleController');
    Route::delete('roles/massDestroy', 'RoleController@massDestroy')->name('roles.mass.destroy');

    // mass destruction
    Route::delete('users/massDestroy', 'UserController@massDestroy')->name('users.mass.destroy');
    Route::resource('users', 'UserController');

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

    // subscriptions attributes
    Route::resource('subscription-attributes', 'SubscriptionAttributeController');

    //Drivers
    Route::delete('drivers/massDestroy', 'DriverController@massDestroy')->name('drivers.mass.destroy');
    Route::resource('drivers', 'DriverController');

    // Drivers Time
    Route::delete('drivers-times/massDestroy', 'DriversTimeController@massDestroy')->name('drivers.times.mass.destroy');
    Route::resource('drivers-times', 'DriversTimeController');

    //Customers
    Route::delete('clients/massDestroy', 'ClientsController@massDestroy')->name('clients.mass.destroy');
    Route::resource('clients', 'ClientsController');

    // Price List
    Route::delete('price-list/massDestroy', 'PriceListController@massDestroy')->name('price.list.mass.destroy');
    Route::resource('price-list', 'PriceListController');

    // Driver Order
    Route::delete('driver-order/massDestroy', 'DriverController@massDestroy')->name('driver.order.mass.destroy');
    Route::resource('driver-orders', 'DriverOrderController');

    //Driver Order status
    Route::delete('driver-order-status/massDestroy', 'DriverOrderStatusController@massDestroy')->name('driver.order.status.mass.destroy');
    Route::resource('driver-order-status', 'DriverOrderStatusController');

    // Gift category
    Route::delete('giftCategory/massDestroy', 'GiftCategoryController@massDestroy')->name('giftCat.mass.destroy');
    Route::resource('giftCategory', 'GiftCategoryController');

    // Git card
    Route::delete('giftcard/massDestroy', 'GiftCardController@massDesctroy')->name('gift.card.mass.destroy');
    Route::resource('giftcard', 'GiftCardController');

    // Gift Card Usages
    Route::delete('giftCardUsage/massDestroy', 'GiftCardUsageController@massDestroy')->name('gift.card.usage.mass.destroy');
    Route::resource('giftCardUsage', 'GiftCardUsageController');
    // coupons
    Route::delete('coupons/massDestroy', 'CouponController@massDestroy')->name('coupons.mass.destroy');
    Route::resource('coupons', 'CouponController');

    //Coupon usage
    Route::delete('couponUsage/massDestroy', 'CouponUsageController@massDestroy')->name('coupon.usage.mass,destroy');
    Route::resource('couponUsage', 'CouponUsageController');

    // Payment Methods
    Route::delete('paymentsMethod/massDestroy', 'PaymentMethodController@massDestroy')->name('payment.method.mass.destroy');
    Route::resource('paymentsMethod', 'PaymentMethodController');

    // Order Status
    Route::delete('orderStatus/massDestroy', 'OrderStatusController@massDestroy')->name('order.status.mass.destroy');
    Route::resource('orderStatus', 'OrderStatusController');

    // Orders
    Route::delete('orders/massDestroy', 'OrderController@massDestroy')->name('order.mass.destroy');
    Route::resource('orders', 'OrderController');

    // payments
    Route::delete('payments/massDestroy', 'PaymentController@massDestroy')->name('payment.mass.destroy');
    Route::resource('payments', 'PaymentController');

    // branches
    Route::delete('branches/massDestroy', 'BranchController@massDestroy')->name('branches.mass.destroy');
    Route::resource('branches', 'BranchController');

    // user and subscriptions
    Route::post('/clients/subscriptions', 'SubscriptionsClientController@store')->name('client.subscription.store');
    Route::post('/clients/subscriptions/edit', 'SubscriptionsClientController@edit')->name('client.subscription.edit');
    Route::patch('/clients/subscriptions/update', 'SubscriptionsClientController@update')->name('client.subscription.update');
    Route::delete('/clients/subscriptions/remove', 'SubscriptionsClientController@destroy')->name('client.subscription.destroy');
});
