<?php

namespace App\Http\Requests\Intake;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IntakeControllerStoreRequest extends FormRequest
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
            'code' => ['required', Rule::exists('participant_intake_codes', 'code')],
        ];
    }
}
