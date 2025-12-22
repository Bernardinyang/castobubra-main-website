<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentCommunityRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'content' => ['nullable', 'string'],
            'icon' => ['nullable', 'string'],
            'button_text' => ['nullable', 'string'],
            'button_link' => ['nullable', 'string'],
            'img' => ['sometimes', 'image', 'mimes:jpg,png,jpeg'],
        ];
    }
}
