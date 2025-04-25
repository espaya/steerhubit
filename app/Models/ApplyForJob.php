<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplyForJob extends Model
{
    use SoftDeletes;

    protected $table = 'apply_for_job';

    protected $fillable = [
        'applicant_id',
        'job_id',
        'userID'
    ];

    public function profile()
    {
        return $this->belongsTo(CandidateProfile::class, 'applicant_id', 'userID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'applicant_id', 'id');
    }
}
