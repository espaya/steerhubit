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
}
