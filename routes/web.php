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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/create', [App\Http\Controllers\HomeController::class,'create'])->name('create_pcr');
Route::get('uh_kit','uhkit_admin@index')->name('uh_kit-index');
Route::get('uh_kit/create','uhkit_admin@create')->name('uh_kit-create');
Route::post('uh_kit','uhkit_admin@store')->name('uh_kit-store'); 
Route::get('uh_kit/{uh_kit}/edit','uhkit_admin@edit')->name('uh_kit-edit'); 
Route::patch('uh_kit/{uh_kit}','uhkit_admin@update')->name('uh_kit-update');
Route::delete('uh_kit/{customer}','uhkit_admin@destroy')->name('uh_kit-destroy');