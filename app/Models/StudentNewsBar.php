<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentNewsBar extends Model
{
    use HasFactory;

    protected $fillable = ['news', 'unique_id'];
}
