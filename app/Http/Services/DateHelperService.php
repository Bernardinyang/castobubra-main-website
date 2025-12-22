<?php

namespace App\Http\Services;

use Carbon\Carbon;

class DateHelperService
{
    public static function formatTimestamp($timestamp): string
    {
        return Carbon::parse($timestamp)->format('l jS F, Y h:i:sA');
    }

    public static function formatDate($date): string
    {
        return Carbon::parse($date)->format('l jS F, Y');
    }

    public static function formatDateTwo($date): string
    {
        return Carbon::parse($date)->format('d M, Y');
    }

    public static function formatTime($time): string
    {
        return Carbon::parse($time)->format('h:i:sA');
    }

    public static function toHuman($time): string
    {
        return Carbon::parse($time)->diffForHumans();
    }
}

