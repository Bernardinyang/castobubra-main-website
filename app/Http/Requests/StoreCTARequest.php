<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCTARequest extends FormRequest
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
        $rules = [
            'type' => ['required', 'in:text,image'],
        ];

        if ($this->input('type') === 'text') {
            $rules['sup_text'] = ['required', 'string'];
            $rules['title'] = ['required', 'string'];
            $rules['subtitle'] = ['nullable', 'string'];
            $rules['content'] = ['required', 'string'];
            $rules['url'] = ['required', 'url'];
            $rules['url_text'] = ['required', 'string'];
            $rules['img'] = ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'];
        } else {
            $rules['img'] = [($this->isMethod('post') ? 'required' : 'sometimes'), 'image', 'mimes:jpg,png,jpeg', 'max:2048'];
            $rules['url'] = ['nullable', 'url'];
            $rules['url_text'] = ['nullable', 'string'];
            $rules['sup_text'] = ['nullable', 'string'];
            $rules['title'] = ['nullable', 'string'];
            $rules['subtitle'] = ['nullable', 'string'];
            $rules['content'] = ['nullable', 'string'];
        }

        return $rules;
    }
}
