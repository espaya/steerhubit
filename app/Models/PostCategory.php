<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $table = 'post_category';

    protected $fillable = [
        'category_name',
        'category_slug',
        'category_description'
    ];
}
