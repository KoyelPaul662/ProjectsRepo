<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Session;
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

// Route::post(
//     'logout',
//     function () {
//         Session::forget('user');
//         return redirect('login');
//     }
// );

Route::view('/', 'form');
Route::post('create', [MemberController::class, 'savedata'])->name('create');
Route::get('/', [MemberController::class, 'view']);
Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [MemberController::class, 'update'])->name('update');
Route::get('/delete/{id}', [MemberController::class, 'delete'])->name('delete');
Route::view('login', 'login');
Route::get('login',[MemberController::class,'loginview']);
Route::post('login', [MemberController::class, 'login'])->name('login');
Route::post('logout', [MemberController::class,'logout']);
Route::middleware('auth:member')->group(function(){
    Route::view('dashboard', 'dashboard');
    Route::get('dashbaord',[MemberController::class,'dashboard']);
});

