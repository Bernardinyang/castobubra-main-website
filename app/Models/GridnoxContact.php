<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GridnoxContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'names',
        'email',
        'mobile_no',
        'message',
        'unique_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'read_by', 'id');
    }
}
