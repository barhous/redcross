<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Redirector;
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
    return redirect('/login');
});
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
Route::post('/home/create', [App\Http\Controllers\HomeController::class,'create'])->name('create_pcr');
Route::get('logout', 'Auth\LoginController@logout');
Route::resource('users', UserController::class);
Route::resource('uhkits', uhkit::class);