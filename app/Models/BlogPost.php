<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;
    protected $table ="blogposts";
    protected $fillable = [
        'heading',
        'category_name',
        'paragraph',
        'date',
        'image'
    ];
}
