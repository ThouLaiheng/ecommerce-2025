<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

$authorsData = [
    [ 'author_name' => 'Sok','username' => 'sok123'],
    [ 'author_name' => 'Sao','username' => 'sao'],
    [ 'author_name' => 'Dara','username' => 'd.dara'],  
];

foreach ($authorsData as $data) {
    DB::transaction(function () use ($data) {
        // insert or update authors inside a transaction; move this seeding logic to a seeder in production
        DB::table('authors')->updateOrInsert(
            ['username' => $data['username']],
            [
                'author_name' => $data['author_name'],
                'username' => $data['username'],
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    });
}

class AuthorController extends Controller
{
    public function store(Request $request) {
    // 1. Create the User first
    $user = User::create([
        'name' => $request->user_name, // e.g., "sok123"
        'email' => $request->email,
        'password' => bcrypt('password'),
    ]);

    // 2. Create the Author linked to that User
    $author = $user->author()->create([
        'name' => $request->author_name, // e.g., "Sok"
    ]);

    return response()->json($author, 201);
}
    public function getSokAudiences() {
    // Ensure you have the hasManyThrough relationship in your Author model!
    $audiences = Author::where('name', 'Sok')->first()->audiences;
    return response()->json($audiences);
}

}
// AuthorController.php
