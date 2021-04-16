<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDetailController;
use App\Http\Controllers\SlideController;
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
//page
Route::get('/', [PageController::class, 'home']);
Route::get('/productDetail/{id}', [PageController::class, 'productDetail']);
Route::get('/productType/{id}', [PageController::class, 'productType']);
Route::get('/productBrand/{id}', [PageController::class, 'productBrand']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/userLogin', [PageController::class, 'userLogin']);
Route::post('/search', [PageController::class, 'search']);

//slide
Route::get('/dashboard/slide',[SlideController::class,'getAllSlide']);
Route::get('/dashboard/slideInsert',[SlideController::class,'insertForm']);
Route::post('/dashboard/slideCheck',[SlideController::class,'slideInsert']);
Route::get('/dashboard/slideDelete/{id}',[SlideController::class,'slideDelete']);
Route::get('/dashboard/slideUpdate/{id}',[SlideController::class,'slideUpdate']);
Route::post('/dashboard/slideUpdateCheck/{id}',[SlideController::class,'slideCheckUpdate']);

//Invoice
Route::get('/checkAllOrder/{id}',[InvoiceController::class, 'getAll']);
Route::get('/billDetail/{id}',[InvoiceDetailController::class, 'getAll']);
Route::get('/dashboard/Bill',[InvoiceController::class, 'getAllBill']);
Route::get('/dashboard/billDetail/{id}',[InvoiceDetailController::class, 'getAllBillDetail']);
Route::post('/dashboard/updateBill/{id}',[InvoiceController::class, 'updateStatus']);

//Cart
Route::post('/cartProduct',[CartController::class, 'getProduct']);
Route::get('/showCart',[CartController::class, 'showCart']);
Route::get('/delCart/{rowId}',[CartController::class, 'delPro']);
Route::post('/upCart/{rowId}',[CartController::class, 'upPro']);
Route::get('/showInfo',[CartController::class, 'showInfo']);
Route::post('/checkOut',[InvoiceController::class, 'insertInvoice']);
//Cmt

Route::post('/checkUserCmt/{id}',[CommentController::class,'insertCmt']);
Route::get('/delCmt/{id}/{idPro}',[CommentController::class,'delCmt']);
Route::get('/dashboard/cmt',[CommentController::class,'list']);
Route::get('/dashboard/cmtDelete/{id}',[CommentController::class,'delete']);

//Customer
Route::post('/checkUser',[CustomerController::class,'checkUser']);
Route::post('/checkUserLogin',[CustomerController::class,'checkUserLogin']);
Route::get('/dashboard/user',[CustomerController::class,'list']);
Route::get('/userLogout',[CustomerController::class,'logout']);
Route::get('/userDetail/{id}',[CustomerController::class,'detail']);
Route::get('/userChange/{id}',[CustomerController::class,'change']);
Route::post('/checkChangeUser/{id}',[CustomerController::class,'checkChange']);
Route::get('/userPassword/{id}',[CustomerController::class,'changePass']);
Route::post('/checkChangePass/{id}',[CustomerController::class,'checkChangePass']);

//admin
Route::get('/admin',[AdminController::class,'admin']);
Route::post('/check',[AdminController::class,'check']);
Route::get('/logout',[AdminController::class,'logout']);
Route::get('/dashboard',[AdminController::class,'dash']);
Route::get('/dashboard/productList',[AdminController::class,'list']);
Route::get('/adminCheck',[AdminController::class,'adminCheck']);
Route::post('/dashboard/searchProduct',[AdminController::class,'searchProduct']);
Route::post('/dashboard/searchCustomer',[AdminController::class,'searchCustomer']);
Route::post('/dashboard/searchBill',[AdminController::class,'searchBill']);
Route::post('/dashboard/searchCmt',[AdminController::class,'searchCmt']);

//product
Route::get('/dashboard/delete/{id}',[ProductController::class,'delete']);
Route::get('/dashboard/insert',[ProductController::class,'insert']);
Route::get('/dashboard/update/{id}',[ProductController::class,'update']);
Route::post('/dashboard/check',[ProductController::class,'insertCheck']);
Route::post('/dashboard/checkUpdate/{id}',[ProductController::class,'checkUpdate']);

//category
Route::get('/dashboard/cateList',[CategoryController::class,'list']);
Route::get('/dashboard/cateInsert',[CategoryController::class,'insert']);
Route::post('/dashboard/cateCheck',[CategoryController::class,'insertCheck']);
Route::get('/dashboard/cateDelete/{id}',[CategoryController::class,'delete']);
Route::get('/dashboard/cateUpdate/{id}',[CategoryController::class,'update']);
Route::post('/dashboard/checkCateUpdate/{id}',[CategoryController::class,'checkUpdate']);

//brand
Route::get('/dashboard/brandList',[BrandController::class,'list']);
Route::get('/dashboard/brandInsert',[BrandController::class,'insert']);
Route::post('/dashboard/brandCheck',[BrandController::class,'insertCheck']);
Route::get('/dashboard/brandUpdate/{id}',[BrandController::class,'update']);
Route::post('/dashboard/checkBrandUpdate/{id}',[BrandController::class,'updateCheck']);
Route::get('/dashboard/brandDelete/{id}',[BrandController::class,'delete']);

