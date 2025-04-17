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
        'status'
    ];

    protected $table = 'post_comment';

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
