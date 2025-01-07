<?php

namespace App\Http\Resources\Intake;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Context;

/**
 * @mixin \App\Models\ParticipantSignupForm
 */
class SignupFormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $participant = Context::get('participant');

        return [
            'id' => $this?->id ?? '',
            'participantId' => $this?->participant_id ?? $participant->id,
            'clientName' => $this?->client_name ?? ($participant->first_name.' '.$participant->last_name),
            'date' => $this?->date ?? now()->format('m/d/Y'),
            'address' => $this?->address ?? '',
            'employer' => $this?->employer ?? '',
            'tShirtSize' => $this?->t_shirt_size ?? '',
            'homeCellPhone' => $this?->home_cell_phone ?? '',
            'workPhone' => $this?->work_phone ?? '',
            'otherNumber' => $this?->other_number ?? '',
            'emailAddress' => $this?->email_address ?? '',
            'probationParoleCaseWorkerName' => $this?->probation_parole_case_worker_name ?? '',
            'probationParoleCaseWorkerPhone' => $this?->probation_parole_case_worker_phone ?? '',
            'childrenInfo' => $this?->children_info ?? '',
            'contactWithChildren' => $this?->contact_with_children ?? '',
            'custody' => $this?->custody ?? '',
            'visitation' => $this?->visitation ?? '',
            'phoneContact' => $this?->phone_contact ?? '',
            'participantPhoto' => $this?->participant_photo ?? '',
            'monthlyChildSupportPayment' => $this?->monthly_child_support_payment ?? '',
            'maritalStatus' => $this?->marital_status ?? '',
            'ethnicity' => $this?->ethnicity ?? '',
        ];
    }
}
