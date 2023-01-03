<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
    protected $fillable = [
        'user_name',
        'comment',
        'post_id',

    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
