<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SUGExco extends Model
{
    use HasFactory;
    protected $table = 'sug_excos';

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
