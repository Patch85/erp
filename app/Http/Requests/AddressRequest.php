<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // TODO: Implement authorize() method.
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
            'attention' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country_code' => ['required', 'string', 'size:3'],
            'description' => ['nullable', 'string'],
            'postal_code' => ['required', 'string'],
            'state' => ['nullable', 'string'],
            'street_1' => ['required', 'string'],
            'street_2' => ['nullable', 'string'],
        ];
    }
}
