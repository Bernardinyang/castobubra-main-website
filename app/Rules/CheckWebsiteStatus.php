<?php

namespace App\Rules;

use App\Http\Services\HelperService;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class CheckWebsiteStatus implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $setting = HelperService::getSettings();
        $user = User::select('role_id')->where('email', $value)->first();

        if(!$setting->is_website_locked) {
            return true;
        }

        if ($user->role_id === 1) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The website is currently locked, Contact the webmaster to rectify this!';
    }
}
