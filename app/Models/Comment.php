<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user() { return $this->belongsTo(User::class); }

    // 5, 6, 7. The Polymorphic method
    public function commentable() {
        return $this->morphTo();
    }
    // app/Models/Comment.php
    protected $fillable = ['body', 'article_id', 'author_id', 'audience_id'];
}
