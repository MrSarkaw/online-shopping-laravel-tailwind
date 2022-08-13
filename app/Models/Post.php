<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'descritpion', 'color', 'size', 'image', 'discount'];



    public function categories()
    {
        return $this->hasMany(PostCategory::class, 'post_id');
    }


    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
