<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required'],
            'tags' => ['required'],
            'banner_img' => ['required', 'image', 'sometimes'],
            'post' => ['required'],
            'summary' => ['required', 'min:100'],
            'category_id' => ['required', 'integer'],
            'date_of_event' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'banner_img.required' => "You must use the 'Choose file' button to select which file you wish to upload",
//            'banner_img.uploaded' => "Maximum file size to upload is 2MB (2000 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB",
        ];
    }
}
