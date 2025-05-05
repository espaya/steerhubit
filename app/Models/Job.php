<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    
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
        'userID',
        'website',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
