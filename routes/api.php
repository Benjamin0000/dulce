<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController; 

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-category', [ApiController::class, 'get_branches']); 

Route::get('/get-items/{id}', [ApiController::class, 'get_more_items']);
