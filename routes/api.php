<?php

use Illuminate\Http\Request;

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

Route::middleware('api')->group(function (){
    Route::post('chat/all', 'MessageController@allUserMassageSent');
    Route::get('chat/messages/{user}', 'MessageController@fetchMessages');
    Route::post('chat/messages', 'MessageController@sendMessage');
});
