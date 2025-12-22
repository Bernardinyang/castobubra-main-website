<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicBoard extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'order',
        'position',
        'image',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'linkedin_url',
        'email',
    ];
}
