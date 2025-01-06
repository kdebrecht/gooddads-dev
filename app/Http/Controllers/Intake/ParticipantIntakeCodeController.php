<?php

namespace App\Http\Controllers\Intake;

use App\Http\Controllers\Controller;
use App\Models\Participant;
use App\Models\ParticipantIntakeCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ParticipantIntakeCodeController extends Controller
{
    public function store(Request $request, Participant $participant): RedirectResponse
    {
        if (! $participant->intakeCode()->exists()) {
            ParticipantIntakeCode::create(['participant_id' => $participant->id]);
        }

        return redirect()->route('intake.code.show', $participant);
    }

    public function show(Request $request, Participant $participant): Response
    {
        return Inertia::render('Intake/DisplayCode', [
            'participantCode' => $participant->intakeCode?->code ?? 'No Code Found',
            'participant' => $participant,
        ]);
    }

    public function destroy(Request $request, Participant $participant): RedirectResponse
    {
        if ($participant->intakeCode()->exists()) {
            $participant->intakeCode()->delete();
        }

        return redirect()->route('intake.code.show', $participant);
    }
}
