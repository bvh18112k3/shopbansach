<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingMethodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BookController::class, 'home'])->name('home');
Route::get('/book', [BookController::class, 'book'])->name('book');
Route::get('bestselling', [BookController::class, 'bestselling'])->name('bestselling');
Route::get('/book-detail/{id}/{author_id}', [BookController::class, 'bookdetail'])->name('book-detail');
Route::get('/author', [AuthorController::class, 'author'])->name('author');
Route::get('/author_detail/{id}', [AuthorController::class, 'author_detail'])->name('author_detail');
Route::get('/bookType/{id}', [BookController::class, 'book_type'])->name('book_type');
Route::post('/search', [BookController::class, 'search'])->name('search');
Route::get('/login', function () {
    return view('user.account.login');
})->name('login');
Route::get('/forget', function (){
    return view('user.account.forget_password');
})->name('forgetPass');

Route::post('/forget', [PasswordController::class, 'forget'])->name('forget');
Route::get('/signUp', function () {
    return view('user.account.signUp');
})->name('signUp');
Route::get('/order', [OrderController::class, 'order']);


Route::get('/cart/{user_id}', [CartController::class, 'cart'])->name('cart');
Route::get('addAddress', [AddressController::class, 'create'])->name('addAddress');
Route::post('addAddress', [AddressController::class, 'store'])->name('addAddress');
Route::get('getAddress', [AddressController::class, 'address'])->name('getAddress');
Route::get('/address', [OrderController::class, 'address'])->name('address');
Route::post('/addOrder', [OrderController::class, 'addOrder'])->name('addOrder');
Route::get('cartEdit/{id}', [CartController::class, 'edit'])->name('cart.edit');
Route::post('cartUpdate/{id}', [CartController::class, 'updateCart'])->name('cart.update');

Route::post('orderCreate', [OrderController::class, 'store'])->name('postOrder');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/infor', [ProfileController::class, 'index'])->name('infor');
    Route::get('/{user}/order', [OrderController::class, 'orderUser'])->name('orderUser');
    Route::get('/{order}/orderDetail', [OrderDetailController::class, 'orderDetail'])->name('orderDetail');
    Route::post('/addCart', [CartController::class, 'store'])->name('postCart');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('{user}/{order}/review', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review',[ReviewController::class, 'store'])->name('review.store');
    Route::get('/updatePass', function (){
        return view('user.account.updatepass');
    })->name('updatepass');
    Route::post('/updatePass', [PasswordController::class, 'updatePass'])->name('updatePass');
});
Route::resource('carts', CartController::class);
Route::prefix('admin')->name('admin.')
    ->middleware(['auth', 'check_admin'])
    ->group(function () {
        Route::get('/', [OrderController::class, 'dashboard'])->name('home');
        Route::resource('book_types', BookTypeController::class);
        Route::resource('book_details', BookDetailController::class);
        Route::get('cart', [CartController::class, 'index'])->name('cart.index');
        Route::resource('authors', AuthorController::class);
        Route::resource('books', BookController::class);
        Route::resource('order_details', OrderDetailController::class);
        Route::resource('orders', OrderController::class);
        Route::resource('shippings', ShippingMethodController::class);
        Route::resource('reviews', ReviewController::class);
        Route::resource('payments', PaymentMethodController::class);
    });
Route::get('/send-mail', [\App\Http\Controllers\SendMailController::class, 'SendMail']);
Route::get('/newlist', [\App\Http\Controllers\NewController::class, 'newlist'])->name('newlist');
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::get('/test', function () {
    return view('user.thankyou');
});
Route::get('/testm', function () {
    return view('mail.mail');
});
Route::get('gu', [BookController::class, 'bookHot']);
Route::get('/sum', [OrderController::class, 'sum']);
Route::get('hu', [\App\Http\Controllers\DiscountCodeController::class, 'hu']);

require __DIR__ . '/auth.php';
