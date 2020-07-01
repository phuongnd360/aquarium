<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

//Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

//Frontend
Route::group(['prefix' => '', 'namespace' => 'Frontend', 'middleware' => 'locale'], function () {

	Route::get('/setlocale/{locale}', ['as' => 'frontend.lang.setlang', 'uses' => 'SetLangController@setlang']);

	Route::get('/', ['as' => 'frontend.home.index', 'uses' => 'HomeController@index']);

	Route::get('/contact', ['as' => 'frontend.contacts.index', 'uses' => 'ContactController@index']);
	Route::post('/contact', ['as' => 'frontend.contacts.index', 'uses' => 'ContactController@postIndex']);
	Route::get('/contact/confirm', ['as' => 'frontend.contacts.confirm', 'uses' => 'ContactController@confirm']);
	Route::post('/contact/confirm', ['as' => 'frontend.contacts.confirm', 'uses' => 'ContactController@postConfirm']);
	Route::get('/contact/sent', ['as' => 'frontend.contacts.sent', 'uses' => 'ContactController@sent']);
	Route::get('/contact/back', ['as' => 'frontend.contacts.back', 'uses' => 'ContactController@back']);

	Route::get('/about', ['as' => 'frontend.about.index', 'uses' => 'AboutController@index']);

	Route::get('/products', ['as' => 'frontend.products.index', 'uses' => 'ProductsController@index']);
	Route::get('/products/detail/{cat_id}/{id}', ['as' => 'frontend.products.detail', 'uses' => 'ProductsController@detail']);
	
	Route::get('/facility', ['as' => 'frontend.facility.index', 'uses' => 'FacilityController@index']);

	Route::get('/videos', ['as' => 'frontend.videos.index', 'uses' => 'VideoController@index']);

	Route::get('/about', ['as' => 'frontend.about.index', 'uses' => 'AboutController@index']);

	Route::get('/search', ['as' => 'frontend.search.index', 'uses' => 'SearchController@index']);

	Route::get('/401', ['as' => 'frontend.errors.401', 'uses' => 'ErrorController@error401']);
	Route::get('/403', ['as' => 'frontend.errors.403', 'uses' => 'ErrorController@error403']);
	Route::get('/404', ['as' => 'frontend.errors.404', 'uses' => 'ErrorController@error404']);
	Route::get('/500', ['as' => 'frontend.errors.500', 'uses' => 'ErrorController@error500']);
	Route::get('/503', ['as' => 'frontend.errors.503', 'uses' => 'ErrorController@error503']);

});

//Backend
// Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'is_admin'], function () {
Route::group(['prefix' => 'admin', 'namespace' => 'Backend'], function () {
	//Login
	Route::get('/users/login', ['as' => 'backend.users.login', 'uses' => 'LoginController@login']);
	Route::post('/users/login', ['as' => 'backend.users.login', 'uses' => 'LoginController@postLogin']);
	Route::get('/users/logout', ['as' => 'backend.users.logout', 'uses' => 'LoginController@logout']);

	Route::get('/dashboard', ['as' => 'backend.dashboard.index', 'uses' => 'DashboardController@index']);

	//Users
	Route::get('/users', ['as' => 'backend.users.index', 'uses' => 'UsersController@index']);
	Route::get('/users/add', ['as' => 'backend.users.add', 'uses' => 'UsersController@add']);
	Route::post('/users/add', ['as' => 'backend.users.add', 'uses' => 'UsersController@postAdd']);
	Route::get('/users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UsersController@edit']);
	Route::post('/users/edit/{id}', ['as' => 'backend.users.edit', 'uses' => 'UsersController@postEdit']);
	Route::get('/users/detail/{id}', ['as' => 'backend.users.detail', 'uses' => 'UsersController@detail']);
	Route::get('/users/delete/{id}', ['as' => 'backend.users.delete', 'uses' => 'UsersController@delete']);
	Route::post('/users/delete/{id}', ['as' => 'backend.users.delete', 'uses' => 'UsersController@postDelete']);
	
	Route::get('/users/chkusers', ['as' => 'backend.users.chkusers', 'uses' => 'UsersController@chkusers']);
	//Route::post('/users/chkusers', ['as' => 'backend.users.chkusers', 'uses' => 'UsersController@chkusers']);
	Route::get('/users/chkUserEdit', ['as' => 'backend.users.chkUserEdit', 'uses' => 'UsersController@chkUserEdit']);
	//Route::post('/users/chkUserEdit', ['as' => 'backend.users.chkUserEdit', 'uses' => 'UsersController@chkUserEdit']);

	//Categories
	Route::get('/categories', ['as' => 'backend.categories.index', 'uses' => 'CategoryController@index']);
	Route::get('/categories/create', ['as' => 'backend.categories.create', 'uses' => 'CategoryController@create']);
	Route::post('/categories/create', ['as' => 'backend.categories.create', 'uses' => 'CategoryController@storage']);
	Route::get('/categories/edit/{id}', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@edit']);
	Route::post('/categories/edit/{id}', ['as' => 'backend.categories.edit', 'uses' => 'CategoryController@update']);
	Route::get('/categories/show/{id}', ['as' => 'backend.categories.show', 'uses' => 'CategoryController@show']);
	Route::get('/categories/delete/{id}', ['as' => 'backend.categories.delete', 'uses' => 'CategoryController@delete']);
	Route::post('/categories/delete/{id}', ['as' => 'backend.categories.delete', 'uses' => 'CategoryController@destroy']);
	Route::get('/category-sort', ['as' => 'backend.categories.sort_ajax', 'uses' => 'CategoryController@sort_ajax']);

	//Facilities
	Route::get('/facilities', ['as' => 'backend.facilities.index', 'uses' => 'FacilityController@index']);
	Route::get('/facilities/create', ['as' => 'backend.facilities.create', 'uses' => 'FacilityController@create']);
	Route::post('/facilities/create', ['as' => 'backend.facilities.create', 'uses' => 'FacilityController@storage']);
	Route::get('/facilities/edit/{id}', ['as' => 'backend.facilities.edit', 'uses' => 'FacilityController@edit']);
	Route::post('/facilities/edit/{id}', ['as' => 'backend.facilities.edit', 'uses' => 'FacilityController@update']);
	Route::get('/facilities/show/{id}', ['as' => 'backend.facilities.show', 'uses' => 'FacilityController@show']);
	Route::get('/facilities/delete/{id}', ['as' => 'backend.facilities.delete', 'uses' => 'FacilityController@delete']);
	Route::post('/facilities/delete/{id}', ['as' => 'backend.facilities.delete', 'uses' => 'FacilityController@destroy']);
	Route::get('/facility-sort', ['as' => 'backend.facilities.sort_ajax', 'uses' => 'FacilityController@sort_ajax']);

	//Videos
	Route::get('/videos', ['as' => 'backend.videos.index', 'uses' => 'VideoController@index']);
	Route::get('/videos/create', ['as' => 'backend.videos.create', 'uses' => 'VideoController@create']);
	Route::post('/videos/create', ['as' => 'backend.videos.create', 'uses' => 'VideoController@storage']);
	Route::get('/videos/edit/{id}', ['as' => 'backend.videos.edit', 'uses' => 'VideoController@edit']);
	Route::post('/videos/edit/{id}', ['as' => 'backend.videos.edit', 'uses' => 'VideoController@update']);
	Route::get('/videos/show/{id}', ['as' => 'backend.videos.show', 'uses' => 'VideoController@show']);
	Route::get('/videos/delete/{id}', ['as' => 'backend.videos.delete', 'uses' => 'VideoController@delete']);
	Route::post('/videos/delete/{id}', ['as' => 'backend.videos.delete', 'uses' => 'VideoController@destroy']);
	Route::get('/videos-sort', ['as' => 'backend.videos.sort_ajax', 'uses' => 'VideoController@sort_ajax']);

	//Products
	Route::get('/products', ['as' => 'backend.products.index', 'uses' => 'ProductsController@index']);
	Route::get('/products/create', ['as' => 'backend.products.create', 'uses' => 'ProductsController@create']);
	Route::post('/products/create', ['as' => 'backend.products.create', 'uses' => 'ProductsController@storage']);
	Route::get('/products/edit/{id}', ['as' => 'backend.products.edit', 'uses' => 'ProductsController@edit']);
	Route::post('/products/edit/{id}', ['as' => 'backend.products.edit', 'uses' => 'ProductsController@update']);
	Route::get('/products/show/{id}', ['as' => 'backend.products.show', 'uses' => 'ProductsController@show']);
	Route::get('/products/delete/{id}', ['as' => 'backend.products.delete', 'uses' => 'ProductsController@delete']);
	Route::post('/products/delete/{id}', ['as' => 'backend.products.delete', 'uses' => 'ProductsController@destroy']);
	Route::get('/products/copy/{id}', ['as' => 'backend.products.copy', 'uses' => 'ProductsController@copy']);
	Route::post('/products/copy/{id}', ['as' => 'backend.products.copy', 'uses' => 'ProductsController@postCopy']);
	Route::get('/product-sort', ['as' => 'backend.products.sort_ajax', 'uses' => 'ProductsController@sort_ajax']);


	//Contact
	Route::get('/contact', ['as' => 'backend.contacts.index', 'uses' => 'ContactController@index']);
	Route::get('/contact/show/{id}', ['as' => 'backend.contacts.show', 'uses' => 'ContactController@show']);
	Route::get('/contact/delete/{id}', ['as' => 'backend.contacts.delete', 'uses' => 'ContactController@delete']);
	Route::post('/contact/delete/{id}', ['as' => 'backend.contacts.delete', 'uses' => 'ContactController@destroy']);

	//Gallery
	Route::get('/gallery', ['as' => 'backend.gallery.index', 'uses' => 'GalleryController@index']);

	//Setting
	Route::get('/settings', ['as' => 'backend.settings.index', 'uses' => 'SettingController@index']);
	Route::post('/settings', ['as' => 'backend.settings.index', 'uses' => 'SettingController@postIndex']);


	//Error
	Route::get('/401', ['as' => 'backend.errors.index', 'uses' => 'ErrorController@error401']);
	Route::get('/403', ['as' => 'backend.errors.index', 'uses' => 'ErrorController@error403']);
	Route::get('/404', ['as' => 'backend.errors.index', 'uses' => 'ErrorController@error404']);
	Route::get('/500', ['as' => 'backend.errors.index', 'uses' => 'ErrorController@error500']);
	Route::get('/503', ['as' => 'backend.errors.index', 'uses' => 'ErrorController@error503']);


});


Auth::routes();	


if (Auth::check()) {
	Route::get('/admin', function () {
		return redirect()->route('backend.dashboard.index');
	});
	Route::get('/admin/', function () {
		return redirect()->route('backend.dashboard.index');
	});
} else {
	Route::get('/admin', function () {
		return redirect()->route('backend.users.login');
	});
	Route::get('/admin/', function () {
		return redirect()->route('backend.users.login');
	});
	return redirect()->route('backend.users.login');
}
