<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSUGExcoRequest extends FormRequest
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
            'names' => ['required', 'string'],
            'position' => ['required', 'string'],
            'img' => ['sometimes', 'required', 'image'],
            'facebook_url' => ['nullable', 'url'],
            'twitter_url' => ['nullable', 'url'],
            'instagram_url' => ['nullable', 'url'],
            'linkedin_url' => ['nullable', 'url'],
            'email' => ['nullable', 'email']
        ];
    }

    public function messages()
    {
        return [
            'img.required' => "You must use the 'Choose file' button to select which file you wish to upload",
            'img.uploaded' => "Maximum file size to upload is 2MB (2000 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB"
        ];
    }
}
