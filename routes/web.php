<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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
    return view('login');
});
Route::get('register', function () {
    return view('register');
});
Route::post('loginPost', [Controller::class, 'loginPost'])->name('loginPost');
Route::get('signOut', [Controller::class, 'signOut'])->name('signOut');
Route::post('registerPost', [Controller::class, 'registerPost'])->name('registerPost');


