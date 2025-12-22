<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'img',
        'mobile_img',
        'caption',
        'sup_text',
        'link',
        'link_text',
    ];
}
