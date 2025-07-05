<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\DoadorController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\RefeicaoController;
use App\Http\Controllers\LoginController;

/*
Route::middleware('auth:api')->get('/user',function (Request $request){
    return $request->user();
});
*/

Route::post('/login',[LoginController::class, 'login']);

Route::get('/instituicao',[InstituicaoController::class, 'index']);
Route::get('/instituicao/{id}',[InstituicaoController::class, 'show']);
Route::post('/instituicao',[InstituicaoController::class, 'store']);
Route::put('/instituicao/{id}',[InstituicaoController::class, 'update']);
Route::delete('/instituicao/{id}',[InstituicaoController::class, 'destroy']);

Route::get('/doador',[DoadorController::class, 'index']);
Route::get('/doador/{id}',[DoadorController::class, 'show']);
Route::post('/doador',[DoadorController::class, 'store']);
Route::put('/doador/{id}',[DoadorController::class, 'update']);
Route::delete('/doador/{id}',[DoadorController::class, 'destroy']);

Route::get('/refeicao',[RefeicaoController::class, 'index']);
Route::get('/refeicao/{id}',[RefeicaoController::class, 'show']);
Route::post('/refeicao',[RefeicaoController::class, 'store']);
Route::put('/refeicao/{id}',[RefeicaoController::class, 'update']);
Route::delete('/refeicao/{id}',[RefeicaoController::class, 'destroy']);
