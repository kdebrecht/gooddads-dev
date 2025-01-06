<?php

namespace App\Http\Controllers\Intake;

use App\Enums\SessionKeys;
use App\Http\Controllers\Controller;
use App\Http\Requests\Intake\IntakeControllerStoreRequest;
use App\Models\ParticipantIntakeCode;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class IntakeController extends Controller
{
    public function index(): Response
    {
        // Show Intake Index where the user enters their code
        return Inertia::render('Intake/Index', []);
    }

    public function store(IntakeControllerStoreRequest $request): RedirectResponse|Response
    {
        $intakeCode = $request->validated('code');

        if ($participant = ParticipantIntakeCode::firstWhere('code', $intakeCode)?->participant) {
            $request->session()->put(SessionKeys::IntakeCode->value, $intakeCode);

            return redirect()->route('intake.signup.index');
        }

        return redirect()->back()->withErrors(['code' => 'Invalid Code']);
    }
}
