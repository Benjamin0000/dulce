<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController; 

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-category/{branch_id?}', [ApiController::class, 'get_branches']); 
Route::get('/get-items/{item_id}', [ApiController::class, 'get_more_items']);
Route::get('/get-item/{item_id}', [ApiController::class, 'get_item']); 

Route::get('/get-discounts/{branch_id}', [ApiController::class, 'get_discounts_and_locations']);
Route::post('/validate-location/{branch_id}', [ApiController::class, 'validate_location']); 


Route::middleware('auth:sanctum')->post('/process-order/{branch_id}', [ApiController::class, 'process_order']); 