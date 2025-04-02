<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $table = 'company_profile';
    protected $fillable = [
        'company_name',
        'company_tagline',
        'company_phone',
        'company_address',
        'company_zip',
        'company_email'
    ];
}
