<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'document' => 'required|string|size:11',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string',
            'address' => 'required|string',
            'district' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string|size:2',
            'zipcode' => 'required|string|size:8',
        ];
    }
}
