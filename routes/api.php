<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;

Route::get('/', function(){
   return response()->json('This is the api');
});

Route::prefix('/customers')->group(function(){
    Route::get('/', [CustomerController::class, 'index']);
    Route::post('/', [CustomerController::class, 'store']);
    Route::put('/{customer}',[CustomerController::class, 'update']);
    Route::delete('/{customer}',[CustomerController::class, 'destroy']);
});
