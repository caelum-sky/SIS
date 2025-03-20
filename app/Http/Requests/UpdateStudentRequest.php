<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:students,email',
                'regex:/^[a-zA-Z0-9._%+-]+@student\.buksu\.edu\.ph$/'
            ],
            'address' => ['required', 'string', 'max:255'],
            'course' => [
                'required',
                'string',
                'max:255',
                'regex:/^BS.*/',
            ],
        ];
    }
}
