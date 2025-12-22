<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_image',
        'sub_image',
        'title',
        'sup_text',
        'description',
        'url',
    ];
}
