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

Route::get('/ping', function(Request $request){
    return['pong'=>true];
});

Route::get('/notes', 'NoteController@all');

Route::get('/note/{id}', 'NoteController@find');

Route::post('/note', 'NoteController@store');

Route::put('/note/{id}', 'NoteController@update');

Route::delete('/note/{id}', 'NoteController@delete');
