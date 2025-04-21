<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    protected $table = 'candidate_profile';

    protected $fillable = [
        'fullname',
        'phone',
        'dob',
        'gender',
        'description',
        'facebook',
        'instagram',
        'linkedin',
        'country',
        'state',
        'present_address',
        'postal_code',
        'userID'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
