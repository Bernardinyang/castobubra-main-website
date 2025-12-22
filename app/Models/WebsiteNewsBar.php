<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteNewsBar extends Model
{
    use HasFactory;

    protected $fillable = ['news', 'unique_id', 'is_active'];
}
