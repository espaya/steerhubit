<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'my_jobs';

    protected $fillable = [
        'title',
        'description',
        'working_schedule',
        'working_day',
        'pay',
        'experience',
        'deadline',
        'qualification',
        'video',
        'country',
        'state',
        'address',
        'postal_code',
        'status',
        'applicants',
        'userID'
    ];
}
