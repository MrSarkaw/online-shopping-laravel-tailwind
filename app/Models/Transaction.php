<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id', 'state'];


    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
