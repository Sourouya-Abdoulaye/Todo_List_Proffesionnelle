<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;







Route::get('/',[TaskController::class,'index'] )->name('liste.task');

Route::middleware(['auth','verified'])->group( function () {
    Route::get('/{id}/show',[TaskController::class,'show'])->where('id','[1-9]+')->name('show.task');
    Route::get('/create',[TaskController::class,'create'])->name('create.task')->middleware(['auth','verified']);
    Route::post('/store',[TaskController::class,'store'])->name('task.store');
    Route::get('/{id}/edit',[TaskController::class,'edit'])->name('edit.task');
    Route::put('/update',[TaskController::class,'update'])->name('update.task');
    Route::delete('/{id}/delete', [TaskController::class,'destroy'])->name('delete.task');
    // recherche en tant reel
    Route::get('/tasks/search', [TaskController::class, 'search'])->name('task.search');

});






// Route::prefix('admin')->group( function () {
    // != car Auth::user()->role retourne: null
    // dd(Auth::user()->role);
    // if (isset(Auth::user()->role) && Auth::user()->role == 'admin') {

    Route::get('/admin',[AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/tasks',[AdminController::class, 'tasks'])->name('admin.tasks');
    Route::get('/admin/users',[AdminController::class, 'users'])->name('admin.users');

    // }
    // return  to_route('liste.task');

// })->middleware(['auth', 'verified'])->name('admin');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
