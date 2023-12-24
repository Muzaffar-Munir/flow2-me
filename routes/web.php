<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\AmlPolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FooterIconLinksController;
use App\Http\Controllers\FooterLogoController;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\ContactUsPageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeController;
use App\Models\AdminAccount;

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

require __DIR__ . '/auth.php';
    Route::middleware('custom')->group(function () {
    Route::get('/user-home',[HomeController::class,'user_index'])->name('user-home');
    Route::get('/home',[HomeController::class,'index'])->name('home');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');

    Route::resource('/products', ProductController::class);
    // product search
    Route::post('/products/search', [ProductController::class,'search'])->name('products.search');
    Route::get('clear-search-products',[ProductController::class,'clear_search_products']);
    //Brands

    //users
    Route::get('users',[UserController::class, 'index'])->name('users.index');
    Route::get('users/edit/{id}',[UserController::class, 'edit'])->name('users.edit');
    Route::post('users/update/{id}',[UserController::class, 'update'])->name('users.update');
    Route::post('users/delete/{id}',[UserController::class, 'delete'])->name('users.delete');
    //UserProfile
    Route::get('userprofile-edit/{id}',[UserController::class,'userprofile_edit'])->name('userprofile.edit');
    Route::post('userprofile-update/{id}',[UserController::class,'userprofile_update'])->name('userprofile.update');

    Route::get('contact-us',[ContactUsController::class,'index'])->name('contact-us.index');
    Route::get('about',[AboutController::class,'index'])->name('about.index');


    Route::get('carts',[CartController::class,'index'])->name('carts.index');
    Route::get('add_to_cart',[CartController::class,'addToCart'])->name('add_to_cart.store');

    Route::get('/remove-from-cart/{cart_item}', [CartController::class, 'cartRemove'])->name('remove-from-cart');

    Route::get('checkout',[CheckoutController::class,'index'])->name('checkout.index');

    Route::post('checkout.store',[OrderController::class,'checkOut'])->name('checkout.store');

    // Roles
    Route::get('roles',[AdminController::class,'role_create'])->name('roles.index');
    Route::post('roles.store',[AdminController::class,'role_store'])->name('roles.store');
    Route::get('roles-delete/{id}',[AdminController::class,'roles_delete'])->name('roles.delete');
    Route::post('roles-update/{id}',[AdminController::class,'role_update'])->name('roles.update');
    // paypal
    // Route::view('payment', 'paypal.index')->name('create.payment');



    Route::get('payment',[PaymentController::class,'paypal_index'])->name('create.payment');
    Route::get('handle-payment',[PaymentController::class,'handlePayment'])->name('make.payment');
    Route::get('cancel-payment',[PaymentController::class,'paymentCancel'])->name('cancel.payment');
    Route::get('payment-success',[PaymentController::class,'paymentSuccess'])->name('success.payment');


    Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');



});

