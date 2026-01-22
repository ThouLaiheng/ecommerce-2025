<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AudienceController extends Controller
{
    public function getSokAudiences() {
    // Ensure you have the hasManyThrough relationship in your Author model!
    $audiences = Author::where('name', 'Sok')->first()->audiences;
    return response()->json($audiences);
}   
     
    public function subscribe(Request $request) {
    // 1. Find the audience (e.g., Samnang)
    $audience = Audience::where('name', $request->audience_name)->firstOrFail();

    // 2. Find the IDs of the articles by their titles
    $articleIds = Article::whereIn('title', $request->article_titles)->pluck('id');

    // 3. Sync/Attach to the pivot table
    $audience->articles()->syncWithoutDetaching($articleIds);

    return response()->json(['message' => 'Subscribed successfully']);
}
}
