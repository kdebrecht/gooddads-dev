<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntakeFormStartStoreRequest extends FormRequest
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
            'sessionId' => 'required|string',
            'fullName' => 'required|string|max:255',
            'date' => 'required|date_format:m/d/Y',
            'addressLine1' => 'required|string|max:255',
            'addressLine2' => 'nullable|string|max:255',
            'addressCity' => 'required|string|max:255',
            'addressZipcode' => 'required|string|max:10',
            'addressState' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'alternateContactName' => 'required|string|max:255',
            'alternateContactNumber' => 'required|string|max:15',
            'childName' => 'required|string|max:255',
        ];

    }
}
