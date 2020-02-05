<?php
Route::group(['namespace' => 'Packages\ShoppingCart\Http\Controllers', 'middleware' => 'web'], function () {
    $route_cart = 'cart'; //config('shopping_cart.cart_route');
    Route::group(['prefix' => $route_cart],function()
    {
        Route::get('/','CartController@index')->name('cart.index');
        Route::post('/','CartController@add')->name('cart.add');
        Route::post('/conditions','CartController@addCondition')->name('cart.addCondition');
        Route::delete('/conditions','CartController@clearCartConditions')->name('cart.clearCartConditions');
        Route::get('/details','CartController@details')->name('cart.details');
        Route::delete('/{id}','CartController@delete')->name('cart.delete');
    });

    $route_cart_cache = 'wishlist';//config('shopping_cart.cart_route_cache');
	Route::group(['prefix' => $route_cart_cache],function()
	{
		Route::get('/','WishListController@index')->name('wishlist.index');
		Route::post('/','WishListController@add')->name('wishlist.add');
		Route::get('/details','WishListController@details')->name('wishlist.details');
		Route::delete('/{id}','WishListController@delete')->name('wishlist.delete');
	});
});


