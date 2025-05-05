<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicantShortlist extends Model
{
    protected $table = 'applicant_shortlist';

    protected $fillable = [
        'applicant_id',
        'employer_id',
        'slug',
        'shortlisted'
    ];

    public function profile()
    {
        return $this->belongsTo(CandidateProfile::class, 'applicant_id', 'userID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'applicant_id', 'id');
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class, 'applicant_id', 'userID');
    }

    public function job()
    {
        return $this->belongsTo(Job::class, 'slug', 'slug');
    }
}
