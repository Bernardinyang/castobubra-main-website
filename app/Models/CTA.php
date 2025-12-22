<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTA extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'type',
        'sup_text',
        'title',
        'subtitle',
        'content',
        'img',
        'url',
        'url_text'
    ];
}
