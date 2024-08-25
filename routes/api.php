<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriesController;

Route::post('/categories', [CategoriesController::class, 'store']);    // Create a new category
Route::get('/categories', [CategoriesController::class, 'index']);     // Get all categories
Route::get('/categories/{id}', [CategoriesController::class, 'show']); // Get a single category by ID
Route::put('/categories/{id}', [CategoriesController::class, 'update']); // Update a category by ID
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']); // Delete a category by ID

use App\Http\Controllers\CommentsController;

Route::post('/comments', [CommentsController::class, 'store']);    // Create a new comment
Route::get('/comments', [CommentsController::class, 'index']);     // Get all comments
Route::get('/comments/{id}', [CommentsController::class, 'show']); // Get a single comment by ID
Route::put('/comments/{id}', [CommentsController::class, 'update']); // Update a comment by ID
Route::delete('/comments/{id}', [CommentsController::class, 'destroy']); // Delete a comment by ID

use App\Http\Controllers\IssuesController;

Route::post('/issues', [IssuesController::class, 'store']);    // Create a new issue
Route::get('/issues', [IssuesController::class, 'index']);     // Get all issues
Route::get('/issues/{id}', [IssuesController::class, 'show']); // Get a single issue by ID
Route::put('/issues/{id}', [IssuesController::class, 'update']); // Update an issue by ID
Route::delete('/issues/{id}', [IssuesController::class, 'destroy']); // Delete an issue by ID





