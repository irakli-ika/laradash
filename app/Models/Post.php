<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{
    // use HasFactory, softDeletes;
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}