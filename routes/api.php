<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Task 1: Create Author
Route::post('/authors', [AuthorController::class, 'store']);

// Task 2: Create Article
Route::post('/articles', [ArticleController::class, 'store']);

// Task 4: Subscribe to Articles
Route::post('/subscribe', [AudienceController::class, 'subscribe']);

// Task 5: Create Comments
Route::post('/comments', [CommentController::class, 'store']);

// Task 6: Queries (The GET requests)
Route::get('/articles/sao', [ArticleController::class, 'getSaoArticles']);
Route::get('/articles/audiences', [ArticleController::class, 'getArticleAudiences']);
Route::get('/authors/sok/audiences', [AudienceController::class, 'getSokAudiences']);
Route::get('/audiences/samnang/comments', [CommentController::class, 'getSamnangComments']);