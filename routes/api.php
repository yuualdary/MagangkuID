<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\CandidateController;




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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('createuser',[RegisterController::class,'store']);
Route::post('login',LoginController::class);

Route::group([
    'prefix'=>'company',
],function(){
    Route::post('create',[CompanyController::class,'store']);
});

Route::group([
    'prefix'=>'jobs',
],function(){
    Route::post('create',[JobsController::class,'store']);
    Route::get('all',[JobsController::class,'show']);
    Route::get('detailjob/{id}',[JobsController::class,'DetailJob']);


});


Route::group([
    'prefix'=>'tags',
],function(){
    Route::post('create',[TagController::class,'store']);

});

Route::group([
    'prefix'=>'candidate',
],function(){
    Route::post('apply',[CandidateController::class,'store']);
    Route::post('delete/{id}',[CandidateController::class,'destroy']);




});