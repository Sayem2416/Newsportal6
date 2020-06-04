<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin Route
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function(){
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	//CATEGORY CRUD------
	Route::get('categories', 'Category\CategoryController@category')->name('categories');
	Route::post('store/category','Category\CategoryController@storecategory')->name('store.category');
	Route::get('delete/category/{id}','Category\CategoryController@DeleteCategory');
	Route::get('edit/category/{id}','Category\CategoryController@EditCategory');
	Route::post('update/category/{id}','Category\CategoryController@UpdateCategory');

	//DISTRICT CRUD------
	Route::get('district', 'Category\CategoryController@district')->name('districts');
	Route::post('store/district','Category\CategoryController@StoreDistrict')->name('store.district');
	Route::get('delete/district/{id}','Category\CategoryController@DeleteDistrict');
	Route::get('edit/district/{id}','Category\CategoryController@EditDistrict');
	Route::post('update/district/{id}','Category\CategoryController@UpdateDistrict');

	//SUB-CATEGORY CRUD------
	Route::get('sub/category', 'Category\CategoryController@subcategories')->name('sub.categories');
	Route::post('store/subcat','Category\CategoryController@storesubcat')->name('store.subcategory');
	Route::get('delete/subcategory/{id}','Category\CategoryController@DeleteSubCat');
	Route::get('edit/subcategory/{id}','Category\CategoryController@EditSubCat');
	Route::post('update/subcategory/{id}','Category\CategoryController@UpdateSubCat');

	//SUB-DISTRICT CRUD------
	Route::get('sub/district', 'Category\CategoryController@subdistricts')->name('sub.districts');
	Route::post('store/subdist','Category\CategoryController@storesubdist')->name('store.subdist');
	
	

});





//Author Route
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']],function(){
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');



});





//User Profile Route
Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'User','middleware'=>['auth','user']],function(){
	Route::get('dashboard', 'DashboardController@index')->name('dashboard');


});