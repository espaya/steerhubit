<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobViews extends Model
{
    protected $table = 'job_views';

    protected $fillable = [
        'job_id',
        'views',
        'userID'
    ];
}
