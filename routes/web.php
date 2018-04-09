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

// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
// Route::get('/logout', 'Auth\LoginController@logout');

//admin middleware start
// Route::group(['prefix' => 'admin', 'middleware'=> 'auth'], function () {
// 	Route::get('/','AdminController@index');
//     Route::get('profile','AdminController@profile');
//     Route::get('/addProduct','AdminController@addProduct');
// });

// Route::get('test', function(){
// 	return App\Category::with('childs')
// 	->where('child_id', 0)
// 	->get();
// });

Route::get('/', 'ProductsController@index');
Auth::routes();
Route::view('product-list', 'front.products', [
      'data' => App\products::all(),
      'category_name' => 'All Products',
      'search' => 'false'
    ]);
Route::get('product-list/{categories}', 'ProductsController@prodcategory');
Route::get('search-product', 'ProductsController@searchprod');
Route::get('product-category', 'ProductsController@prodcategory_dropdown');

Route::get('/admin_index','AdminController@index');
Route::get('/admin_login', 'AdminController@login');
Route::post('/loginPost', 'AdminController@loginPost');
Route::get('/logout', 'AdminController@logout');
Route::get('/admin_profile','AdminController@profile');
Route::get('/addproduct','AdminController@addproduct');
Route::post('/saveproduct', 'AdminController@saveproduct');
Route::view('/products', 'admin.products', [
      'data' => App\products::with('category')->get()
    ]);
Route::get('/editproduct/{id}', function($id){
	return view('admin.editProduct',[
		'data' => App\products::where('id', $id)->get()
	]);
});
Route::get('/changeimage/{id}', function($id){
	return view('admin.changeImage',[
		'data' => App\products::where('id', $id)->get()
	]);
})->name('changeimg');
//Route::view('/changeimage/{id}', 'admin.changeImage');
Route::post('/uploadPP', 'AdminController@uploadPP');
Route::view('/addcategory', 'admin.addCategory');
Route::view('/category', 'admin.category', [
      'data' => App\Category::all()
    ]);
Route::post('/savecategory', 'AdminController@savecategory');
Route::get('/prod-track-list', 'AdminController@prod_track_list');

Route::get('/user-login', 'UsersController@login');
Route::post('/user-postLogin', 'UsersController@postLogin');
Route::get('/user-logout', 'UsersController@logout');
Route::get('/user-register', 'UsersController@register');
Route::post('/user-postReg', 'UsersController@postRegister');
Route::get('/user-profile', 'UsersController@profile');
Route::get('/user-shop-history', 'UsersController@shop_history');