<?php

namespace App\Http\Requests\Intake;

use App\Rules\UsPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SignupUpdateRequest extends FormRequest
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
            'participant_id' => ['required', 'uuid',  Rule::exists('participants', 'id')],
            'client_name' => ['required', 'string', 'max191'],
            'date' => ['required', 'date'],
            'address' => ['required', 'string', 'max191'],
            'employer' => ['nullable', 'string', 'max191'],
            't_shirt_size' => ['nullable', 'string', 'max191'],
            'home_cell_phone' => ['required', 'string', 'max:20', new UsPhoneNumber()],
            'work_phone' => ['nullable', 'string', 'max:20', new UsPhoneNumber()],
            'other_number' => ['nullable', 'string', 'max:20', new UsPhoneNumber()],
            'email_address' => ['nullable', 'email', 'max191'],
            'probation_parole_case_worker_name' => ['nullable', 'string', 'max191'],
            'probation_parole_case_worker_phone' => ['nullable', 'string', 'max:20', new UsPhoneNumber()],
            // Children information
            'children_info' => ['nullable', 'array'],
            'children_info.*.name' => ['required_with:children_info', 'string'],
            'children_info.*.dob' => ['required_with:children_info', 'date'],
            'children_info.*.age' => ['required_with:children_info', 'numeric'],
            'children_info.*.contact' => ['required_with:children_info', 'boolean'],
            'children_info.*.visitation' => ['required_with:children_info', 'boolean'],
            'children_info.*.phone_contact' => ['required_with:children_info', 'boolean'],
            'children_info.*.custody' => ['required_with:children_info', 'boolean'],

            // These may be unnecessary if we use children specific values above
            'contact_with_children' => ['nullable', 'boolean'],
            'custody' => ['nullable', 'boolean'],
            'visitation' => ['nullable', 'boolean'],
            'phone_contact' => ['nullable', 'boolean'],
            // This may not be required - waiting for answer
            'participant_photo' => ['nullable', 'string'],
            'monthly_child_support_payment' => ['nullable', 'numeric'],
            'marital_status' => ['nullable', Rule::in(['Married', 'Engaged', 'Single', 'Divorced', 'Widowed'])],
            'ethnicity' => ['nullable', Rule::in(['American Indian or Alaska Native', 'Asian', 'Black or African American', 'Hispanic or Latino', 'Native Hawaiian or Islander', 'White'])],
        ];
    }
}
