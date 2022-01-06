<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,CheckoutController, CouponController, CartController, WishlistController,ProfileController,CategoryController, FrontendController, VendorController, ProductController};
use Illuminate\Support\Facades\Auth;


// Route::get('/', function () {
//     return view('frontend.index');
// });

Auth::routes();
Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('/product/details/{slug}', [FrontendController::class, 'productdetails'])->name('productdetails');
Route::get('/category/{category_id}', [FrontendController::class, 'categorywiseproducts'])->name('categorywiseproducts');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/email/offer', [HomeController::class, 'emailoffer'])->name('emailoffer');
Route::get('/single/email/offer/{id}', [HomeController::class, 'singleemailoffer'])->name('singleemailoffer');
Route::post('/check/email/offer', [HomeController::class, 'checkemailoffer'])->name('checkemailoffer');
Route::get('/profile', [ProfileController::class, 'index'])->name('profilepage');
Route::post('/profile/name/change', [ProfileController::class, 'namechange'])->name('profilepage.namechange');
Route::post('/profile/password/change', [ProfileController::class, 'passwordchange'])->name('profilepage.passwordchange');
Route::post('/profile/photo/change', [ProfileController::class, 'photochange'])->name('profilepage.photochange');

Route::resource('category', CategoryController::class);
Route::resource('vendor', VendorController::class);
Route::resource('product', ProductController::class);
Route::resource('wishlist', WishlistController::class);
Route::resource('coupon', CouponController::class);
Route::get('/wishlist/insert/{product_id}', [WishlistController::class, 'insert'])->name('wishlist.insert');
Route::get('/wishlist/remove/{wishlist_id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/addtocartfromwishlist/{wishlist_id}', [CartController::class, 'addtocartfromwishlist'])->name('addtocartfromwishlist');
Route::post('/add/cart/{product_id}', [CartController::class, 'addcart'])->name('addcart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/clear/shopping/cart/{user_id}', [CartController::class, 'clearshoppingcart'])->name('clearshoppingcart');
Route::get('/cart/remove/{cart_id}', [CartController::class, 'cartremove'])->name('cartremove');
Route::post('/cart/update}', [CartController::class, 'cartupdate'])->name('cartupdate');
Route::get('/checkout}', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout}', [CheckoutController::class, 'checkout_post'])->name('checkout_post');
