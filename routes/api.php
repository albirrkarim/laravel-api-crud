<?php

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



Route::name("user.")->group(function(){
    Route::get("refresh","HomeController@refresh")->name("refresh");

    Route::post("store","HomeController@store")->name("store");
    Route::post("update","HomeController@update")->name("update");
    
    Route::get("delete/{id}","HomeController@delete")->name("delete");
});
