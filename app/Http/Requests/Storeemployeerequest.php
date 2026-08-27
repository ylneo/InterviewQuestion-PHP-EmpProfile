<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEmployeeRequest extends FormRequest
{
    
    public const LOCAL_NATIONALITY = 'Malaysian';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isForeignHire = $this->input('nationality') !== self::LOCAL_NATIONALITY;

        return [
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'marital_status' => ['required', Rule::in(['Single', 'Married', 'Divorced', 'Widowed'])],
            'phone' => ['required', 'string', 'regex:/^[0-9+\-\s]{7,20}$/'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:500'],
            'state' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'date_of_birth' => ['required', 'date', 'before:-16 years'],
            'nationality' => ['required', 'string', 'max:100'],
            'ic_number' => [Rule::requiredIf(! $isForeignHire), 'nullable', 'string', 'max:20'],
            'passport_number' => [Rule::requiredIf($isForeignHire), 'nullable', 'string', 'max:20'],
            'hire_date' => ['required', 'date'],
            'department' => ['required', 'string', 'max:100'],
            'employment_type' => ['required', Rule::in(['Full Time', 'Part Time', 'Contract'])],
            'employment_status' => ['required', Rule::in(['Active', 'Probation', 'On Leave', 'Suspended', 'Terminated'])],

            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],

            'nric_passport' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'offer_letter' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'signed_nda' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'academic_certificates' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],
            'work_permit' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:5120'],

            
            'work_permit_expiry' => [
                Rule::requiredIf($isForeignHire && $this->hasFile('work_permit')),
                'nullable',
                'date',
                'after:today',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'Please enter a valid phone number.',
            'date_of_birth.before' => 'Employee must be at least 16 years old.',
            'ic_number.required' => 'IC number is required for local hires.',
            'passport_number.required' => 'Passport number is required for foreign hires.',
            'work_permit_expiry.required' => 'Work permit expiry date is required for foreign hires who upload a work permit.',
            'work_permit_expiry.after' => 'Work permit expiry date must be in the future.',
            '*.mimes' => 'Only PDF, JPG, and PNG files are allowed.',
            '*.max' => 'File size must not exceed 5MB.',
        ];
    }
}