<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderItemController;



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

Route::get('/',[HomeController::class, 'baseHome'])->name('/');

//auth routes...
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin Routes
//admin manages users...
Route::get('/showusers', [HomeController::class, 'showUsers'])->name('showUsers');
Route::get('/deleteUser/{userid}', [HomeController::class, 'deleteUser']);
Route::get('/editUser/{userid}', [HomeController::class, 'editUser']);
Route::post('/updatetUser/{userid}', [HomeController::class, 'updateUser']);

//admin manages Category
Route::get('/showCategory', [CategoryController::class, 'showCategory'])->name('showCategory');
Route::get('/addCategory', [CategoryController::class, 'addCategory'])->name('addCategory');
Route::post('/insertCategory', [CategoryController::class, 'insertCategory'])->name('insertCategory');
Route::get('/editCategory/{categoryid}', [CategoryController::class, 'editCategory'])->name('editCategory');
Route::post('/updateCategory/{categoryid}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
Route::get('/deleteCategory/{categoryid}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');

//admin manage products routes
Route::get('/showProduct', [ProductController::class, 'showProduct'])->name('showProduct');
Route::get('/addProduct', [ProductController::class, 'addProduct'])->name('addProduct');
Route::post('/insertProduct', [ProductController::class, 'insertProduct'])->name('insertProduct');
Route::get('/editProduct/{productid}', [ProductController::class, 'editProduct'])->name('editProduct');
Route::post('/updateProduct/{productid}', [ProductController::class, 'updateProduct'])->name('updateProduct');
Route::get('/deleteProduct/{productid}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

//admin manage orders routes
Route::get('/showOrder', [OrderController::class, 'showOrder'])->name('showOrder');
Route::get('/editOrder/{orderid}', [OrderController::class, 'editOrder'])->name('editOrder');
Route::post('/updateOrder/{orderid}', [OrderController::class, 'updateOrder'])->name('updateOrder');
Route::get('/deleteOrder/{orderid}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');

//admin manage Coupon routes
Route::get('/showCoupon', [CouponController::class, 'showCoupon'])->name('showCoupon');
Route::get('/addCoupon', [CouponController::class, 'addCoupon'])->name('addCoupon');
Route::post('/insertCoupon', [CouponController::class, 'insertCoupon'])->name('insertCoupon');
Route::get('/editCoupon/{couponid}', [CouponController::class, 'editCoupon'])->name('editCoupon');
Route::post('/updateCoupon/{couponid}', [CouponController::class, 'updateCoupon'])->name('updateCoupon');
Route::get('/deleteCoupon/{couponid}', [CouponController::class, 'deleteCoupon'])->name('deleteCoupon');

//admin manage Review routes
Route::get('/showReview', [ReviewController::class, 'showReview'])->name('showReview');
Route::get('/editReview/{reviewid}', [ReviewController::class, 'editReview'])->name('editReview');
Route::post('/updateReview/{reviewid}', [ReviewController::class, 'updateReview'])->name('updateReview');
Route::get('/deleteReview/{reviewid}', [ReviewController::class, 'deleteReview'])->name('deleteReview');

//admin manage Payment routes
Route::get('/showPayment', [PaymentController::class, 'showPayment'])->name('showPayment');
Route::get('/editPayment/{paymentid}', [PaymentController::class, 'editPayment'])->name('editPayment');
Route::post('/updatePayment/{paymentid}', [PaymentController::class, 'updatePayment'])->name('updatePayment');
Route::get('/deletePayment/{paymentid}', [PaymentController::class, 'deletePayment'])->name('deletePayment');

//Customer {Category} Home Page...
Route::get('/getCategory', [CategoryController::class, 'getCategory'])->name('getCategory');

//Customer {Product} Shop Page...
Route::get('/shopProducts', [ProductController::class, 'shopProducts']);
Route::get('/showProductDetails/{productId}', [ProductController::class, 'showProductDetails']);
Route::post('/createOrder', [ProductController::class, 'createOrder']);

//Customer {Cart} Product Details Page...
Route::post('/AddToCart/{productId}', [CartController::class, 'AddToCart']);
Route::get('/showCart', [CartController::class, 'showCart']);
Route::get('/deleteProductCart/{cart_id}', [CartController::class, 'deleteProductCart']);

//Customer {rating} Product Details review Page...
Route::post('/makeReview', [ReviewController::class, 'makeReview']);
Route::get('/makeReact/{product_id}', [ReviewController::class, 'makeReact']);

//Customer {wishlist} Page...
Route::get('/showWishlist', [WishlistController::class, 'showWishlist']);
Route::post('/AddToCartofWishlist', [WishlistController::class, 'AddToCartofWishlist']);
Route::post('/AddToWishlist', [WishlistController::class, 'AddToWishlist']);

//Customer {Order} Page...
Route::get('/ShowOrder', [OrderItemController::class, 'ShowOrder']);

//contact us page ...
Route::get('/showContactForm', [HomeController::class, 'showContactForm']);
Route::post('/contactUS', [HomeController::class, 'contactUS']);

//profile page...
Route::get('/showProfileDetails', [HomeController::class, 'showProfileDetails']);
Route::post('/updateUserData', [HomeController::class, 'updateUserData']);

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/adminHome', [HomeController::class, 'showHomeAdmin']);
