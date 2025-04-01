<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    protected $fillable = [
        'company_name',
        'company_phone',
        'company_website',
        'company_founded_date',
        'company_size',
        'company_category',
        'profile_view',
        'company_country',
        'company_state',
        'company_present_address',
        'postal_code'
    ];
}
