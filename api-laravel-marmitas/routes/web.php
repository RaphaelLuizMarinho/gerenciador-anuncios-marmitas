<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;

/*
Route::middleware('auth:api')->get('/user',function (Request $request){
    return $request->user();
});
*/

Route::get('/', function () {
    return response()->json(['message' => 'API funcionando!']);
});

