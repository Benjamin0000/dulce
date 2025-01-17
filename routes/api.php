<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController; 
use App\Http\Controllers\WebhookController;

Route::post('/webhook-xxccc-ddd', [WebhookController::class, 'handleWebhook']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/get-category/{branch_id?}', [ApiController::class, 'get_branches']); 
Route::get('/get-items/{item_id}', [ApiController::class, 'get_more_items']);
Route::get('/get-item/{item_id}', [ApiController::class, 'get_item']); 

Route::get('/get-discounts/{branch_id}', [ApiController::class, 'get_discounts_and_locations']);
Route::post('/validate-location/{branch_id}', [ApiController::class, 'validate_location']); 
Route::post('/process-order/{branch_id}', [ApiController::class, 'process_order']); 


Route::get('/get-orders', [ApiController::class, 'get_order_history']);
Route::get('/history/cart/{order_id}', [ApiController::class, 'get_cart_items']); 