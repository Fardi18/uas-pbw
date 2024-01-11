<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfileUserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransaksiController;

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
Route::get('/aboutpage', function () {
    return view('aboutus');
});
Route::get('/servicepage', [ServiceController::class, 'index']);


// AUTH
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'doLogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/userregister', [AuthController::class, "userregister"])->name('userregister');
Route::get('/ownerregister', [AuthController::class, "ownerregister"])->name('ownerregister');
Route::post('/userregister', [AuthController::class, "douserregister"])->name('do.userregister');
Route::post('/ownerregister', [AuthController::class, "doownerregister"])->name('do.ownerregister');

// USER
Route::middleware(['auth:web'])->group(function () {
    Route::get('/profileuser', [ProfileUserController::class, 'showuser']);
    Route::get('/profileuser/{id}', [ProfileUserController::class, 'showdetailuser']);
    Route::get('/profileuser/{id}/edit', [ProfileUserController::class, 'edit']);
    Route::post('/profileuser/{id}', [ProfileUserController::class, 'storedetailuser']);
    Route::put('/profileuser/{id}', [ProfileUserController::class, 'updatedetailuser']);
    Route::get('/profilekendaraan', [ProfileUserController::class, 'showkendaraan']);
    Route::get('/profiletransaksi', [ProfileUserController::class, 'showtransaksi']);
    Route::get('/profilekendaraan/add', [ProfileUserController::class, 'createkendaraan']);
    Route::post('/profilekendaraan', [ProfileUserController::class, 'storekendaraan']);
    Route::get('/profilekendaraan/{id}/delete', [ProfileUserController::class, 'destroykendaraan']);
    Route::get('/profilekendaraan/{id}/edit', [ProfileUserController::class, 'editkendaraan']);
    Route::put('/profilekendaraan/{id}', [ProfileUserController::class, 'updatekendaraan']);
    Route::get('/detailbengkelpage/{id}', [ServiceController::class, 'detailBengkel']);
    Route::get('/booking/add/{id}', [ServiceController::class, 'bookingPage']);
    Route::post('/booking', [BookingController::class, 'booking']);
});

// ADMIN
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/adminindex', [AdminController::class, 'index'])->name('adminindex');
    Route::get('/adminlistuser', [AdminController::class, 'listuser'])->name('showlistuser');
    Route::get('/adminlistbengkel', [AdminController::class, 'listbengkel'])->name('showlistbengkel');
    Route::get('/adminlistowner', [AdminController::class, 'listowner'])->name('showlistowner');
    Route::get('/adminlisttransaction', [AdminController::class, 'listtransaction'])->name('showlisttransaction');
    Route::get('/detailuser/{id}', [AdminController::class, 'detailuser'])->name('detailuser');
    Route::get('/detailowner/{id}', [AdminController::class, 'detailowner'])->name('detailowner');
    Route::get('/detailbengkel/{id}', [AdminController::class, 'detailbengkel'])->name('detailbengkel');
    Route::get('/detailtransaksi/{id}', [AdminController::class, 'detailtransaksi'])->name('detailtransaksi');
    Route::get('/adminlistowner/{id}/delete', [AdminController::class, 'destroyowner'])->name('deletelistowner');
    Route::get('/adminlistuser/{id}/delete', [AdminController::class, 'destroyuser'])->name('deletelistuser');
    Route::get('/adminlistbengkel/{id}/delete', [AdminController::class, 'destroybengkel'])->name('deletelistbengkel');
});

// BENGKEL
Route::prefix('/owner')->middleware('auth:owner')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard']);
    // bengkel
    Route::get('/bengkel', [BengkelController::class, 'index']);
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
    // jadwal
    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/jadwal/add', [JadwalController::class, 'create']);
    Route::post('/jadwal', [JadwalController::class, 'store']);
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit']);
    Route::put('/jadwal/{id}', [JadwalController::class, 'update']);
    Route::get('/jadwal/{id}/delete', [JadwalController::class, 'destroy']);
    // transaksi
    Route::get('/transaksi', [TransaksiController::class, 'transaksi'])->name('bengkeltransaksi');
    Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edittransaksi']);
    Route::get('/transaksi/{id}', [TransaksiController::class, 'detailtransaksi']);
    Route::put('/transaksi/{id}', [TransaksiController::class, 'updatetransaksi'])->name('updatetransaksi');
});
