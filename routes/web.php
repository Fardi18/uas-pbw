<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\BengkelBookingController;
use App\Http\Controllers\BengkelTransactionController;
use App\Http\Controllers\ChatbotController;

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
    return view('user.landingpage');
});
Route::get('/servicepage', [ServiceController::class, 'index']);
Route::get('/kelurahan/{kecamatan_id}', [ServiceController::class, 'getKelurahans']);
Route::get('/detailbengkelpage/{id}', [ServiceController::class, 'detailBengkel']);
Route::get('/productpage', [PageController::class, 'index']);
Route::get('/detailproductpage/{id}', [PageController::class, 'detailProduct']);


// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/userregister', [AuthController::class, 'userregister'])->name('userregister');
Route::get('/get-kelurahans/{kecamatan_id}', [AuthController::class, 'getKelurahans']);
Route::get('/ownerregister', [AuthController::class, "ownerregister"])->name('ownerregister');
Route::post('/userregister', [AuthController::class, "douserregister"])->name('do.userregister');
Route::post('/ownerregister', [AuthController::class, "doownerregister"])->name('do.ownerregister');


// USER
Route::middleware(['auth:web'])->group(function () {
    // Profile
    Route::get('/profileuser', [ProfileUserController::class, 'showuser']);
    Route::get('/profileuser/{id}', [ProfileUserController::class, 'showdetailuser']);
    Route::get('/profileuser/{id}/edit', [ProfileUserController::class, 'edit']);
    Route::post('/profileuser/{id}', [ProfileUserController::class, 'storedetailuser']);
    Route::put('/profileuser/{id}', [ProfileUserController::class, 'updatedetailuser']);
    // Booking
    Route::get('/profile-booking', [ProfileUserController::class, 'bookingList']);
    Route::get('/profile-booking/{id}', [ProfileUserController::class, 'showBooking']);
    Route::get('/booking/add/{id}', [ServiceController::class, 'bookingPage']);
    Route::post('/booking', [BookingController::class, 'booking']);
    // Transaction
    Route::get('/profile-transaction', [ProfileUserController::class, 'transactionList']);
    Route::get('/profile-transaction/{transaction}', [ProfileUserController::class, 'showTransaction'])->name('customer.show.transaction');
    // Cart
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('add_toCart');
    Route::patch('/cart/{cart}', [CartController::class, 'updateCart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'deleteCart'])->name('delete_cart');
    // Checkout
    Route::get('/checkout-page', [CheckoutController::class, 'checkoutPage'])->name('checkout.page');
    Route::post('/checkout', [CheckoutController::class, 'checkoutProcess'])->name('checkout.process');
});

// ADMIN
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin-index', [AdminController::class, 'index'])->name('adminindex');
    Route::get('/admin-listuser', [AdminController::class, 'listuser'])->name('showlistuser');
    Route::get('/admin-listbengkel', [AdminController::class, 'listbengkel'])->name('showlistbengkel');
    Route::get('/admin-listowner', [AdminController::class, 'listowner'])->name('showlistowner');
    Route::get('/admin-listbooking', [AdminController::class, 'listbooking'])->name('showlistbooking');
    Route::get('/admin-detailuser/{id}', [AdminController::class, 'detailuser'])->name('detailuser');
    Route::get('/admin-detailowner/{id}', [AdminController::class, 'detailowner'])->name('detailowner');
    Route::get('/admin-detailbengkel/{id}', [AdminController::class, 'detailbengkel'])->name('detailbengkel');
    Route::get('/admin-detailbooking/{id}', [AdminController::class, 'detailbooking'])->name('detailbooking');
    Route::get('/admin-listowner/{id}/delete', [AdminController::class, 'destroyowner'])->name('deletelistowner');
    Route::get('/admin-listuser/{id}/delete', [AdminController::class, 'destroyuser'])->name('deletelistuser');
    Route::get('/admin-listbengkel/{id}/delete', [AdminController::class, 'destroybengkel'])->name('deletelistbengkel');
    Route::get('/admin-transaction', [AdminController::class, 'listtransaction'])->name('showlisttransaction');
    Route::get('/admin-transaction/{transaction}', [AdminController::class, 'detailtransaction'])->name('admin.show.transaction');
});

// BENGKEL
Route::prefix('/owner')->middleware('auth:owner')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard']);
    // bengkel
    Route::get('/bengkel', [BengkelController::class, 'index']);
    Route::get('/get-kelurahan/{kecamatan_id}', [BengkelController::class, 'getKelurahans']);
    Route::get('/bengkel/add', [BengkelController::class, 'create']);
    Route::post('/bengkel', [BengkelController::class, 'store']);
    Route::get('/bengkel/{id}/edit', [BengkelController::class, 'edit']);
    Route::put('/bengkel/{id}', [BengkelController::class, 'update']);
    Route::get('/bengkel/{id}/delete', [BengkelController::class, 'destroy']);
    // layanan
    Route::get('/layanan', [LayananController::class, 'index']);
    Route::get('/layanan/add', [LayananController::class, 'create']);
    Route::post('/layanan', [LayananController::class, 'store']);
    Route::get('/layanan/{id}/edit', [LayananController::class, 'edit']);
    Route::put('/layanan/{id}', [LayananController::class, 'update']);
    Route::get('/layanan/{id}/delete', [LayananController::class, 'destroy']);
    // Product
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/add', [ProductController::class, 'create']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::get('/product/{id}/delete', [ProductController::class, 'destroy']);
    // jadwal
    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/jadwal/add', [JadwalController::class, 'create']);
    Route::post('/jadwal', [JadwalController::class, 'store']);
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit']);
    Route::put('/jadwal/{id}', [JadwalController::class, 'update']);
    Route::get('/jadwal/{id}/delete', [JadwalController::class, 'destroy']);
    // booking
    Route::get('/booking', [BengkelBookingController::class, 'booking'])->name('bengkelbooking');
    Route::get('/booking/{id}/edit', [BengkelBookingController::class, 'editBooking']);
    Route::get('/booking/{id}', [BengkelBookingController::class, 'detailBooking']);
    Route::put('/booking/{id}', [BengkelBookingController::class, 'updateBooking'])->name('updatebooking');
    // transaction
    Route::get('/transaction', [BengkelTransactionController::class, 'index']);
    Route::get('/transaction/{transaction}', [BengkelTransactionController::class, 'show'])->name('mitra.show.transaction');
    Route::get('/transaction/{id}/edit', [BengkelTransactionController::class, 'edit']);
    Route::put('/transaction/{id}', [BengkelTransactionController::class, 'update'])->name('updatetransaction');
    Route::get('/transaction/add/{booking}', [BengkelTransactionController::class, 'create'])->name('mitra.add.transaction');
    Route::post('/transaction/{id}', [BengkelTransactionController::class, 'addToCart'])->name('add.to.cart');
    Route::delete('/transaction/cart/{id}', [BengkelTransactionController::class, 'removeFromCart'])->name('remove.from.cart');
    Route::post('/checkout/process/owner', [BengkelTransactionController::class, 'checkoutProcessForOwner'])->name('checkout.process.owner');
});



Route::match(['get', 'post'], '/botman', [ChatbotController::class, 'handle']);
