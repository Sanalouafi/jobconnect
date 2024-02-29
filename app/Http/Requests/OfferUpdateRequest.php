<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferUpdateRequest extends FormRequest
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
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'contract' => 'required|string|max:255',
                'deadline' => 'required|date',
                'salary' => 'required|numeric',
                'localisation' => 'required|string|max:255',
                'company_id' => 'required|exists:companies,id',
                'media'=> 'required|mimes:jpg,jpeg,png,gif',
            ];
        }
    }

