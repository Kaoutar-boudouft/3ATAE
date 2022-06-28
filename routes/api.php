<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth;
use App\Http\Controllers\AnnoncesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\dasboard;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('LoginApi',[auth::class,'LoginApi']);
Route::post('RegisterApi',[auth::class,'RegistrationApi']);
Route::post('ValidateEmailApi',[auth::class,'ValidateEmailApi']);
Route::post('ValidateNumberApi',[auth::class,'ValidateNumberApi']);
Route::post('SendResetPassApi',[auth::class,'SendResetPassApi']);
Route::get('/GettingSDCategoryApi/all',[AnnoncesController::class,'GettingSDCategoryApi']);
Route::get('Getallsouscategapi/all',[AnnoncesController::class,'GettingallSousCategoryApi']);
Route::get('/GettingSDSousCategoryApi/{idSdcategory}',[AnnoncesController::class,'GettingSDSousCategoryApi']);
Route::post('/AddSdAnnouncementApi',[AnnoncesController::class,'AddSdAnnouncementApi']);
Route::get('/GettingSDAnnouncementPerUser/{userName}/{status}',[AnnoncesController::class,'GetSDAPerUserApi']);
Route::post('ProfilePicChangingApi',[ProfileController::class,'ProfilePicChangingApi']);
Route::get('AnnonceById/{id}',[AnnoncesController::class,'GetAnnonceById']);
Route::post('UpdateProfileApi',[ProfileController::class,'UpdateProfileApi']);
Route::get('DeleteAnnonceById/{id}',[AnnoncesController::class,'DeleteAnnonceById']);
Route::get('GetRecentsOffers',[AnnoncesController::class,'GetRecentsOffers']);
Route::get('GetAnnoncesByHintsApi',[AnnoncesController::class,'GetAnnoncesByHintsApi']);
Route::get('Getallsouscategapi',[AnnoncesController::class,'Getallsouscategapi']);
Route::get('GetUserWhoWinByIdApi/{id}',[AnnoncesController::class,'GetUserWhoWinByIdApi']);
Route::put('fromValidToEnDiscussionApi',[AnnoncesController::class,'fromValidToEnDiscussionApi']);
Route::get('getConversationByIdApi/{annid}',[ConversationController::class,'getConversationByIdApi']);
Route::post('sendmessageapi',[MessageController::class,'sendmessageapi']);
Route::get('getUnreadMessages/{id}',[MessageController::class,'getUnreadMessages']);
Route::get('validateannouncement/{annid}',[dasboard::class,'validateannouncement']);
Route::get('reffuserannouncement/{annid}',[dasboard::class,'reffuserannouncement']);
Route::delete('removeUserapi',[dasboard::class,'removeUserapi']);
Route::post('addcategoryapi',[dasboard::class,'addcategoryapi']);
Route::put('updatecategoryapi',[dasboard::class,'updatecategoryapi']);
Route::get('getCategoryByIdApi/{id}',[dasboard::class,'getCategoryByIdApi']);
Route::delete('deletecategorybyid',[dasboard::class,'deletecategorybyid']);
Route::post('addsoucategoryapi',[dasboard::class,'addsoucategoryapi']);
Route::delete('removesouscategory',[dasboard::class,'removesouscategory']);
Route::get('checksupportcodeapi/{suppcode}',[dasboard::class,'checksupportcodeapi']);
Route::get('exchangeapi/{userid}/{amounttopay}',[dasboard::class,'exchangeapi']);
Route::put('discountpoints',[dasboard::class,'discountpoints']);
Route::put('UpdateProfilePicBase64',[ProfileController::class,'UpdateProfilePicBase64']);
Route::get('GetUserById/{UserId}',[ProfileController::class,'GetUserById']);
Route::get('GetUserByUserName/{UserName}',[ProfileController::class,'GetUserByUserName']);
Route::put('UpdateUserName',[ProfileController::class,'UpdateUserName']);
Route::put('UpdateCity',[ProfileController::class,'UpdateCity']);
Route::get('getitemsofuser/{userid}',[ProfileController::class,'getitemsofuser']);
Route::post('cancelItemIwant',[AnnoncesController::class,'deleteItemIwantApi']);
Route::get('getConversationOfUser/{userid}',[ConversationController::class,'getConversationOfUser']);
