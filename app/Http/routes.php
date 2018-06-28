<?php
use App\product;
Route::get('/', function () {
	$foo     = new product();
    $product = $foo->all_data();
    return view('welcome',array('product' =>$product));
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('products', 'ProductController@products');
Route::group(['middleware' => 'auth'], function() {
Route::get('product-detail/{id}', 'ProductController@index');
Route::match(['get', 'post'],'user-detail/{id}','UserController@index');
Route::match(['get', 'post'],'checkout/{id}/{user}','ProductController@checkout');
Route::match(['get', 'post'],'order-review/{id}/{user}','ProductController@order');
Route::match(['get', 'post'],'payment-success','ProductController@payment')->name('payment-success');
Route::match(['get', 'post'],'raffle-order','ProductController@raffle');
});

//  Admin Panel
Route::match(['get', 'post'],'admin/login','AdminController@index');
Route::match(['get', 'post'],'admin/dashboard','AdminController@Dashboard');
Route::match(['get', 'post'],'admin/logout','AdminController@Logout');
/*Route::match(['get', 'post'],'admin/account_setting','AdminController@Account_Setting');
Route::match(['get', 'post'],'admin/change_password','AdminController@changePassword');*/
Route::match(['get', 'post'],'admin/forgot_password','AdminController@forgotPassword');
Route::match(['get', 'post'],'admin/reset_password/{string}','AdminController@resetPassword');
Route::match(['get', 'post'],'admin/raffle-view','AdminController@RaffleView');
Route::match(['get', 'post'],'admin/run-raffle/{productID}','AdminController@Raffle');
Route::match(['get', 'post'],'admin/round1-raffle','AdminController@Round1');
 // Add admin/user management page
 Route::match(['get', 'post'],'admin/user-manage','AdminController@UserManage');
 Route::match(['get', 'post'],'admin/user-manage/edit/{id}','AdminController@UserManageEdit');
//  Route::match(['get', 'post'],'admin/user-manage/edit/{id}','AdminController@UserManageSave');