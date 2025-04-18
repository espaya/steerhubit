<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    
    protected $fillable = [
        'title',
        'description',
        'category',
        'tags',
        'status',
        'schedule',
        'featured_image',
        'slug'
    ]; 

    public function categoryName()
    {
        return $this->belongsTo(PostCategory::class, 'category', 'id'); // 'category' is the foreign key in 'post' table
    }

}
