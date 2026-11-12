<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{FrontController,OrderController,AuthController};
use App\Http\Controllers\Admin\{DashboardController,ServiceController,OrderController as AdminOrderController,SettingController,LandingSectionController,SecurityController};
Route::get('/',[FrontController::class,'index'])->name('home');
Route::post('/orders',[OrderController::class,'store'])->middleware('throttle:10,1')->name('orders.store');
Route::get('/admin/login',[AuthController::class,'create'])->middleware('guest')->name('login');
Route::post('/admin/login',[AuthController::class,'store'])->middleware('guest')->name('login.store');
Route::post('/admin/logout',[AuthController::class,'destroy'])->middleware('auth')->name('logout');
Route::prefix('admin')->name('admin.')->middleware(['auth','admin'])->group(function(){
 Route::get('/',[DashboardController::class,'index'])->name('dashboard');
 Route::resource('services',ServiceController::class)->except(['show']);
 Route::get('/orders',[AdminOrderController::class,'index'])->name('orders.index');
 Route::patch('/orders/{order}/status',[AdminOrderController::class,'status'])->name('orders.status');
 Route::get('/sections',[LandingSectionController::class,'index'])->name('sections.index');
 Route::put('/sections/{section}',[LandingSectionController::class,'update'])->name('sections.update');
 Route::get('/security',[SecurityController::class,'edit'])->name('security.edit');
 Route::put('/security',[SecurityController::class,'update'])->name('security.update');
 Route::get('/settings',[SettingController::class,'edit'])->name('settings.edit');
 Route::put('/settings',[SettingController::class,'update'])->name('settings.update');
});
