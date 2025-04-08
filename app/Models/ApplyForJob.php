<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyForJob extends Model
{
    protected $table = 'apply_for_job';

    protected $fillable = [
        'applicant_id',
        'job_id',
        'userID'
    ];
}
