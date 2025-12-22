<?php

use App\Http\Controllers\ComingSoon\ComingSoonController;
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

Route::post('/sug/contact', [ComingSoonController::class, 'storeContact'])->name('website.sug.contact.store');
Route::post('/sug/subscribe', [ComingSoonController::class, 'storeSubscription'])->name('website.sug.subscribe');
