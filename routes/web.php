<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Auth;

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

Route::get('admin/sign-in', ['as' => 'sign_in', 'uses' =>'App\Http\Controllers\PageController@getLoginAdmin']);
Route::post('admin/sign-in', ['as' => 'signin', 'uses' => 'App\Http\Controllers\PageController@postLoginAdmin']);
Route::get('admin/sign-out',['as'=>'signout', 'uses' => 'App\Http\Controllers\PageController@getSignOutAdmin']);
Route::get('forgot', ['as' => 'quenmk', 'uses' =>'App\Http\Controllers\PageController@getForgot']);
Route::get('admin/custommer', ['as' => 'quantri', 'uses' =>'App\Http\Controllers\PageController@getCustommer']);
Route::get('admin/users', ['as' => 'users', 'uses' =>'App\Http\Controllers\PageController@getUser']);

//Products routes
Route::get('admin/products', ['as' => 'products', 'uses' =>'App\Http\Controllers\PageController@getProduct']);
Route::get('admin/product/{id}/edit', ['as' => 'edit_product', 'uses' =>'App\Http\Controllers\PageController@editProduct']);
Route::patch('admin/product/{id}', ['as' => 'update_product', 'uses' =>'App\Http\Controllers\PageController@updateProduct']);
Route::get('admin/addProduct/', ['as' => 'add-product', 'uses' =>'App\Http\Controllers\PageController@create']);
Route::post('admin/add', ['as' => 'add_product', 'uses' =>'App\Http\Controllers\PageController@addProduct']);
Route::delete('admin/product/{id}', ['as' => 'delete-product', 'uses' => 'App\Http\Controllers\PageController@destroyProduct']);

//Products Type routes
Route::get('admin/productType', ['as' => 'productsType', 'uses' =>'App\Http\Controllers\PageController@getTypeProduct']);
Route::get('admin/type_product/{id}/edit', ['as' => 'edit_type_product', 'uses' =>'App\Http\Controllers\PageController@editTypeProduct']);
Route::patch('admin/type_product/{id}', ['as' => 'update_type_product', 'uses' =>'App\Http\Controllers\PageController@updateTypeProduct']);
Route::get('admin/addTypeProduct/', ['as ' => 'add-type-product', 'uses' =>'App\Http\Controllers\PageController@createType']);
Route::post('admin/addTypeProduct', ['as' => 'add_type_product', 'uses' =>'App\Http\Controllers\PageController@addTypeProduct']);
Route::delete('admin/productType/{id}', ['as' => 'delete-type-product', 'uses' => 'App\Http\Controllers\PageController@destroyTypeProduct']);

//Slide routes
Route::get('admin/slide', ['as' => 'slides', 'uses' => 'App\Http\Controllers\PageController@getSlide']);
Route::get('admin/addSlide/', ['as' => 'add-slide', 'uses' =>'App\Http\Controllers\PageController@createSlide']);
Route::post('admin/addStyle', ['as' => 'add_slide', 'uses' =>'App\Http\Controllers\PageController@addSlide']);
Route::get('admin/slide/{id}/edit', ['as' => 'edit_slide', 'uses' => 'App\Http\Controllers\PageController@editSlide']);
Route::patch('admin/slide/{id}', ['as' => 'update_slide', 'uses' => 'App\Http\Controllers\PageController@updateSlide']);
Route::delete('admin/slide/{id}', ['as' => 'delete_slide', 'uses' => 'App\Http\Controllers\PageController@destroySlide']);

// User Admin routes
Route::get('admin/user/{id}/edit', ['as' => 'edit', 'uses' =>'App\Http\Controllers\PageController@edit']);
Route::patch('admin/user/{id}', ['as' => 'update', 'uses' =>'App\Http\Controllers\PageController@update']);
Route::delete('admin/user/{id}', ['as' => 'delete', 'uses' => 'App\Http\Controllers\PageController@updateSlide']);


//Bill routes
Route::get('admin/bill', ['as' => 'bills', 'uses' => 'App\Http\Controllers\PageController@getBill']);
Route::get('admin/addSlide/', ['as' => 'add-slide', 'uses' =>'App\Http\Controllers\PageController@createSlide']);
Route::post('admin/addStyle', ['as' => 'add_slide', 'uses' =>'App\Http\Controllers\PageController@addSlide']);
Route::get('admin/slide/{id}/edit', ['as' => 'edit_slide', 'uses' => 'App\Http\Controllers\PageController@editSlide']);
Route::patch('admin/slide/{id}', ['as' => 'update_slide', 'uses' => 'App\Http\Controllers\PageController@updateSlide']);
Route::delete('admin/slide/{id}', ['as' => 'delete_slide', 'uses' => 'App\Http\Controllers\PageController@destroySlide']);



Route::get('index', ['as' => 'trang_chu', 'uses' => 'App\Http\Controllers\PageController@getIndex']);
Route::get('loai_san_pham/{type}', ['as'=>'loaisanpham', 'uses' => 'App\Http\Controllers\PageController@getLoaiSanPham']);
Route::get('chi_tiet_san_pham/{id}', ['as'=>'chi_tiet_san_pham', 'uses' => 'App\Http\Controllers\PageController@getChiTietSanPham']);
Route::get('lien_he', ['as'=>'lienhe', 'uses' => 'App\Http\Controllers\PageController@getLienHe']);
Route::get('gioi_thieu', ['as'=>'gioithieu', 'uses' => 'App\Http\Controllers\PageController@getGioiThieu']);


Route::get('dang-nhap', ['as'=>'login', 'uses' => 'App\Http\Controllers\PageController@getLogin']);
Route::post('dang_nhap', ['as'=>'dangnhap', 'uses' => 'App\Http\Controllers\PageController@postLogin']);

Route::get('dangky', ['as'=>'dangky', 'uses' => 'App\Http\Controllers\PageController@getSignup']); 
Route::post('dangky', ['as'=>'signup', 'uses' => 'App\Http\Controllers\PageController@postSignup']); 

Route::get('dangxuat',['as'=>'logout', 'uses' => 'App\Http\Controllers\PageController@getLogout']);

Route::get('search', ['as' => 'search', 'uses' => 'App\Http\Controllers\PageController@getSearch']);

Route::get('addToCart/{id}', ['as' => 'addToCart', 'uses' => 'App\Http\Controllers\PageController@getAddToCart']);
Route::get('delete_cart/{id}', ['as' => 'deleteCart', 'uses' => 'App\Http\Controllers\PageController@getDeleteCart']);
Route::get('checkout', ['as' => 'checkout', 'uses' => 'App\Http\Controllers\PageController@getCheckOut']);
Route::post('dathang', ['as' => 'dathang', 'uses' => 'App\Http\Controllers\PageController@postCheckOut']);







