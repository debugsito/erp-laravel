<?php

Route::get('login',  array('as' => 'login.index', 'uses' => 'AuthController@index'));

Route::post('login', array('as' => 'login.signin', 'uses' => 'AuthController@sign_in'));

//Route::group(array('before' => 'auth'), function () {

	Route::get('/', array('as' => 'home.index', 'uses' => 'HomeController@index'));

	Route::get('logout', array('as' => 'login.logout', 'uses' => 'AuthController@sign_out'));

	Route::resource('users', 'UsersController');

	Route::resource('plans', 'PlanController');

	Route::resource('intransits', 'IntransitsController');

	Route::get('po/entry', array('as' => 'intransits.po_entry', 'uses' => 'IntransitsController@po_entry'));

	Route::any('po/entry/update', 'IntransitsController@po_entry_update');

	Route::any('po/entry/confirm', 'IntransitsController@po_entry_confirm');

	Route::resource('item_masters', 'ItemMastersController');

	Route::resource('boms', 'BomsController');

	Route::resource('stocks', 'StocksController');

	Route::resource('vendors', 'VendorsController');

	Route::resource('locations', 'LocationsController');

	Route::resource('stock_types', 'StockTypesController');

	Route::resource('movement_types', 'MovementTypesController');

	Route::resource('order_categories', 'OrderCategoriesController');

	Route::resource('item_units', 'ItemsUnitController');

	Route::resource('item_types', 'ItemTypesController');

	Route::resource('lines', 'LinesController');

	Route::resource('item_status', 'ItemStatusesController');

	Route::resource('sales_order', 'SalesOrdersController'); //new

	Route::resource('customers', 'CustomersController'); //new

	Route::resource('ship_methods', 'ShipMethodsController'); //new

	Route::get('search_item', array('as' => 'item_masters.search_item', 'uses' => 'ItemMastersController@search_item'));

	//Route::get('item_new', 'ItemMastersController')

//});

/*Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('login');
});*/


$path =  Request::segment(1);

Session::put('nav-option', $path);

//no mismo plan en el mismo horario dependiendo de la linea

//localhost:8000/register_production?line_id=1&arduino_id=1

