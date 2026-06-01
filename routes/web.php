<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', [TaskController::class, 'index']); // عرض القائمة
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // الإضافة
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // التعديل
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // الحذف


// أضيفي هذا السطر في ملف routes/web.php
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');


Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');