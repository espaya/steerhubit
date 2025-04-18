<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComments extends Model
{
    protected $fillable = [
        'comment_name',
        'comment_email',
        'comment',
        'post_id',
        'status',
        'parent_id'
    ];

    protected $table = 'post_comment';

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function replies()
    {
        return $this->hasMany(PostComments::class, 'parent_id')->latest();
    }

    public function parent()
    {
        return $this->belongsTo(PostComments::class, 'parent_id');
    }
}
