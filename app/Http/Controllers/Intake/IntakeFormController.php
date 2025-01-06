<?php

namespace App\Http\Controllers\Intake;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Context;

abstract class IntakeFormController extends Controller
{

    /**
     * @return array<string, mixed>
     */
    public function currentParticipant(): array
    {
        return [
            'participant' => Context::get('participant'),
            'participantCode' => Context::get('participantCode'),
        ];
    }
}
