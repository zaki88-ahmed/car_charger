<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LastNewsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OurProjectsController;
use App\Http\Controllers\RateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});






Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});



Route::group(['prefix' => 'dashboard', 'middleware' => 'jwt.token'], function(){

    Route::post('about/company', [AboutController::class, 'updateAbout']);
    Route::get('about/get', [AboutController::class, 'getAbout']);
});


Route::group(['prefix' => 'contacts', 'middleware' => 'jwt.token'], function(){

    Route::get("user/messages", [MessageController::class, 'userMessages']);
    Route::post("send/message", [MessageController::class, 'SendMessage']);


    Route::get("all", [ContactController::class, 'showContacts']);
    Route::post("add", [ContactController::class, 'addContact']);
    Route::post("edit", [ContactController::class, 'editContact']);
    Route::post("delete", [ContactController::class, 'deleteContact']);

});




Route::group(['prefix' => 'lastnews', 'middleware' => 'jwt.token'], function(){

    Route::get('all/news',[LastNewsController::class,'allNews']);
    Route::POST('show/news',[LastNewsController::class,'showLastNews']);
    Route::Post('add/last/news',[LastNewsController::class,'addLastNew']);
    Route::Post('update/last/news',[LastNewsController::class,'updateLastNews']);
    Route::Post('delete/last/news',[LastNewsController::class,'deleteLastNews']);

});




Route::group(['prefix' => 'projects', 'middleware' => 'jwt.token'], function(){

    Route::get('all',[OurProjectsController::class,'allProjects']);
    Route::get('show',[OurProjectsController::class,'showProject']);
    Route::POST('add',[OurProjectsController::class,'addProject']);
    Route::POST('update',[OurProjectsController::class,'updateProject']);
    Route::POST('delete',[OurProjectsController::class,'deleteProject']);


});



Route::prefix('rate')->group(function(){

    Route::post('get', [RateController::class, 'rateApp']);

});


