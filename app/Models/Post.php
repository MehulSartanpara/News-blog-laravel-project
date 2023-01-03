<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

// use App\Http\Controllers\PostController;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $filename = [
        'title',
        'description',
        'category',
        'date',
        'admin',
        'post_img',
    ];

    // protected $primaryKey = 'id';

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
