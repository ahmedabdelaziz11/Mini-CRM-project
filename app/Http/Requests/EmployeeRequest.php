<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email|max:255',
            'logo' => 'nullable|mimes:jpeg,png,jpg,gif|max:255|dimensions:min_width=100,min_height=100',
            'phone' => 'nullable|max:12|min:8',
        ];
    }
}
