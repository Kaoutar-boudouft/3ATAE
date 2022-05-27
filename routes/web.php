<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
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

Route::get('home',[auth::class,'index']);
Route::get('/', function () {
    return redirect('home');
});
Route::get('signup',[auth::class,'Signup']);
Route::get('signin',[auth::class,'Signin']);
Route::get('verifyEmail',[auth::class,'verifyEmailBlade']);
Route::post('ValidateEmail',[auth::class,'Validateemail']);
Route::get('verifyNumber',[auth::class,'verifyNumberBlade']);
Route::post('validateNumber',[auth::class,'Validatenumber']);
Route::post('Register',[auth::class,'Register']);
Route::post('Login',[auth::class,'Login']);
Route::get('Logout',[auth::class,'Logout']);
Route::get('reset',[auth::class,'reset']);
Route::post('sendpass',[auth::class,'sendpass']);
Route::post('UpdateProfile',[ProfileController::class,'UpdateProfile']);

Route::group(['middleware'=>['mustnotbeadmin']],function(){
    Route::get('profile',[ProfileController::class,'UserProfile']);
    Route::get('AddAnnouncement',[AnnoncesController::class,'AddAnnonceblade']);
    Route::post('AddsdAnnouncement',[AnnoncesController::class,'AdddAnnouncement']);
    Route::get('GetSDAPerUser',[AnnoncesController::class,'GetSDAPerUser']);
    Route::get('GetAnnonces/{type}',[AnnoncesController::class,'GetAperAjax']);
    Route::post('EditeAnnonce',[AnnoncesController::class,'EditeAnnonce']);
    Route::get('AnnonceParametrs/{id}',[AnnoncesController::class,'AnnoncePamas']);
    Route::put('AddOffertIwant',[AnnoncesController::class,'AddOffertIwant']);
    Route::delete('deleteOffertIwant',[AnnoncesController::class,'deleteOffertIwant']);
});


Route::group(['middleware'=>['mustbeauthentified','mustnotbeadmin']],function(){
    Route::get('getconv',[ConversationController::class,'conversationblade']);
    Route::get('chat/{id?}',[ConversationController::class,'chatblade']);
    Route::get('conversations/{id}',[ConversationController::class,'messagesblade']);
});

Route::get('dashboard',[dasboard::class,'index']);
Route::get('admindata',[dasboard::class,'admindatablade']);
Route::get('allproductsblade',[dasboard::class,'allproductsblade']);
Route::get('productfetchingblade/{status}',[dasboard::class,'productfetchingblade']);
Route::get('getallusersblade',[dasboard::class,'getallusersblade']);
Route::get('getallcategoriesblade',[dasboard::class,'getallcategoriesblade']);
Route::get('souscategoriesblade',[dasboard::class,'souscategoriesblade']);
Route::get('souscategorybycatblade/{catid}',[dasboard::class,'souscategorybycatblade']);

Route::get('getitemsofuser/{userid}',[dasboard::class,'getitemsofuser']);
//Route::get('productstovalidate',[dasboard::class,'productstovalidateblade']);
//Route::get('allproductsblade',[dasboard::class,'allproductsblade']);
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\languagescontroller@switchLang']);
Route::get('usersrecord/{userid}',[dasboard::class,'usersrecord']);
Route::get('form2ofdisc',[dasboard::class,'form2ofdisc']);
Route::get('form3ofdisc',[dasboard::class,'form3ofdisc']);

//Route::get('conversations/{id?}',[ConversationController::class,'fetchconversation']);
