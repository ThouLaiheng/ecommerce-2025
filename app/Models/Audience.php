<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    public function user() { return $this->belongsTo(User::class); }

    // 4. Inverse of Article relationship
    public function articles() { return $this->belongsToMany(Article::class, 'article_audience'); }

    // 5. Audience has many comments (Polymorphic)
    public function comments() { return $this->morphMany(Comment::class, 'commentable'); }
    //
}
