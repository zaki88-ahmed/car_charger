<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\dashboard\AboutController;
use App\Http\Controllers\dashboard\ContactController;
use App\Http\Controllers\dashboard\LastNewsController;
use App\Http\Controllers\dashboard\OurProjectController;
use App\Http\Controllers\dashboard\RateController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('admin.home.index');
});




Route::prefix('dashboard')->group(function(){

    Route::get('/admins', [AdminController::class, 'index']);
    Route::get('/admins/create', [AdminController::class, 'create']);
    Route::post('/admins/store', [AdminController::class, 'store']);

});






Route::prefix('dashboard')->group(function(){

    Route::get('about/', [AboutController::class, 'getAbout']);
    Route::get('/about/edit/{about}', [AboutController::class, 'editAbout']);
    Route::post('/about/update/{about}', [AboutController::class, 'updateAbout']);

});




Route::prefix('dashboard')->group(function(){

    Route::get('contacts/', [ContactController::class, 'getContacts']);
    Route::get('contacts/show/{contact}', [ContactController::class, 'showContact']);

    Route::get('/contact/create', [ContactController::class, 'createContact']);
    Route::post('/contact/store', [ContactController::class, 'storeContact']);

    Route::get('/contact/edit/{contact}', [ContactController::class, 'editContact']);
    Route::post('/contact/update/{contact}', [ContactController::class, 'updateContact']);

    Route::get('/contact/delete/{contact}', [ContactController::class, 'deleteContact']);

});







Route::prefix('dashboard')->group(function(){

    Route::get('news/', [LastNewsController::class, 'allNews']);
    Route::get('news/show/{news}', [LastNewsController::class, 'showLastNews']);

    Route::get('/news/create', [LastNewsController::class, 'createNews']);
    Route::post('/news/store', [LastNewsController::class, 'storeNews']);

    Route::get('/news/edit/{news}', [LastNewsController::class, 'editNews']);
    Route::post('/news/update/{news}', [LastNewsController::class, 'updateLastNews']);

    Route::get('/news/delete/{news}', [LastNewsController::class, 'deleteLastNews']);

});





Route::prefix('dashboard')->group(function(){

    Route::get('projects/', [OurProjectController::class, 'allProjects']);
    Route::get('projects/show/{project}', [OurProjectController::class, 'showProject']);

    Route::get('/projects/create', [OurProjectController::class, 'createProject']);
    Route::post('/projects/store', [OurProjectController::class, 'storeProject']);

    Route::get('/projects/edit/{project}', [OurProjectController::class, 'editProject']);
    Route::post('/projects/update/{project}', [OurProjectController::class, 'updateProject']);

    Route::get('/projects/delete/{project}', [OurProjectController::class, 'deleteProject']);

});




Route::prefix('dashboard')->group(function(){

    Route::get('rates/', [RateController::class, 'allRates']);
    Route::get('/rate/create', [RateController::class, 'createRate']);
    Route::post('/rate/store', [RateController::class, 'storeRate']);
    Route::get('rate/show/{rate}', [RateController::class, 'showRate']);
    Route::get('rate/delete/{rate}', [RateController::class, 'deleteRate']);


});


Route::prefix('dashboard')->group(function(){

    Route::get('contacts/', [ContactController::class, 'getContacts']);
    Route::get('contacts/show/{contact}', [ContactController::class, 'showContact']);

    Route::get('/contacts/create', [ContactController::class, 'createContact']);
    Route::post('/contacts/store', [ContactController::class, 'storeContact']);

    Route::get('/contacts/edit/{contact}', [ContactController::class, 'editContact']);
    Route::post('/contacts/update/{contact}', [ContactController::class, 'updateContact']);

    Route::get('/contacts/delete/{contact}', [ContactController::class, 'deleteContact']);

});












