<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["product_name","explanation","image","user_id"];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
