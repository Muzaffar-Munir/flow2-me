

<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/admin-login',[LoginController::class,'login'])->name('admin-login');
    Route::post('admin-login',[LoginController::class,'login_index'])->name('admin_login_index');


    Route::get('/',[LoginController::class,'user_login'])->name('user_login');
    Route::post('user_login',[LoginController::class,'user_login_index'])->name('user_login_index');


    Route::resource('/register', RegisterController::class);
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::Post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
});
?>
