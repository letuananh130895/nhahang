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
use Illuminate\Support\Facades\DB;
Route::get('test',function(){
	DB::table('slide')->insert(['link' => 'ashd', 'image' => 'asd']);
	$id = DB::getPdo()->lastInsertId();
	echo 4%2;
});

Route::get('/',['as'=>'trangchu','uses'=>'PageController@getIndex']);
Route::get('loai-san-pham/{id}',['as'=>'loaisanpham','uses'=>'PageController@getLoaiSanPham']);
Route::get('chi-tiet-san-pham/{id}',['as'=>'chitietsanpham','uses'=>'PageController@getChiTiet']);
Route::post('comment/{id}','CommentController@postComment');
Route::get('lien-he',['as'=>'lienhe','uses'=>'PageController@getLienHe']);
Route::post('lien-he',['as'=>'lienhe','uses'=>'PageController@postLienHe']);
Route::get('gioi-thieu',['as'=>'gioithieu','uses'=>'PageController@getGioiThieu']);

Route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=>'PageController@getAddToCart']);
Route::post('add-to-cart/{id}',['as'=>'them','uses'=>'PageController@postAddToCart']);
Route::get('update-cart',['as'=>'updatecart','uses'=>'PageController@updateCart']);
Route::get('del-cart/{id}',['as'=>'xoagiohang','uses'=>'PageController@getDelItemCart']);

Route::get('dat-hang',['as'=>'dathang','uses'=>'PageController@getCheckout']);
Route::post('dat-hang',['as'=>'dathang','uses'=>'PageController@postCheckout']);

Route::get('dang-nhap',['as'=>'login','uses'=>'PageController@getDangnhap']);
Route::post('dang-nhap',['as'=>'login','uses'=>'PageController@postDangnhap']);

Route::get('dang-xuat',['as'=>'logout','uses'=>'PageController@getDangxuat']);

Route::get('dang-ky',['as'=>'signup','uses'=>'PageController@getDangky']);
Route::post('dang-ky',['as'=>'signup','uses'=>'PageController@postDangky']);

Route::get('tim-kiem',['as'=>'search','uses'=>'PageController@getTimkiem']);

Route::post('ua-thich',['as'=>'like','uses'=>'LikeController@postLike']);


Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangxuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'AdminLogin'],function(){
	Route::group(['prefix'=>'user','middleware'=>'Checkadmin'],function(){
		Route::get('danhsach',['uses'=>'UserController@getDanhsach']);

		Route::get('them',['uses'=>'UserController@getThem']);
		Route::post('them',['uses'=>'UserController@postThem']);

		Route::get('sua/{id}',['uses'=>'UserController@getSua']);
		Route::post('sua/{id}',['uses'=>'UserController@postSua']);

		Route::get('xoa/{id}',['uses'=>'UserController@getXoa']);
	});
	Route::group(['prefix'=>'lienhe'],function(){
		Route::get('danhsach',['uses'=>'ContactController@getDanhsach']);

		Route::get('xoa/{id}',['uses'=>'ContactController@getXoa']);
	});
	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('danhsach',['uses'=>'SanphamController@getDanhsach']);

		Route::get('them',['uses'=>'SanphamController@getThem']);
		Route::post('them',['uses'=>'SanphamController@postThem']);

		Route::get('sua/{id}',['uses'=>'SanphamController@getSua']);
		Route::post('sua/{id}',['uses'=>'SanphamController@postSua']);

		Route::get('xoa/{id}',['uses'=>'SanphamController@getXoa']);
	});
	Route::group(['prefix'=>'loaisanpham'],function(){
		Route::get('danhsach',['uses'=>'LoaisanphamController@getDanhsach']);

		Route::get('them',['uses'=>'LoaisanphamController@getThem']);
		Route::post('them',['uses'=>'LoaisanphamController@postThem']);

		Route::get('sua/{id}',['uses'=>'LoaisanphamController@getSua']);
		Route::post('sua/{id}',['uses'=>'LoaisanphamController@postSua']);

		Route::get('xoa/{id}',['uses'=>'LoaisanphamController@getXoa']);
	});
	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach',['uses'=>'SlideController@getDanhsach']);

		Route::get('them',['uses'=>'SlideController@getThem']);
		Route::post('them',['uses'=>'SlideController@postThem']);

		Route::get('sua/{id}',['uses'=>'SlideController@getSua']);
		Route::post('sua/{id}',['uses'=>'SlideController@postSua']);

		Route::get('xoa/{id}',['uses'=>'SlideController@getXoa']);
	});
	Route::group(['prefix'=>'new'],function(){
		Route::get('danhsach',['uses'=>'NewController@getDanhsach']);

		Route::get('them',['uses'=>'NewController@getThem']);
		Route::post('them',['uses'=>'NewController@postThem']);

		Route::get('sua/{id}',['uses'=>'NewController@getSua']);
		Route::post('sua/{id}',['uses'=>'NewController@postSua']);

		Route::get('xoa/{id}',['uses'=>'NewController@getXoa']);
	});
	Route::group(['prefix'=>'customer'],function(){
		Route::get('danhsach',['uses'=>'CustomerController@getDanhsach']);

		Route::get('them',['uses'=>'CustomerController@getThem']);
		Route::post('them',['uses'=>'CustomerController@postThem']);

		Route::get('sua/{id}',['uses'=>'CustomerController@getSua']);
		Route::post('sua/{id}',['uses'=>'CustomerController@postSua']);

		Route::get('xoa/{id}',['uses'=>'CustomerController@getXoa']);
	});
	Route::group(['prefix'=>'bill'],function(){
		Route::get('danhsach',['uses'=>'BillController@getDanhsach']);

		Route::get('them',['uses'=>'BillController@getThem']);
		Route::post('them',['uses'=>'BillController@postThem']);

		Route::get('sua/{id}',['uses'=>'BillController@getSua']);
		Route::post('sua/{id}',['uses'=>'BillController@postSua']);

		Route::get('xoa/{id}',['uses'=>'BillController@getXoa']);

		Route::get('chitiet/{id}',['uses'=>'BilldetailController@getDanhsach']);
		Route::get('chitiet/xoa/{id}',['uses'=>'BilldetailController@getXoa']);
		Route::get('chitiet/xoadonhang/{id}',['uses'=>'BilldetailController@getXoadonhang']);
		Route::get('chitiet/{id}/themsanpham',['uses'=>'BilldetailController@getThemsanpham']);
		Route::post('chitiet/{id}/themsanpham',['uses'=>'BilldetailController@postThemsanpham']);
		Route::post('chitiet/{id}/capnhat',['uses'=>'BilldetailController@postCapnhat']);
		Route::get('chitiet/status/{id}/{status}',['uses'=>'BilldetailController@changeStatus']);
	});
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('theloai/{id}',['uses'=>'AjaxController@getSanpham']);
	});
});
Route::get('/auth/facebook', ['uses' => 'FB\SocialAuthController@redirectToProvider']);
Route::get('/auth/facebook/callback', ['uses' => 'FB\SocialAuthController@handleProviderCallback']);