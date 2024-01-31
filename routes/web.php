<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\master\BranchController;
use App\Models\admin\Branch;
use Spatie\Permission\Models\Role;

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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [UserController::class, 'index'])->name('users.list');
Route::get('/user/create', [UserController::class, 'create'])->name('users.create');
Route::post('/user/store', [UserController::class, 'store'])->name('users.save');

//role
Route::get('/role', [RoleController::class, 'index'])->name('roles.list');
Route::get('/role/create/{id?}', [RoleController::class, 'create'])->name('roles.create');
Route::post('/role/store', [RoleController::class, 'store'])->name('roles.store');
Route::post('/role/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
//branches
Route::get('/branch', [BranchController::class, 'index'])->name('branches');
Route::get('/branch/create/{id?}', [BranchController::class, 'create'])->name('branches.create');
Route::post('/branch/store', [BranchController::class, 'store'])->name('branches.store');
Route::post('/branch/destroy/{id}', [BranchController::class, 'destroy'])->name('branches.destroy');