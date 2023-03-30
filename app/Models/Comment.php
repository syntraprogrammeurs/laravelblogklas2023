<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['post_id','user_id','body', 'parent_id'];
// User relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }

// Post relation
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

// Parent comment relation
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

// Child comments relation
    public function children()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('user', 'children');
    }



}
