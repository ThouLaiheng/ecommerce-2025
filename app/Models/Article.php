<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author() { return $this->belongsTo(Author::class); }

    // 4. An article has many audiences (Many-to-Many assumed for "many audiences")
    public function audiences() { return $this->belongsToMany(Audience::class); }

    // 6. Article has many comments (Polymorphic)
    public function comments() { return $this->morphMany(Comment::class, 'commentable'); }
    //
}
