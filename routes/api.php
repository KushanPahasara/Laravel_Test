<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;

Route::post('/categories', [CategoriesController::class, 'store']); 
Route::get('/categories', [CategoriesController::class, 'index']); 
Route::get('/categories/{id}', [CategoriesController::class, 'show']); 
Route::put('/categories/{id}', [CategoriesController::class, 'update']); 
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);
 

use App\Http\Controllers\CommentsController;

Route::post('/comments', [CommentsController::class, 'store']);
Route::get('/comments', [CommentsController::class, 'index']); 
Route::get('/comments/{id}', [CommentsController::class, 'show']); 
Route::put('/comments/{id}', [CommentsController::class, 'update']); 
Route::delete('/comments/{id}', [CommentsController::class, 'destroy']); 

use App\Http\Controllers\IssuesController;

Route::post('/issues', [IssuesController::class, 'store']); 
Route::get('/issues', [IssuesController::class, 'index']); 
Route::get('/issues/{id}', [IssuesController::class, 'show']); 
Route::put('/issues/{id}', [IssuesController::class, 'update']); 
Route::delete('/issues/{id}', [IssuesController::class, 'destroy']);
Route::post('/issues/{id}/categories/attach', [IssuesController::class, 'attachCategories']); 

use App\Http\Controllers\SubcategoriesController;

Route::get('/subcategories', [SubcategoriesController::class, 'index']);
Route::get('/subcategories/{id}', [SubcategoriesController::class, 'show']);
Route::post('/subcategories', [SubcategoriesController::class, 'store']);
Route::put('/subcategories/{id}', [SubcategoriesController::class, 'update']);
Route::delete('/subcategories/{id}', [SubcategoriesController::class, 'destroy']);




