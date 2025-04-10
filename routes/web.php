<?php

/*
* Route definitions for the application.
* 
* Routes are responsible for mapping URLs to specific controller methods,
* and often include middlewares for protecting and validating access.
*/

/* Controllers */
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ForgotPasswordController;

/* Middlewares */
use App\Http\Middleware\CheckToken;
use App\Http\Middleware\NoCache;

/* Home */
Route::get('/', [SiteController::class, 'index'])->name('site.home');

/* Route login */
Route::controller(LoginController::class)->group(function (){
    
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store')->middleware('throttle:10,1');
    Route::post('/logout', 'destroy')->name('login.destroy')->middleware([CheckToken::class]);
    
});

/* Email route to reset password */
Route::get('/login/password/emailForm', [ForgotPasswordController::class, 'emailForm'])->name('password.emailForm');
Route::post('/login/password/emailForm', [ForgotPasswordController::class, 'emailLink'])->name('password.emailLink');

/* Route password reset */
Route::get('/login/password/reset/{token}', [PasswordResetController::class, 'resetForm'])->name('password.reset');
Route::post('/login/password/reset', [PasswordResetController::class, 'reset'])->name('password.resetPost');

/* Route Middleware security user 
Route::middleware(['auth:sanctum', CheckToken::class, NoCache::class])->group(function () {
    
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/updateUser', [DashboardController::class, 'updateUser'])->name('admin.updateUser');
    Route::put('/admin/updateUser', [DashboardController::class, 'updateUserPut'])->name('admin.updateUser.put');
    Route::get('/admin/create', [DashboardController::class, 'createPlanVacation'])->name('admin.create.get');
    Route::post('/admin/create', [DashboardController::class, 'create'])->name('admin.create.post');
    Route::get('/admin/update/{id}', [DashboardController::class, 'updatePlanVacation'])->name('admin.update.get');
    Route::put('/admin/update/{id}', [DashboardController::class, 'update'])->name('admin.update.put');
    Route::delete('/admin/delete/{id}', [DashboardController::class, 'delete'])->name('admin.delete');
    Route::get('/admin/{id}/pdf', [DashboardController::class, 'generatePDF'])->name('admin.vacation-plan.pdf');

});

Route::resource('user', UserController::class)->only(['create', 'store']);

