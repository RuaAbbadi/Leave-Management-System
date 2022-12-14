<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\LeavesTypeController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfilesController;







/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[App\Http\Controllers\LeavesController::class,'index'])
->middleware(['auth'])
->name('home'); 

Route::resource('departments',DepartmentsController::class)->middleware(['auth']);
Route::resource('leavestype',LeavesTypeController::class)->middleware(['auth']);
Route::resource('employees',EmployeesController::class)->middleware(['auth']);
Route::resource('leaves',LeavesController::class)->middleware(['auth']);

Route::get('/login',[LoginController::class,'create'])
->middleware(['guest'])
->name('login');

Route::post('/login',[LoginController::class,'store'])
->middleware(['guest'])
;

Route::delete('/logout',[LoginController::class,'destroy'])
->middleware(['auth'])
->name('logout');

Route::get('/profile',[ProfilesController::class,'change'])
->middleware(['auth'])
->name('change_password');

Route::post('/profile',[ProfilesController::class,'update'])
->middleware(['auth'])
->name('update_password');




