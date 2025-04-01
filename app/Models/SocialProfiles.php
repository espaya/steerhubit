<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialProfiles extends Model
{
    protected $table = 'social_profiles';
    
    protected $fillable = [
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'youtube',
    ];
}
