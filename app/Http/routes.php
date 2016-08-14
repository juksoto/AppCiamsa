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

// ROUTE INDEXS
    Route::get('registros',
        [
            'uses' => 'CoreControllers\CoreController@showRegister',
            'as'   => 'admin.register.index',
        ]
    );
});
// ROUTE INDEXS
Route::get('/',
    [
        'uses' => 'CoreControllers\CoreController@index',
        'as'   => 'index',
    ]
);

Route::get('index',
    [
        'uses' => 'CoreControllers\CoreController@index',
        'as'   => 'index',
    ]
);

// MODAL ROUTE
Route::post('modal',
    [
        'uses' => 'CoreControllers\CoreController@getModal',
        'as'   => 'modal'
    ]
);

//Step One
Route::get('tipo-cultivo',
    [
        'uses' => 'CoreControllers\CoreController@stepOne',
        'as'   => 'stepOne',
    ]
);

//Step two
Route::get('etapa-cultivo/{id}',
    [
        'uses' => 'CoreControllers\CoreController@stepTwo',
        'as'   => 'stepTwo',
    ]
);

//Step three
Route::get('fertilizantes/{type}/{stage}',
    [
        'uses' => 'CoreControllers\CoreController@stepThree',
        'as'   => 'stepThree',
    ]
);

//Quote
Route::group(['prefix' => 'cotizar' , 'as' => 'quote'], function() {

    Route::match(array('GET', 'POST') ,'/', ['uses' => 'CoreControllers\CoreController@quote']);

    Route::post('create', ['uses' => 'CoreControllers\CoreController@createQuote', 'as' => '.create']);

    Route::get('showProducts/{stage}/{type}', ['uses' => 'CoreControllers\CoreController@showProducts', 'as' => '.showProducts']);

});
