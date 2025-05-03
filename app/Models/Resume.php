<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $table = 'resume';

    protected $fillable = [
        'file',
        'degree_institution_name',
        'degree_institution_location',
        'degree_year_started',
        'degree_year_completed',

        'cert_institution_name',
        'cert_institution_location',
        'cert_year_started',
        'cert_year_completed',

        'high_school_name',
        'high_school_location',
        'high_school_year_started',
        'high_school_year_completed',

        'skills',

        'userID'
    ];

    public function profile()
    {
        return $this->hasMany(CandidateProfile::class, 'userID', 'userID');
    }
}
