<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCommunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'title',
        'content',
        'icon',
        'button_text',
        'button_link',
        'img',
    ];
}
