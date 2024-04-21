<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\LeaveController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('user/leave', [LeaveController::class, 'create'])->name('user.leave-form');
    Route::post('user/leave/submit', [LeaveController::class, 'store'])->name('user.leave-submit');
    Route::get('user/leave/records', [LeaveController::class, 'index'])->name('user.leave-records');
    Route::get('user/leave/records/delete/{id}', [LeaveController::class, 'destroy'])->name('category.delete');
  
});



Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('user/management/records', [AdminController::class, 'user_manage'])->name('admin.user-role');
    Route::get('user/leave/manage/records', [AdminController::class, 'leave_manage'])->name('admin.user-leave');
    Route::get('user/leave/manage/records/update-status/{table}/{id}/{value}', [AdminController::class, 'update_leave_status'])->name("update-status");
    Route::get('user/manage/records/update-user-status/{table}/{id}/{value}', [AdminController::class, 'update_user_status'])->name("update-user-status");
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
