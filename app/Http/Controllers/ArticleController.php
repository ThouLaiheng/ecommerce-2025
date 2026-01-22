<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Author;

class ArticleController extends Controller
{
    //
    
    public function store(Request $request) {
        $author = Author::where('name', $request->author_name)->firstOrFail();
        
        $article = $author->articles()->create([
            'title' => $request->title, // e.g., "Climate changes in the last 3 years"
        ]);

        

        return response()->json($article, 201);
    }

    public function getSaoArticles() {
    $articles = Author::where('name', 'Sao')->firstOrFail()->articles;
    return response()->json($articles);
}
    
    public function getArticleAudiences() {
    $article = Article::where('title', 'Climate changes in the last 3 years')->first();
    $audiences = $article->audiences; 
    return response()->json($audiences);
}
}