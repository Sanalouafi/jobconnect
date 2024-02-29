<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceUpdateRequest extends FormRequest
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
<<<<<<< HEAD
            'name' => 'sometimes|string|max:255',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date',
            'company_name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'task' => 'sometimes|string|max:255',
            // 'user_id' => 'sometimes|exists:users,id',
=======
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if ($this->input('start_date') && strtotime($value) <= strtotime($this->input('start_date'))) {
                        $fail('The end date must be greater than the start date.');
                    }
                },
            ],
            'company_name' => 'required|string|max:255',
            'description' => 'required|string',
            'task' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
>>>>>>> 346fe16abed8bad0f1888d21d7d10618e1d632cc
        ];
    }
}
