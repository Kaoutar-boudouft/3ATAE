<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dasboard;

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
Route::get('usersrecord/{userid}',[dasboard::class,'usersrecord']);
Route::get('form2ofdisc',[dasboard::class,'form2ofdisc']);
Route::get('form3ofdisc',[dasboard::class,'form3ofdisc']);
