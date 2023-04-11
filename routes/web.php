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
Route::get('profil', function () {
    return view('profil');
});
Route::get('main', function () {
    return view('main');
});
//şifremi unuttum
// Şifremi Unuttum Routları
Route::get('forgot', [Controller::class, 'forgot'])->name('forgot');
Route::post('forgotPost', [Controller::class, 'forgotPost'])->name('forgotPost');
Route::get('reset{token}', [Controller::class, 'showResetForm'])->name('reset');
Route::post('reset', [Controller::class, 'resetPassword'])->name('resetPassword');
//
Route::post('loginPost', [Controller::class, 'loginPost'])->name('loginPost');
Route::get('products', [Controller::class, 'products'])->name('products');
Route::get('customers', [Controller::class, 'customers'])->name('customers');
Route::post('productDelete', [Controller::class, 'productDelete'])->name('productDelete');
Route::post('userDelete', [Controller::class, 'userDelete'])->name('userDelete');
Route::get('signOut', [Controller::class, 'signOut'])->name('signOut');
Route::post('registerPost', [Controller::class, 'registerPost'])->name('registerPost');
Route::post('userUpdatePost', [Controller::class, 'userUpdatePost'])->name('userUpdatePost');


