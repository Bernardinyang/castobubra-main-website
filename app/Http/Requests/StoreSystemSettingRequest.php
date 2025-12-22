<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSystemSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app_url' => ['required', 'url'],
            'app_name' => ['required', 'string'],
            'app_email' => ['required', 'email'],
            'app_email_2' => ['nullable', 'email'],
            'app_email_3' => ['nullable', 'email'],
            'app_mobile_no_1' => ['required', 'string'],
            'app_mobile_no_2' => ['nullable', 'string'],
            'app_location' => ['required', 'string'],
            'timezone' => ['required', 'string'],

            'facebook_url' => ['nullable', 'url'],
            'twitter_url' => ['nullable', 'url'],
            'instagram_url' => ['nullable', 'url'],
            'youtube_url' => ['nullable', 'url'],
            'is_registration_on' => ['required'],
            'registration_amount' => ['required', 'numeric'],
        ];
    }
}
