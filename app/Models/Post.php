<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'description', 'color', 'size', 'image','discount'];

    /**
     * Get all of the comments for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany(PostCategory::class, 'post_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class); // Ensure this line is correct
    }
}
