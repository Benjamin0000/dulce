<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\BranchController; 
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FrontController; 
use App\Http\Controllers\StockController; 
use App\Http\Controllers\SettingsController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment-complete/{order_id}', [FrontController::class, 'payment'])->name('payment_processor'); 
Route::get('/payment-completed', [FrontController::class, 'payment_success'])->name('payment_successful'); 
Route::get('/payment-canceled',  [FrontController::class, 'payment_canceled'])->name('payment_canceled'); 
Route::get('/process-payment/{id}', [FrontController::class, 'process_payment'])->name('process_payment'); 


Route::get('/login', [FrontController::class, 'login_page'])->name('login'); 
Route::post('/login', [FrontController::class, 'login'])->name('login'); 

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/branches', [BranchController::class, 'index'])->name('admin.branches.index'); 
Route::post('/create-branch', [BranchController::class, 'create_branch'])->name('admin.branch.create'); 
Route::get('/branches/{id}', [BranchController::class, 'show'])->name('admin.branch.show');
Route::put('/branches/{id}', [BranchController::class, 'update_branch'])->name('admin.branch.update'); 

Route::get('/managers', [BranchController::class, 'managers'])->name('admin.managers.index'); 
Route::post('/managers', [BranchController::class, 'create_manager'])->name('admin.manager.create'); 
Route::post('/update-manager', [BranchController::class, 'update_manager'])->name('admin.manager.update'); 
Route::delete('/manager/{id}', [BranchController::class, 'destroy_manager'])->name('admin.manager.destroy');
Route::post('/assign-manager', [BranchController::class, 'assign_manager'])->name('admin.manager.assign');
Route::put('/unassign-manager/{id}', [BranchController::class, 'unassign_manager'])->name('admin.manager.unassign'); 


#adding items
Route::get('/items/{branch_id}/{parent_id?}', [ItemController::class, 'index'])->name('admin.items.index');
Route::post('/items/create', [ItemController::class, 'create_item'])->name('admin.items.create_item'); 
Route::post('/items/update', [ItemController::class, 'update_item'])->name('admin.items.update_item');
Route::delete('/items/{id}', [ItemController::class, 'delete_item'])->name('admin.items.delete'); 

Route::post('/add-addons', [ItemController::class, 'add_addon'])->name('admin.items.add_addon'); 
Route::post('/remove-addons', [ItemController::class, 'remove_addon'])->name('admin.items.remove_addon'); 


Route::get('/stocks/{branch_id}', [StockController::class, 'index'])->name('admin.stock.index'); 
Route::post('/update-stocks', [StockController::class, 'update_stock'])->name('admin.stock.update'); 

#settings
Route::get('/settings/{branch_id}', [SettingsController::class, 'index'])->name('admin.settings.index'); 
Route::post('/settings/{branch_id}/set-location', [SettingsController::class, 'set_location'])->name('admin.set_branch_location');
Route::post('/settings/{branch_id}/set-vat', [SettingsController::class, 'set_vat'])->name('admin.set_vat'); 
Route::post('/settings/{branch_id}/set-service-fee', [SettingsController::class, 'set_service_fee'])->name('admin.set_service_fee'); 
#discount code
Route::post('/settings/create-discount/{branch_id}', [SettingsController::class, 'create_discount'])->name('admin.create_discount'); 
Route::delete('/settings/delete-discount/{id}', [SettingsController::class, 'delete_discount'])->name('admin.delete_discount'); 
Route::get('/settings/load_discount/{branch_id}', [SettingsController::class, 'load_more_discounts'])->name('admin.load_more_discounts'); 
#delivery cost
Route::post('/settings/create-delivery-cost/{branch_id}', [SettingsController::class, 'create_delivery_cost'])->name('admin.create_delivery_cost'); 
Route::post('/settings/create-location/{branch_id}', [SettingsController::class, 'create_location'])->name('admin.create_location');
Route::delete('/settings/delete-location/{id}', [SettingsController::class, 'delete_location'])->name('admin.delete_location');
Route::get('/settings/load_location/{branch_id}', [SettingsController::class, 'load_more_location'])->name('admin.load_more_location'); 