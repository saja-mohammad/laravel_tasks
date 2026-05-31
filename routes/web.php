<?php
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TaskController::class, 'index']); // عرض القائمة
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // الإضافة
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // التعديل
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // الحذف