<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubscriptionController;


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

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Routes
Route::prefix('admin/dashboard')->name('admin.dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
});

// User Routes
Route::prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});

// News Routes
Route::prefix('admin/news')->name('admin.news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::post('/', [NewsController::class, 'store'])->name('store');
    Route::put('/{id}', [NewsController::class, 'update'])->name('update');
    Route::delete('/{id}', [NewsController::class, 'destroy'])->name('destroy');
});

// Complaint Routes
Route::prefix('admin/complaints')->name('admin.complaints.')->group(function () {
    Route::get('/', [ComplaintController::class, 'index'])->name('index');
    Route::get('/{id}', [ComplaintController::class, 'show'])->name('show');
    Route::post('/{id}/message', [ComplaintController::class, 'addMessage'])->name('addMessage');
});

// Service Routes
Route::prefix('admin/services')->name('admin.services.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::post('/', [ServiceController::class, 'store'])->name('store');
    Route::put('/{id}', [ServiceController::class, 'update'])->name('update');
    Route::delete('/{id}', [ServiceController::class, 'destroy'])->name('destroy');
});

// Subscription Routes
Route::prefix('admin/subscriptions')->name('admin.subscriptions.')->group(function () {
    Route::get('/', [SubscriptionController::class, 'index'])->name('index');
    Route::post('/', [SubscriptionController::class, 'store'])->name('store');
    Route::put('/{id}', [SubscriptionController::class, 'update'])->name('update');
    Route::delete('/{id}', [SubscriptionController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/detail', [SubscriptionController::class, 'detail'])->name('detail');
});

// Bill Routes
Route::prefix('admin/bills')->name('admin.bills.')->group(function () {
    Route::get('/', [BillController::class, 'index'])->name('index');
    Route::post('/', [BillController::class, 'store'])->name('store');
    Route::put('/{id}', [BillController::class, 'update'])->name('update');
    Route::delete('/{id}', [BillController::class, 'destroy'])->name('destroy');
    Route::post('/generate', [BillController::class, 'generateMonthlyBills'])->name('generate');
});

// Payment Routes
Route::prefix('admin/payments')->name('admin.payments.')->group(function () {
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::post('/', [PaymentController::class, 'store'])->name('store');
    Route::put('/{id}', [PaymentController::class, 'update'])->name('update');
    Route::delete('/{id}', [PaymentController::class, 'destroy'])->name('destroy');
});
