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
// Route for the application's home page. Maps the URL '/' to the 'index' method of 'SiteController'.
Route::get('/', [SiteController::class, 'index'])->name('site.home');

/* Route login */
Route::controller(LoginController::class)->group(function (){
    
    // Route to display the login form. Maps the URL '/login' to the 'index' method of 'LoginController'.
    Route::get('/login', 'index')->name('login.index');
    
    // Route to process login. Maps the URL '/login' to the 'store' method of 'LoginController'.
    // Applies the 'throttle' middleware to limit the number of login attempts.
    Route::post('/login', 'store')->name('login.store')->middleware('throttle:10,1');
    
    // Route for logging out. Maps the URL '/logout' to the 'destroy' method of 'LoginController'.
    // Applies 'CheckToken' middleware to validate the token and 'auth:sanctum' to ensure the user is authenticated.
    Route::post('/logout', 'destroy')->name('login.destroy')->middleware([CheckToken::class]);
    
});

/* Email route to reset password */
// Route to display the form for requesting a password reset link. Maps the URL '/login/password/emailForm' to the 'emailForm' method of 'ForgotPasswordController'.
Route::get('/login/password/emailForm', [ForgotPasswordController::class, 'emailForm'])->name('password.emailForm');

// Route to send the password reset link via email. Maps the URL '/login/password/emailForm' to the 'emailLink' method of 'ForgotPasswordController'.
Route::post('/login/password/emailForm', [ForgotPasswordController::class, 'emailLink'])->name('password.emailLink');

/* Route password reset */
// Route to display the password reset form using a token. Maps the URL '/login/password/reset/{token}' to the 'resetForm' method of 'PasswordResetController'.
Route::get('/login/password/reset/{token}', [PasswordResetController::class, 'resetForm'])->name('password.reset');

// Route to process the password reset. Maps the URL '/login/password/reset' to the 'reset' method of 'PasswordResetController'.
Route::post('/login/password/reset', [PasswordResetController::class, 'reset'])->name('password.resetPost');

/* Middleware security */
// Group of routes protected by middlewares that ensure the user is authenticated and that caching is disabled.
Route::middleware(['auth:sanctum', CheckToken::class, NoCache::class])->group(function () {
    
    // Route to display the admin dashboard. Maps the URL '/admin/dashboard' to the 'index' method of 'DashboardController'.
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Route to display the user profile update form. Maps the URL '/admin/updateUser' to the 'updateUser' method of 'DashboardController'.
    Route::get('/admin/updateUser', [DashboardController::class, 'updateUser'])->name('admin.updateUser');
    
    // Route to update the user profile. Maps the URL '/admin/updateUser' to the 'updateUserPut' method of 'DashboardController'.
    Route::put('/admin/updateUser', [DashboardController::class, 'updateUserPut'])->name('admin.updateUser.put');
    
    // Route to display the form for creating a vacation plan. Maps the URL '/admin/create' to the 'createPlanVacation' method of 'DashboardController'.
    Route::get('/admin/create', [DashboardController::class, 'createPlanVacation'])->name('admin.create.get');
    
    // Route to create a new vacation plan. Maps the URL '/admin/create' to the 'create' method of 'DashboardController'.
    Route::post('/admin/create', [DashboardController::class, 'create'])->name('admin.create.post');
    
    // Route to display the form for updating an existing vacation plan. Maps the URL '/admin/update/{id}' to the 'updatePlanVacation' method of 'DashboardController'.
    Route::get('/admin/update/{id}', [DashboardController::class, 'updatePlanVacation'])->name('admin.update.get');
    
    // Route to update an existing vacation plan. Maps the URL '/admin/update/{id}' to the 'update' method of 'DashboardController'.
    Route::put('/admin/update/{id}', [DashboardController::class, 'update'])->name('admin.update.put');

    // Route to delete an existing vacation plan. Maps the URL '/admin/delete/{id}' to the 'delete' method of 'DashboardController'.
    Route::delete('/admin/delete/{id}', [DashboardController::class, 'delete'])->name('admin.delete');

    // Route to generate a PDF for a vacation plan. Maps the URL '/admin/{id}/pdf' to the 'generatePDF' method of 'DashboardController'.
    Route::get('/admin/{id}/pdf', [DashboardController::class, 'generatePDF'])->name('admin.vacation-plan.pdf');

});

/* Route user resource */
// Resource route for users. Maps RESTful routes for creating and storing a new user using 'create' and 'store' methods of 'UserController'.
Route::resource('user', UserController::class)->only(['create', 'store']);

