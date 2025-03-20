<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGradeRequest extends FormRequest
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
            'grade' => [
                'required',
                function ($attribute, $value, $fail) {
                    // Allow "INC" or grades between 1.00 to 5.00 in steps of 0.25
                    $validGrades = array_merge(
                        array_map(fn($g) => number_format($g, 2), range(1.00, 5.00, 0.25)),
                        ['INC'], ['FDA']
                    );
    
                    if (!in_array($value, $validGrades)) {
                        $fail("The $attribute must be a valid grade (1.00 - 5.00 or INC).");
                    }
                }
            ],
            'enrollment_id' => 'required|exists:enrollments,id',
        ];
    }
    
}
