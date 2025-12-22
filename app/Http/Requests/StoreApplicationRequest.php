<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'surname' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'other_name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'max:20'],
            'gender' => ['nullable', 'in:Male,Female,Other'],
            'marital_status' => ['nullable', 'in:Single,Married,Divorced,Widowed'],
            'state_of_origin' => ['nullable', 'string', 'max:255'],
            'local_government' => ['nullable', 'string', 'max:255'],
            'current_address' => ['nullable', 'string'],
            'programme_id' => ['required', 'exists:programmes,id'],
            'ssce_certificate' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'birth_certificate' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'passport_photograph' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'evidence_of_payment' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'other_uploads' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
        ];
    }

    public function messages(): array
    {
        return [
            'ssce_certificate.required' => 'SSCE certificate is required',
            'ssce_certificate.max' => 'SSCE certificate must not exceed 5MB',
            'birth_certificate.required' => 'Birth certificate or Age Declaration is required',
            'birth_certificate.max' => 'Birth certificate must not exceed 5MB',
            'passport_photograph.required' => 'Passport photograph is required',
            'passport_photograph.max' => 'Passport photograph must not exceed 2MB',
            'evidence_of_payment.required' => 'Evidence of payment is required',
            'evidence_of_payment.max' => 'Evidence of payment must not exceed 5MB',
            'programme_id.required' => 'Please select a programme',
            'programme_id.exists' => 'Selected programme is invalid',
        ];
    }
}
