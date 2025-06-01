<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileView extends Model
{
    protected $table = 'profile_view';

    protected $fillable = [
        'applicant_id',
        'views'
    ];
}
