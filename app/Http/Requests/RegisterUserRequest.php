<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change this to true if authorization is required
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'gender' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, ['Male', 'Female'])) {
                        $fail('The '.$attribute.' must be Male or Female.');
            
                    }
                },
            ],
            'blood_type' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!in_array($value, ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])) {
                        $fail('The '.$attribute.' must be A+, A-, B+, B-, AB+, AB-, O+, or O-.');
                    }
                },
            ],
        ];
    }
}
