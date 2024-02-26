<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'localisation' => 'required|string|max:255',
            'description' => 'required|string',
            'logo'=> 'required|mimes:jpg,jpeg,png,gif',
            'user_id' => 'required|exists:users,id',
        ];
    }
}
