<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\BranchController; 
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FrontController; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [FrontController::class, 'login_page'])->name('login'); 
Route::post('/login', [FrontController::class, 'login'])->name('login'); 

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

Route::get('/branches', [BranchController::class, 'index'])->name('admin.branches.index'); 
Route::post('/create-branch', [BranchController::class, 'create_branch'])->name('admin.branch.create'); 
Route::get('/branches/{id}', [BranchController::class, 'show'])->name('admin.branch.show');
Route::put('/branches/{id}', [BranchController::class, 'update_branch'])->name('admin.branch.update'); 

Route::get('/managers', [BranchController::class, 'managers'])->name('admin.managers.index'); 
Route::post('/managers', [BranchController::class, 'add_manager'])->name('admin.manager.create'); 
Route::post('/update-manager', [BranchController::class, 'update_manager'])->name('admin.manager.update'); 

