<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionCheckLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'ip_address',
        'user_agent',
        'browser',
        'browser_version',
        'platform',
        'device_type',
        'device_name',
        'referrer',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
