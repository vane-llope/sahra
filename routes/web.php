<?php

use App\Http\Controllers\EntityController;
use App\Http\Controllers\Even;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RoleController;
use App\Models\UserEvent;

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
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/admin', function () {
    return view('admin');
});
//event
Route::get('/events',[EventController::class,'index']);
Route::post('/events',[EventController::class,'store']);
Route::get('/events/create',[EventController::class,'create']);
Route::get('/events/{event}/edit',[EventController::class,'edit']);
Route::put('/events/{event}',[EventController::class,'update']);
Route::delete('/events/{event}',[EventController::class,'destroy']);
Route::get('/events/{event}',[EventController::class,'show']);
//users
Route::get('/users/login',[UserController::class,'login'])->name('login')->middleware('guest');
Route::get('/users/register',[UserController::class,'register'])->middleware('guest');
Route::get('/users',[UserController::class,'index']);
Route::post('/users/register',[UserController::class,'store']);
Route::post('/users/authenticate',[UserController::class,'authenticate']);
Route::post('/users/logout',[UserController::class,'logout']);
Route::post('/users/password/{user}',[UserController::class,'updatePassword']);
Route::get('/users/{user}/edit',[UserController::class,'edit']);
Route::put('/users/{user}',[UserController::class,'update']);
Route::get('/users/password/{user}/edit',[UserController::class,'changePassword']);
Route::delete('/users/{user}',[UserController::class,'destroy']);
Route::post('/users/logout',[UserController::class,'logout']);
//register
Route::get('/registered/users/{event}',[UserEventController::class,'index']);
Route::post('/registered/{event}',[UserEventController::class,'create'])->middleware('auth');
Route::delete('/registered/{user}',[UserEventController::class,'destroy']);
//roles
Route::get('/roles',[RoleController::class,'index']);
Route::get('/roles/{role}/edit',[RoleController::class,'edit']);
Route::put('/roles/{role}',[RoleController::class,'update']);
Route::post('/roles',[RoleController::class,'store']);
Route::get('/roles/create',[RoleController::class,'create']);
Route::delete('/roles/{role}',[RoleController::class,'destroy']);
//Entities
Route::get('/entities',[EntityController::class,'index']);
Route::post('/entities',[EntityController::class,'store']);
Route::put('/entities/{entity}',[EntityController::class,'update']);
Route::get('/entities/{entity}/edit',[EntityController::class,'edit']);
Route::get('/entities/create',[EntityController::class,'create']);
Route::delete('/entities/{entity}',[EntityController::class,'destroy']);