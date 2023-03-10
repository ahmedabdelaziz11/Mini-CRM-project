<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif|max:255|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url|max:255',
        ];
    }
}
