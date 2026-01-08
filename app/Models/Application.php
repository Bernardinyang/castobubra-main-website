<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_id',
        'surname',
        'first_name',
        'other_name',
        'email',
        'phone_number',
        'gender',
        'marital_status',
        'state_of_origin',
        'local_government',
        'current_address',
        'programme_id',
        'ssce_certificate',
        'birth_certificate',
        'passport_photograph',
        'evidence_of_payment',
        'jamb_result',
        'other_uploads',
        'status',
        'remarks',
    ];

    protected $casts = [
        'programme_id' => 'integer',
    ];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function admissionCheckLogs()
    {
        return $this->hasMany(AdmissionCheckLog::class);
    }

    public function getFullNameAttribute()
    {
        $name = $this->surname . ' ' . $this->first_name;
        if ($this->other_name) {
            $name .= ' ' . $this->other_name;
        }
        return $name;
    }
}
