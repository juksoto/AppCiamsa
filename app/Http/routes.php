<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/**
 * Groups AdminControllers Controllers
 */
Route::group(['prefix' => 'admin'], function()
{
    Route::group(['prefix' => 'crops'], function()
    {
        Route::resource('type', 'AdminControllers\Crops\CropTypeController');
        Route::resource('stage', 'AdminControllers\Crops\CropStageController');
        Route::resource('tsCrop', 'AdminControllers\Crops\CropTypeStageController');

    });

    Route::group(['prefix' => 'products'], function()
    {
        Route::resource('categories', 'AdminControllers\Products\ProductCategoriesController');
        Route::resource('products', 'AdminControllers\Products\ProductsController');
    });

    Route::resource('tsProducts', 'AdminControllers\Relations\TypeStageProductsController');

});
// ROUTE INDEXS
Route::get('/',
    [
        'uses' => 'CoreControllers\CoreController@index',
        'as'   => 'index',
    ]
);

Route::get('/{url}',
    [
        'uses' => 'CoreControllers\CoreController@index',
        'as'   => 'index',
    ]
)-> where('url', 'index|home'); ;

// MODAL ROUTE
Route::post('modal',
    [
        'uses' => 'CoreControllers\CoreController@getModal',
        'as'   => 'modal'
    ]
);
