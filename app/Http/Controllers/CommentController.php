<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getSamnangComments() {
    $comments = Audience::where('name', 'Samnang')->first()->comments;
    return response()->json($comments);
} 
    public function store(Request $request) {
    // Example: Author Sok comments on his article "Climate changes..."
    $comment = new Comment();
    $comment->body = $request->body;
    
    // Link to Article
    if($request->has('article_title')) {
        $article = Article::where('title', $request->article_title)->first();
        $comment->article_id = $article->id;
    }

    // Link to Author (if sender is an Author)
    if($request->has('author_name')) {
        $author = Author::where('name', $request->author_name)->first();
        $comment->author_id = $author->id;
    }

    // Link to Audience (if sender is an Audience)
    if($request->has('audience_name')) {
        $audience = Audience::where('name', $request->audience_name)->first();
        $comment->audience_id = $audience->id;
    }

    $comment->save();
    return response()->json($comment, 201);
}
}
