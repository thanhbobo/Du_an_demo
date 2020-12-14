<?php

use Illuminate\Support\Facades\Route;

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
Route::get('index', [
	'as'=>'trangchu',
	'uses'=>'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}', [
	'as'=>'loaisanpham',
	'uses'=>'PageController@getLoaiSp'
]);
Route::get('chi-tiet-san-pham/{id}', [
	'as'=>'chitietsanpham',
	'uses'=>'PageController@getChitietSp'
]);
Route::post('chi-tiet-san-pham/{id}', [
	'as'=>'dathang',
	'uses'=>'PageController@postChitietSp'
]);
Route::get('lien-he', [
	'as'=>'lienhe',
	'uses'=>'PageController@getLienhe'
]);
Route::post('lien-he', [
	'as'=>'lienhe',
	'uses'=>'PageController@postLienhe'
]);
Route::get('gioi-thieu', [
	'as'=>'gioithieu',
	'uses'=>'PageController@getGioithieu'
]);
Route::get('add-to-cart/{id}', [
	'as'=>'themgiohang',
	'uses'=>'PageController@getAddtoCart'
]);
Route::get('del-cart/{id}',[
	'as'=>'xoagiohang',
	'uses'=>'PageController@getDelItemCart'
]);
Route::get('don-hang', [
	'as'=>'donhang',
	'uses'=>'PageController@getDonhang'
]);
Route::get('xoa-don-hang/{id}',[
	'uses'=>'PageController@xoaDonhang'
]);
Route::get('xoa-sp/{id}',[
	'uses'=>'PageController@xoaSP'
]);
Route::get('dat-hang', [
	'as'=>'dathang',
	'uses'=>'PageController@getDathang'
]);
Route::post('dat-hang', [
	'as'=>'dathang',
	'uses'=>'PageController@postDathang'
]);
Route::get('dang-nhap-user', [
	'as'=>'login_user',
	'uses'=>'PageController@getDangnhapUser'
]);
Route::post('dang-nhap-user', [
	'as'=>'login_user',
	'uses'=>'PageController@postDangnhapUser'
]);
Route::get('dang-ky-user', [
	'as'=>'signup_user',
	'uses'=>'PageController@getDangkyUser'
]);
Route::post('dang-ky-user', [
	'as'=>'signup_user',
	'uses'=>'PageController@postDangkyUser'
]);
Route::get('dang-xuat-user', [
	'as'=>'logout_user',
	'uses'=>'PageController@postDangxuatUser'
]);
Route::get('tim-kiem-sp', [
	'as'=>'timkiem_sp',
	'uses'=>'PageController@getTimkiemSp'
]);
//

//Dang nhap
 Route::get('admin/login_ad','UserController@getDangnhapAdmin');
 Route::post('admin/login_ad','UserController@postDangnhapAdmin');
 Route::post('admin/logout','UserController@postDangxuatAdmin')->name('logout');
//admin
Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function() {
    Route::group(['prefix' => 'TypeProducts'], function() {

        Route::get('danhsach', 'TypeProductsController@getDanhsach');

        Route::get('sua/{id}', 'TypeProductsController@getSua');
        Route::post('sua/{id}', 'TypeProductsController@postSua');

        Route::get('them', 'TypeProductsController@getThem');
        Route::post('them', 'TypeProductsController@postThem');

        Route::get('xoa/{id}','TypeProductsController@getXoa');
    });
     Route::group(['prefix' => 'Feedback'], function() {

        Route::get('danhsach', 'FeedbackController@getDanhsach');
        
        Route::get('xoa/{id}','FeedbackController@getXoa');
    });
    Route::group(['prefix' => 'Products'], function() {

        Route::get('danhsach', 'ProductsController@getDanhsach');

        Route::get('sua/{id}', 'ProductsController@getSua');
        Route::post('sua/{id}', 'ProductsController@postSua');

        Route::get('them', 'ProductsController@getThem');
         Route::post('them', 'ProductsController@postThem');
        Route::get('xoa/{id}','ProductsController@getXoa');


    });
     Route::group(['prefix' => 'Customer'], function() {

        Route::get('danhsach', 'CustomerController@getDanhsach');

        Route::get('sua', 'CustomerController@getSua');


        Route::get('them', 'CustomerController@getThem');

        Route::get('xoa/{id}','CustomerController@getXoa');

    });
     Route::group(['prefix' => 'Bills'], function() {

        Route::get('danhsach', 'BillsController@getDanhsach');

        Route::get('sua/{id}', 'BillsController@getSua'); 

         Route::post('sua/{id}','BillsController@postSua');
          Route::get('xoa/{id}','BillsController@getXoa');

        Route::get('them', 'BillsController@getThem');
    });
     Route::group(['prefix' => 'BillDetail'], function() {

        Route::get('danhsach', 'BillDetailController@getDanhsach');

        Route::get('sua/{id}', 'BillDetailController@getSua');
        Route::post('sua/{id}','BillDetailController@postSua');

        Route::get('them', 'BillDetailController@getThem');
        Route::get('xoa/{id}','BillDetailController@getXoa');
    });
     Route::group(['prefix'=>'Slide'],function(){
		Route::get('danhsach','SlideController@getDanhSach');
		
		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');
	});
     Route::group(['prefix'=>'User'],function(){
		Route::get('danhsach','UserController@getDanhSach');
		
		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});
     //
     Route::group(['prefix'],function(){
		Route::get('index','AdminController@getIndex');
		
		
	});
});
// Route::get('thu', function() {
//     return view('Admin.TypeProducts.danhsach');
// });