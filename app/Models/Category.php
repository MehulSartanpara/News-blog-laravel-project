<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categorys';
    protected $fillable = [
        'cat_id',
        'category_name',
    ];

    protected $primaryKey = 'cat_id';
}
