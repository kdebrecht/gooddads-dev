<?php

namespace App\Http\Controllers\Intake;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use Illuminate\Support\Facades\Context;

abstract class IntakeFormController extends Controller
{

    /**
     * @return array<string, mixed>
     */
    public function currentParticipantWithCode(): array
    {
        return [
            'participant' => Context::get('participant'),
            'participantCode' => Context::get('participantCode'),
        ];
    }

    public function currentParticipant(): ?Participant
    {
        return Context::get('participant');
    }
}
