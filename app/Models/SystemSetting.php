<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_url',
        'app_name',
        'app_email',
        'app_email_2',
        'app_email_3',
        'app_email',
        'app_debug',
        'app_mobile_no_1',
        'app_mobile_no_2',
        'app_location',
        'timezone',
        'is_live',
        'is_website_locked',
        'is_registration_on',
        'registration_amount',

        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',

        'mail_mailer',
        'mail_host',
        'mail_port',
        'mail_username',
        'mail_password',
        'mail_encryption',
    ];
}
