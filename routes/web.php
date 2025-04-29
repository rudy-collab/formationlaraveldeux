<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
    return view('welcome');
});
Route::post('/updateTaskAll/{id}',[TodoController::class,'updateTaskAll'])->middleware(['auth'])->name('updateTaskAll');
Route::get('/',[TodoController::class,'index'])->name('index');
Route::get('/register',[TodoController::class,'register'])->name('register');
Route::post('/register',[TodoController::class,'registerAll'])->name('register');
Route::get('/logins',[TodoController::class,'logins'])->name('logins');
Route::post('/logins',[TodoController::class,'loginAll'])->name('logins');
Route::delete('/logout',[TodoController::class,'logout'])->name('logout');
Route::get('/listtodo',[TodoController::class,'listtodo'])->middleware(['auth',])->name('listtodo');
Route::post('/createTask',[TodoController::class,'createTask'])->middleware(['auth'])->name('createTask');
Route::get('/updateTask/{id}',[TodoController::class,'updateTask'])->middleware(['auth'])->name('updateTask');
Route::delete('/deleteTask/{id}',[TodoController::class,'deleteTask'])->middleware(['auth'])->name('deleteTask');
