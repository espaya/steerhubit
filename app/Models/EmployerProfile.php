<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployerProfile extends Model
{
    protected $table = 'employer_profile';

    protected $fillable = [
        'employer_name',
        'employer_email',
        'employer_phone',
        'employer_website',
        'employer_category',
        'employer_public_view_profile',

        'employer_facebook',
        'employer_instagram',
        'employer_linkedin',

        'employer_country',
        'employer_state',
        'employer_present_address',
        'employer_postal_code',

    ];
}
